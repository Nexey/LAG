<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_vente;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_achat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $benefice;

    /**
     * @ORM\ManyToOne(targetEntity=Gamme::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gamme;

    /**
     * @ORM\OneToMany(targetEntity=ProduitFourniture::class, mappedBy="produit")
     */
    private $produitFournitures;

    public function __construct()
    {
        $this->produitFournitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prix_vente;
    }

    public function setPrixVente(float $prix_vente): self
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(?float $prix_achat): self
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getBenefice(): ?float
    {
        return $this->benefice;
    }

    public function setBenefice(?float $benefice): self
    {
        $this->benefice = $benefice;

        return $this;
    }

    public function getGamme(): ?Gamme
    {
        return $this->gamme;
    }

    public function setGamme(?Gamme $gamme): self
    {
        $this->gamme = $gamme;

        return $this;
    }

    /**
     * @return Collection|ProduitFourniture[]
     */
    public function getProduitFournitures(): Collection
    {
        return $this->produitFournitures;
    }

    public function addProduitFourniture(ProduitFourniture $produitFourniture): self
    {
        if (!$this->produitFournitures->contains($produitFourniture)) {
            $this->produitFournitures[] = $produitFourniture;
            $produitFourniture->setProduit($this);
        }

        return $this;
    }

    public function removeProduitFourniture(ProduitFourniture $produitFourniture): self
    {
        if ($this->produitFournitures->removeElement($produitFourniture)) {
            // set the owning side to null (unless already changed)
            if ($produitFourniture->getProduit() === $this) {
                $produitFourniture->setProduit(null);
            }
        }

        return $this;
    }
}
