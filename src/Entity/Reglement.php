<?php

namespace App\Entity;

use App\Repository\ReglementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReglementRepository::class)]
class Reglement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $code_reg = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\ManyToOne(inversedBy: 'reg')]
    private ?Volontairee $volontairee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeReg(): ?string
    {
        return $this->code_reg;
    }

    public function setCodeReg(string $code_reg): self
    {
        $this->code_reg = $code_reg;

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

    public function getVolontairee(): ?Volontairee
    {
        return $this->volontairee;
    }

    public function setVolontairee(?Volontairee $volontairee): self
    {
        $this->volontairee = $volontairee;

        return $this;
    }
}
