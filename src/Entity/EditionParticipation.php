<?php

namespace App\Entity;

use App\Repository\EditionParticipationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditionParticipationRepository::class)]
class EditionParticipation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $year = null;

    // #[ORM\ManyToOne]
    // private ?Intervenant $intervenant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    // public function getIntervenant(): ?Intervenant
    // {
    //     return $this->intervenant;
    // }

    // public function setIntervenant(?Intervenant $intervenant): self
    // {
    //     $this->intervenant = $intervenant;

    //     return $this;
    // }
}
