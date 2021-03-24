<?php

namespace App\Controller;

use App\Entity\Gamme;
use App\Entity\Fourniture;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GammeController extends AbstractController
{
    /**
     * @Route("/gamme/{nom_gamme}", name="index_gamme", methods={"GET","HEAD"})
     */
    public function index(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        /*On récupère la gamme*/
        $gamme = $entityManager->getRepository(Gamme::class)->findOneBy(['nom' => $request->attributes->get('nom_gamme')]);
        if (!$gamme) {
            throw $this->createNotFoundException('Pas de gamme trouvée');
        }

        /*On récupère les produits*/
        $produits = $entityManager->getRepository(Produit::class)->findBy(['gamme' => $gamme->getId()], $request->query->get('order_by') ? [$request->query->get('order_by') => 'ASC'] : null);
        if (!$produits) {
            throw $this->createNotFoundException('Pas de produits trouvés');
        }

        /*On récupère les fournitures*/
        $fournitures = array_map(function ($obj) {
            return $obj->getFourniture();
        }, $gamme->getProduits()[0]->getProduitFournitures()->toArray());

        if (!$fournitures) {
            throw $this->createNotFoundException('Pas de fournitures trouvées');
        }

        return $this->render('gamme/index.html.twig', [
            'gamme' => $gamme,
            'produits' => $produits,
            'fournitures' => $fournitures
        ]);
    }

    /**
     * @Route("/gamme/{nom_gamme}", name="calcul_prix_achat_et_benefices", methods={"POST"})
     */
    public function calculPrixAchatEtBenefices(Request $request): Response
    {
        /*On va tout d'abord modifier la valeur prix_actuel dans la colonne de la fourniture voulue*/
        $entityManager = $this->getDoctrine()->getManager();
        $fourniture = $entityManager->getRepository(Fourniture::class)->findOneBy(['nom' => $request->attributes->get('nom_gamme')]);

        if (!$fourniture) {
            throw $this->createNotFoundException('Pas de fourniture trouvée');
        }

        if (!$request->request->get('nouveau_prix')) {
            throw $this->createNotFoundException(
                'Pas de nouveau prix saisi'
            );
        }

        $fourniture->setPrixActuel($request->request->get('nouveau_prix'));
        $entityManager->flush();

        $gamme = $entityManager->getRepository(Gamme::class)->findOneBy(['nom' => $request->attributes->get('nom_gamme')]);
        $produits = $this->setPrixAchatEtBenefice($gamme->getProduits());
        $entityManager->flush();

        return $this->render('gamme/index.html.twig', [
            'gamme' => $gamme,
            'produits' => $produits,
            'fourniture' => $fourniture
        ]);
    }

    private function setPrixAchatEtBenefice($produits)
    {
        foreach ($produits as $produit) {
            $produitFournitureListe = $produit->getProduitFournitures();
            $prixAchat = 0;
            foreach ($produitFournitureListe as $produitFourniture) {
                $prixAchat = $prixAchat + $produitFourniture->getFourniture()->getPrixActuel() * $produitFourniture->getNbFourniture();
            }
            $produit->setPrixAchat($prixAchat);
            $produit->setBenefice($produit->getPrixVente() - $produit->getPrixAchat());
        }

        return $produits;
    }
}
