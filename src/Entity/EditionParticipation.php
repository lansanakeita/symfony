<?php

namespace App\Entity;

use App\Repository\EditionParticipationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?\DateTimeInterface $annee = null;

    #[ORM\ManyToOne(inversedBy: 'editionParticipations')]
    private ?Questions $questions = null;

    #[ORM\Column]
    private ?bool $active_year = null;



    public function __construct()
    {
    }



    // #[ORM\ManyToOne]
    // private ?Intervenant $intervenant = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getQuestions(): ?Questions
    {
        return $this->questions;
    }

    public function setQuestions(?Questions $questions): self
    {
        $this->questions = $questions;

        return $this;
    }

    public function isActiveYear(): ?bool
    {
        return $this->active_year;
    }

    public function setActiveYear(bool $active_year): self
    {
        $this->active_year = $active_year;

        return $this;
    }





}
