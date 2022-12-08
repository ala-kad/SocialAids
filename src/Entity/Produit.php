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
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;
    /**
     * @ORM\Column(type="string", length=10)
     */
    private ?string $nom = null;
    /**
     * @ORM\Column(type="string", length=10)
     */
    private ?string $ref = null;
    /**
     * @ORM\Column(type="integer", length=10)
     */
    private ?int $montant = null;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AssProduit", mappedBy="ProAss")
     */
    private Collection $assProduits;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VolProduit", mappedBy="ProVol")
     */
    private Collection $volProduits;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AssProduit", mappedBy="id_produit")
     */
    private Collection $AssProduits;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VolProduit", mappedBy="id_prod")
     */
    private Collection $VolProd;




    public function __construct()
    {
        $this->assProduits = new ArrayCollection();
        $this->volProduits = new ArrayCollection();
        $this->AssProduits = new ArrayCollection();
        $this->VolProd = new ArrayCollection();
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

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * @return Collection<int, AssProduit>
     */
    public function getAssProduits(): Collection
    {
        return $this->assProduits;
    }

    public function addAssProduit(AssProduit $assProduit): self
    {
        if (!$this->assProduits->contains($assProduit)) {
            $this->assProduits->add($assProduit);
            $assProduit->setProAss($this);
        }

        return $this;
    }

    public function removeAssProduit(AssProduit $assProduit): self
    {
        if ($this->assProduits->removeElement($assProduit)) {
            // set the owning side to null (unless already changed)
            if ($assProduit->getProAss() === $this) {
                $assProduit->setProAss(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VolProduit>
     */
    public function getVolProduits(): Collection
    {
        return $this->volProduits;
    }

    public function addVolProduit(VolProduit $volProduit): self
    {
        if (!$this->volProduits->contains($volProduit)) {
            $this->volProduits->add($volProduit);
            $volProduit->setProVol($this);
        }

        return $this;
    }

    public function removeVolProduit(VolProduit $volProduit): self
    {
        if ($this->volProduits->removeElement($volProduit)) {
            // set the owning side to null (unless already changed)
            if ($volProduit->getProVol() === $this) {
                $volProduit->setProVol(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VolProduit>
     */
    public function getVolProd(): Collection
    {
        return $this->VolProd;
    }

    public function addVolProd(VolProduit $volProd): self
    {
        if (!$this->VolProd->contains($volProd)) {
            $this->VolProd->add($volProd);
            $volProd->setIdProd($this);
        }
        return $this;
    }

    public function removeVolProd(VolProduit $volProd): self
    {
        if ($this->VolProd->removeElement($volProd)) {
            // set the owning side to null (unless already changed)
            if ($volProd->getIdProd() === $this) {
                $volProd->setIdProd(null);
            }
        }
        return $this;
    }
}
