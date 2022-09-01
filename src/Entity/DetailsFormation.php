<?php

namespace App\Entity;

use App\Repository\DetailsFormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetailsFormationRepository::class)
 */
class DetailsFormation
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
    private $type_details_formation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enoncer_details_formation;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, mappedBy="details_formation")
     */
    private $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }
    public function __toString()
    {
        return  $this->getTypeDetailsFormation().': '.$this->getEnoncerDetailsFormation();     
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDetailsFormation(): ?string
    {
        return $this->type_details_formation;
    }

    public function setTypeDetailsFormation(string $type_details_formation): self
    {
        $this->type_details_formation = $type_details_formation;

        return $this;
    }

    public function getEnoncerDetailsFormation(): ?string
    {
        return $this->enoncer_details_formation;
    }

    public function setEnoncerDetailsFormation(string $enoncer_details_formation): self
    {
        $this->enoncer_details_formation = $enoncer_details_formation;

        return $this;
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->addDetailsFormation($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            $formation->removeDetailsFormation($this);
        }

        return $this;
    }
}
