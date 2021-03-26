<?php

namespace App\Controller;

use App\Entity\Fourniture;
use App\Repository\FournitureRepository;
use App\Repository\GammeRepository;
use App\Repository\ProduitFournitureRepository;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Criteria;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RentabilitePageController extends AbstractController
{
    /**
     * @Route("/rentabilite", name="app_rentabilite")
     */
    public function rentabilite(GammeRepository $gammeRepository, ProduitRepository $produitRepository, FournitureRepository $fournitureRepository): Response
    {
        $gammes = $gammeRepository->findAll(); // Liste des gammes
        $produits = array(); // Liste des produits
        $nomProduitManquantGamme = array(); // Nom de la fourniture manquante pour chaque gamme

        // Pour chaque produit dans la base de données
        foreach ($produitRepository->findAll() as &$produit) {

            // Les produits sont triés par gamme, on vérifie que la clé "gamme" existe dans le tableau, sinon on la crée
            if (!array_key_exists($produit->getGamme()->getNom(), $produits))
                $produits[$produit->getGamme()->getNom()] = array();

            // Les noms des fournitures manquantes sont triés par gamme, on vérifie que la clé "gamme" existe dans le tableau, sinon on la crée
            if (!array_key_exists($produit->getGamme()->getNom(), $nomProduitManquantGamme))
                $nomProduitManquantGamme[$produit->getGamme()->getNom()] = array();

            // Prix total des fournitures nécéssaires à la fabrication du produit
            $prixFournituresTotal = 0;

            // Fourniture manquante pour le produit
            $produitFournitureManquant = null;

            // Pour chaque fourniture dans le produit
            foreach ($produit->getProduitFournitures() as &$produitFourniture) {

                // Si c'est la fourniture manquante, on met une référence de côté
                if ($produitFourniture->getFourniture()->getPrixDepart() == null) $produitFournitureManquant = $produitFourniture;

                // Sinon on ajoute le prix de la fourniture * son nombre au prix total
                else $prixFournituresTotal += $produitFourniture->getFourniture()->getPrixActuel() * $produitFourniture->getNbFourniture();
            }

            // Marge possible sur le produit ( sans la fourniture manquante )
            $prixTotal = $produit->getPrixVente() - $prixFournituresTotal;

            // Prix max auquel acheté la fourniture manquante
            $prixAchatFournitureManquantMax = $prixTotal / $produitFournitureManquant->getNbFourniture();

            // On ajoute le nom de la fourniture manquante dans la liste
            $nomProduitManquantGamme[$produit->getGamme()->getNom()] = $produitFournitureManquant->getFourniture()->getNom();

            // On ajoute le produit dans la liste
            array_push($produits[$produit->getGamme()->getNom()], array('produit' => $produit, 'prix' => $prixAchatFournitureManquantMax));
        }

        //Fonction de trie
        foreach ($produits as $key => $value) {
            usort($produits[$key], function ($item1, $item2) {
                return $item2['prix'] <=> $item1['prix'];
            });
        }

        $prixFicelles = $fournitureRepository->findOneBy(array('id' => 1))->getPrixActuel();
        $prixEtiquettes = $fournitureRepository->findOneBy(array('id' => 3))->getPrixActuel();
        $prixRubans =  $fournitureRepository->findOneBy(array('id' => 2))->getPrixActuel();

        return $this->render(
            'rentabilite/rentabilite.html.twig',
            [
                'gammes' => $gammes,
                'produits' => $produits,
                'prixEtiquettes' => $prixEtiquettes,
                'prixRubans' => $prixRubans,
                'prixFicelles' => $prixFicelles,
                'nomProduitManquantGamme' => $nomProduitManquantGamme
            ]
        );
    }
}
