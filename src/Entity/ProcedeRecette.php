<?php

namespace App\Entity;

use App\Repository\ProcedeRecetteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcedeRecetteRepository::class) ]);
 */
class ProcedeRecette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre_recette;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $etape1 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $etape2 = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $etape3 = [];

    /**
     * @ORM\OneToOne(targetEntity=Recette::class, mappedBy="procederecette", cascade={"persist", "remove"})
     */
    private $recette;

    public function __toString()
    {
        return  $this->getTitreRecette();     
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreRecette(): ?string
    {
        return $this->titre_recette;
    }

    public function setTitreRecette(string $titre_recette): self
    {
        $this->titre_recette = $titre_recette;

        return $this;
    }

    public function getEtape1(): ?array
    {
        return $this->etape1;
    }

    public function setEtape1(?array $etape1): self
    {
        $this->etape1 = $etape1;

        return $this;
    }

    public function getEtape2(): ?array
    {
        return $this->etape2;
    }

    public function setEtape2(?array $etape2): self
    {
        $this->etape2 = $etape2;

        return $this;
    }

    public function getEtape3(): ?array
    {
        return $this->etape3;
    }

    public function setEtape3(?array $etape3): self
    {
        $this->etape3 = $etape3;

        return $this;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        // unset the owning side of the relation if necessary
        if ($recette === null && $this->recette !== null) {
            $this->recette->setProcederecette(null);
        }

        // set the owning side of the relation if necessary
        if ($recette !== null && $recette->getProcederecette() !== $this) {
            $recette->setProcederecette($this);
        }

        $this->recette = $recette;

        return $this;
    }
}
