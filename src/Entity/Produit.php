<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private ?string $nom = null;


    #[ORM\Column(length: 100)]
    private ?string $ref = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Categorie::class)]
    private Collection $Categ;

    #[ORM\ManyToMany(targetEntity: Volontaire::class, mappedBy: 'prod')]
    private Collection $volontaires;



    public function __construct()
    {
        $this->Categ = new ArrayCollection();
        $this->volontaires = new ArrayCollection();
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
     * @return Collection<int, Categorie>
     */
    public function getCateg(): Collection
    {
        return $this->Categ;
    }

    public function addCateg(Categorie $categ): self
    {
        if (!$this->Categ->contains($categ)) {
            $this->Categ->add($categ);
            $categ->setProduit($this);
        }

        return $this;
    }

    public function removeCateg(Categorie $categ): self
    {
        if ($this->Categ->removeElement($categ)) {
            // set the owning side to null (unless already changed)
            if ($categ->getProduit() === $this) {
                $categ->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Volontaire>
     */
    public function getVolontaires(): Collection
    {
        return $this->volontaires;
    }

    public function addVolontaire(Volontaire $volontaire): self
    {
        if (!$this->volontaires->contains($volontaire)) {
            $this->volontaires->add($volontaire);
            $volontaire->addProd($this);
        }

        return $this;
    }

    public function removeVolontaire(Volontaire $volontaire): self
    {
        if ($this->volontaires->removeElement($volontaire)) {
            $volontaire->removeProd($this);
        }

        return $this;
    }

}
