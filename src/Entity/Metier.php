<?php

namespace App\Entity;

use App\Repository\MetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetierRepository::class)]
class Metier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_metier = null;

    // #[ORM\Column(length: 100)]
    // private ?string $activites = null;

    #[ORM\ManyToMany(targetEntity: Atelier::class, mappedBy: 'metier')]
    private Collection $ateliers;

    #[ORM\ManyToMany(targetEntity: Competence::class, mappedBy: 'metier')]
    private Collection $competences;

    #[ORM\ManyToMany(targetEntity: Activite::class, mappedBy: 'metier')]
    private Collection $activite;

    public function __construct()
    {
        $this->ateliers = new ArrayCollection();
        $this->competences = new ArrayCollection();
        $this->activite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMetier(): ?string
    {
        return $this->nom_metier;
    }

    public function setNomMetier(string $nom_metier): self
    {
        $this->nom_metier = $nom_metier;

        return $this;
    }

    // public function getActivites(): ?string
    // {
    //     return $this->activites;
    // }

    // public function setActivites(string $activites): self
    // {
    //     $this->activites = $activites;

    //     return $this;
    // }

    /**
     * @return Collection<int, Atelier>
     */
    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    public function addAtelier(Atelier $atelier): self
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers->add($atelier);
            $atelier->addMetier($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): self
    {
        if ($this->ateliers->removeElement($atelier)) {
            $atelier->removeMetier($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Competence>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences->add($competence);
            $competence->addMetier($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            $competence->removeMetier($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getActivite(): Collection
    {
        return $this->activite;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activite->contains($activite)) {
            $this->activite->add($activite);
            $activite->addMetier($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activite->removeElement($activite)) {
            $activite->removeMetier($this);
        }

        return $this;
    }
}
