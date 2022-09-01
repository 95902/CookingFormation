<?php

namespace App\Entity;

use App\Repository\ContenueFormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenueFormationRepository::class)
 */
class ContenueFormation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $jour_1 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $jour_2 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $jour_3 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $jour_4 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $jour_5 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $jour_6 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $jour_7 = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre_formation;


    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }
    public function __toString()
    {
        return  $this->getTitreFormation();     
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour1(): ?array
    {
        return $this->jour_1;
    }

    public function setJour1(?array $jour_1): self
    {
        $this->jour_1 = $jour_1;

        return $this;
    }

    public function getJour2(): ?array
    {
        return $this->jour_2;
    }

    public function setJour2(?array $jour_2): self
    {
        $this->jour_2 = $jour_2;

        return $this;
    }

    public function getJour3(): ?array
    {
        return $this->jour_3;
    }

    public function setJour3(?array $jour_3): self
    {
        $this->jour_3 = $jour_3;

        return $this;
    }

    public function getJour4(): ?array
    {
        return $this->jour_4;
    }

    public function setJour4(?array $jour_4): self
    {
        $this->jour_4 = $jour_4;

        return $this;
    }

    public function getJour5(): ?array
    {
        return $this->jour_5;
    }

    public function setJour5(?array $jour_5): self
    {
        $this->jour_5 = $jour_5;

        return $this;
    }

    public function getJour6(): ?array
    {
        return $this->jour_6;
    }

    public function setJour6(?array $jour_6): self
    {
        $this->jour_6 = $jour_6;

        return $this;
    }

    public function getJour7(): ?array
    {
        return $this->jour_7;
    }

    public function setJour7(?array $jour_7): self
    {
        $this->jour_7 = $jour_7;

        return $this;
    }

    public function getTitreFormation(): ?string
    {
        return $this->titre_formation;
    }

    public function setTitreFormation(string $titre_formation): self
    {
        $this->titre_formation = $titre_formation;

        return $this;
    }
}
