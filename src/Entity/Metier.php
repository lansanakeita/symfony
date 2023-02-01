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
    private ?string $nomMetier = null;

    /**
     * @return string|null
     */
    public function getNomMetier(): ?string
    {
        return $this->nomMetier;
    }

    /**
     * @param string|null $nomMetier
     */
    public function setNomMetier(?string $nomMetier): void
    {
        $this->nomMetier = $nomMetier;
    }

    // #[ORM\Column(length: 100)]
    // private ?string $activites = null;

    #[ORM\ManyToMany(targetEntity: Atelier::class, mappedBy: 'metier')]
    private Collection $ateliers;


    #[ORM\OneToMany(mappedBy: 'metier', targetEntity: Competence::class)]
    private Collection $competence;

    #[ORM\OneToMany(mappedBy: 'metier', targetEntity: Activite::class)]
    private Collection $activite;


    public function __construct()
    {
        $this->ateliers = new ArrayCollection();
        $this->competence = new ArrayCollection();
        $this->activite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }




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
    

    public function __toString()
    {
        return (String)$this->nomMetier;
    }

    /**
     * @return Collection<int, Competence>
     */
    public function getCompetence(): Collection
    {
        return $this->competence;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competence->contains($competence)) {
            $this->competence->add($competence);
            $competence->setMetier($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competence->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getMetier() === $this) {
                $competence->setMetier(null);
            }
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
            $activite->setMetier($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activite->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getMetier() === $this) {
                $activite->setMetier(null);
            }
        }

        return $this;
    }


}
