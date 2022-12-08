<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;
    /**
     * @ORM\Column(type="integer", length=10)
     */
    private ?int $code_cat = null;
    /**
     * @ORM\Column(type="string", length=10)
     */
    private ?string $famille_cat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCat(): ?int
    {
        return $this->code_cat;
    }

    public function setCodeCat(int $code_cat): self
    {
        $this->code_cat = $code_cat;

        return $this;
    }

    public function getFamilleCat(): ?string
    {
        return $this->famille_cat;
    }

    public function setFamilleCat(string $famille_cat): self
    {
        $this->famille_cat = $famille_cat;

        return $this;
    }

}
