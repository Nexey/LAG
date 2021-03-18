<?php

namespace App\Entity;

use App\Repository\FournitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournitureRepository::class)
 */
class Fourniture
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_depart;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_actuel;

    /**
     * @ORM\OneToMany(targetEntity=ProduitFourniture::class, mappedBy="fourniture")
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

    public function getPrixDepart(): ?float
    {
        return $this->prix_depart;
    }

    public function setPrixDepart(?float $prix_depart): self
    {
        $this->prix_depart = $prix_depart;

        return $this;
    }

    public function getPrixActuel(): ?float
    {
        return $this->prix_actuel;
    }

    public function setPrixActuel(?float $prix_actuel): self
    {
        $this->prix_actuel = $prix_actuel;

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
            $produitFourniture->setFourniture($this);
        }

        return $this;
    }

    public function removeProduitFourniture(ProduitFourniture $produitFourniture): self
    {
        if ($this->produitFournitures->removeElement($produitFourniture)) {
            // set the owning side to null (unless already changed)
            if ($produitFourniture->getFourniture() === $this) {
                $produitFourniture->setFourniture(null);
            }
        }

        return $this;
    }
}
