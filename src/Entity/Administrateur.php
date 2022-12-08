<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdministrateurRepository::class)
 */
class Administrateur
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
    private ?int $ident = null;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private ?string $nom = null;


    private ?int $tel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdent(): ?int
    {
        return $this->ident;
    }

    public function setIdent(int $ident): self
    {
        $this->ident = $ident;

        return $this;
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

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }


}
