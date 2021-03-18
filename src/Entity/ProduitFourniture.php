<?php

namespace App\Entity;

use App\Repository\ProduitFournitureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitFournitureRepository::class)
 */
class ProduitFourniture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="produitFournitures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity=Fourniture::class, inversedBy="produitFournitures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fourniture;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_fourniture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getFourniture(): ?Fourniture
    {
        return $this->fourniture;
    }

    public function setFourniture(?Fourniture $fourniture): self
    {
        $this->fourniture = $fourniture;

        return $this;
    }

    public function getNbFourniture(): ?int
    {
        return $this->nb_fourniture;
    }

    public function setNbFourniture(int $nb_fourniture): self
    {
        $this->nb_fourniture = $nb_fourniture;

        return $this;
    }
}
