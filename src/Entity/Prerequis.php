<?php

namespace App\Entity;

use App\Repository\PrerequisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrerequisRepository::class)
 */
class Prerequis
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
    private $enonce_prerequis;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, mappedBy="prerequis")
     */
    private $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnoncePrerequis(): ?string
    {
        return $this->enonce_prerequis;
    }

    public function setEnoncePrerequis(string $enonce_prerequis): self
    {
        $this->enonce_prerequis = $enonce_prerequis;

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
            $formation->addPrerequi($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            $formation->removePrerequi($this);
        }

        return $this;
    }
}
