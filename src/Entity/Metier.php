<?php

namespace App\Entity;

use App\Repository\MetierRepository;
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

    #[ORM\Column(length: 100)]
    private ?string $activites = null;

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

    public function getActivites(): ?string
    {
        return $this->activites;
    }

    public function setActivites(string $activites): self
    {
        $this->activites = $activites;

        return $this;
    }
}
