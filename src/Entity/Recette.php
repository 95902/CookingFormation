<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resume;

    /**
     * @ORM\Column(type="json")
     */
    private $caracteristique = [];

    /**
     * @ORM\Column(type="json")
     */
    private $ingredient = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $astuceduchef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToOne(targetEntity=ProcedeRecette::class, inversedBy="recette", cascade={"persist", "remove"})
     */
    private $procederecette;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getCaracteristique(): ?array
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(array $caracteristique): self
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getIngredient(): ?array
    {
        return $this->ingredient;
    }

    public function setIngredient(array $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getAstuceduchef(): ?string
    {
        return $this->astuceduchef;
    }

    public function setAstuceduchef(string $astuceduchef): self
    {
        $this->astuceduchef = $astuceduchef;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getProcederecette(): ?ProcedeRecette
    {
        return $this->procederecette;
    }

    public function setProcederecette(?ProcedeRecette $procederecette): self
    {
        $this->procederecette = $procederecette;

        return $this;
    }
}
