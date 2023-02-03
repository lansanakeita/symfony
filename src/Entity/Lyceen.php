<?php

namespace App\Entity;

use App\Repository\LyceenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LyceenRepository::class)]
class Lyceen extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Lycee $lycee = null;

    #[ORM\ManyToOne(inversedBy: 'lyceens')]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Atelier::class, mappedBy: 'lyceen')]
    private Collection $ateliers;

    #[ORM\ManyToOne(inversedBy: 'lyceens')]
    private ?Section $section = null;

    public function __construct()
    {
        parent::__construct();
        $this->ateliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLycee(): ?Lycee
    {
        return $this->lycee;
    }

    public function setLycee(?Lycee $lycee): self
    {
        $this->lycee = $lycee;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
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
            $atelier->addLyceen($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): self
    {
        if ($this->ateliers->removeElement($atelier)) {
            $atelier->removeLyceen($this);
        }

        return $this;
    }

    public function getIdParent()
    {
        return parent::getFirstName() . " " . parent::getLastName();
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }
    
}
