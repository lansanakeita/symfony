<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(type: Types::DATE_MUTABLE)]
    // private ?\DateTimeInterface $date_inscription = null;

    // #[ORM\Column(type: Types::TIME_MUTABLE)]
    // private ?\DateTimeInterface $creaneau = null;

    #[ORM\ManyToOne(inversedBy: 'participation')]
    private ?User $user = null;

    #[ORM\ManyToOne]
    private ?Atelier $atelier = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    // public function getDateInscription(): ?\DateTimeInterface
    // {
    //     return $this->date_inscription;
    // }

    // public function setDateInscription(\DateTimeInterface $date_inscription): self
    // {
    //     $this->date_inscription = $date_inscription;

    //     return $this;
    // }

    // public function getCreaneau(): ?\DateTimeInterface
    // {
    //     return $this->creaneau;
    // }

    // public function setCreaneau(\DateTimeInterface $creaneau): self
    // {
    //     $this->creaneau = $creaneau;

    //     return $this;
    // }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAtelier(): ?Atelier
    {
        return $this->atelier;
    }

    public function setAtelier(?Atelier $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }
}
