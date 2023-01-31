<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomCompetence = null;

    #[ORM\ManyToMany(targetEntity: Metier::class, inversedBy: 'competences')]
    private Collection $metier;

    public function __construct()
    {
        $this->metier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompetence(): ?string
    {
        return $this->nomCompetence;
    }

    public function setNomCompetence(string $nomCompetence): self
    {
        $this->nomCompetence = $nomCompetence;

        return $this;
    }

    /**
     * @return Collection<int, Metier>
     */
    public function getMetier(): Collection
    {
        return $this->metier;
    }

    public function addMetier(Metier $metier): self
    {
        if (!$this->metier->contains($metier)) {
            $this->metier->add($metier);
        }

        return $this;
    }

    public function removeMetier(Metier $metier): self
    {
        $this->metier->removeElement($metier);

        return $this;
    }
}
