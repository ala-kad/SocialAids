<?php

namespace App\Entity;

use App\Repository\VolontaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VolontaireRepository::class)
 */

class Volontaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id= null;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $lastname;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * ORM\OneToMany(targetEntity: "VolProduit::class", inversedBy="VolPro")
     */
    private Collection $volProduits;

    /**
     * ORM\OneToMany(targetEntity: "VolProduit::class", inversedBy="id_Vol")
     */
    private Collection $VolProduits;

    public function __construct()
    {
        $this->volProduits = new ArrayCollection();
        $this->VolProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
            $volProduit->setVolPro($this);
        }

        return $this;
    }

    public function removeVolProduit(VolProduit $volProduit): self
    {
        if ($this->volProduits->removeElement($volProduit)) {
            // set the owning side to null (unless already changed)
            if ($volProduit->getVolPro() === $this) {
                $volProduit->setVolPro(null);
            }
        }

        return $this;
    }}
