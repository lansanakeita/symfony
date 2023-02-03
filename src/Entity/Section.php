<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: Lyceen::class)]
    private Collection $lyceens;

    public function __construct()
    {
        $this->lyceens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Lyceen>
     */
    public function getLyceens(): Collection
    {
        return $this->lyceens;
    }

    public function addLyceen(Lyceen $lyceen): self
    {
        if (!$this->lyceens->contains($lyceen)) {
            $this->lyceens->add($lyceen);
            $lyceen->setSection($this);
        }

        return $this;
    }

    public function removeLyceen(Lyceen $lyceen): self
    {
        if ($this->lyceens->removeElement($lyceen)) {
            // set the owning side to null (unless already changed)
            if ($lyceen->getSection() === $this) {
                $lyceen->setSection(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
