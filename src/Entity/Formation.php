<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
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
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sous_titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree_formation;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $contenue = [];

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="formations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity=Prerequis::class, inversedBy="formations")
     */
    private $prerequis;

    /**
     * @ORM\ManyToMany(targetEntity=Objectif::class, inversedBy="formations")
     */
    private $objectif;

    /**
     * @ORM\ManyToMany(targetEntity=DetailsFormation::class, inversedBy="formations")
     */
    private $details_formation;

    /**
     * @ORM\OneToOne(targetEntity=ContenueFormation::class, cascade={"persist", "remove"})
     */
    private $Contenue_formation;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function __construct()
    {
        $this->prerequis = new ArrayCollection();
        $this->objectif = new ArrayCollection();
        $this->details_formation = new ArrayCollection();
    }
    // public function __toString()
    // {
    //     return  $this->getTitre();     
    // }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    public function getSousTitre(): ?string
    {
        return $this->sous_titre;
    }

    public function setSousTitre(?string $sous_titre): self
    {
        $this->sous_titre = $sous_titre;

        return $this;
    }

    public function getDureeFormation(): ?string
    {
        return $this->duree_formation;
    }

    public function setDureeFormation(string $duree_formation): self
    {
        $this->duree_formation = $duree_formation;

        return $this;
    }

    public function getContenue(): ?array
    {
        return $this->contenue;
    }

    public function setContenue(?array $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getCategorie(): ?category
    {
        return $this->categorie;
    }

    public function setCategorie(?category $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Prerequis>
     */
    public function getPrerequis(): Collection
    {
        return $this->prerequis;
    }

    public function addPrerequi(Prerequis $prerequi): self
    {
        if (!$this->prerequis->contains($prerequi)) {
            $this->prerequis[] = $prerequi;
        }

        return $this;
    }

    public function removePrerequi(Prerequis $prerequi): self
    {
        $this->prerequis->removeElement($prerequi);

        return $this;
    }

    /**
     * @return Collection<int, Objectif>
     */
    public function getObjectif(): Collection
    {
        return $this->objectif;
    }

    public function addObjectif(Objectif $objectif): self
    {
        if (!$this->objectif->contains($objectif)) {
            $this->objectif[] = $objectif;
        }

        return $this;
    }

    public function removeObjectif(Objectif $objectif): self
    {
        $this->objectif->removeElement($objectif);

        return $this;
    }

    /**
     * @return Collection<int, DetailsFormation>
     */
    public function getDetailsFormation(): Collection
    {
        return $this->details_formation;
    }

    public function addDetailsFormation(DetailsFormation $detailsFormation): self
    {
        if (!$this->details_formation->contains($detailsFormation)) {
            $this->details_formation[] = $detailsFormation;
        }

        return $this;
    }

    public function removeDetailsFormation(DetailsFormation $detailsFormation): self
    {
        $this->details_formation->removeElement($detailsFormation);

        return $this;
    }

    public function getContenueFormation(): ?ContenueFormation
    {
        return $this->Contenue_formation;
    }

    public function setContenueFormation(?ContenueFormation $Contenue_formation): self
    {
        $this->Contenue_formation = $Contenue_formation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
