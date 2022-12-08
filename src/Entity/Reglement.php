<?php

namespace App\Entity;

use App\Repository\ReglementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReglementRepository::class)]
class Reglement
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
    private ?string $code_reg = null;
    /**
     * @ORM\Column(type="integer", length=10)
     */
    private ?int $montant = null;


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

}
