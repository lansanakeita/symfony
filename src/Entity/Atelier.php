<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $nom_atelier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_atelier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url_ressource = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $pdf_ressource = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNomAtelier(): ?string
    {
        return $this->nom_atelier;
    }

    public function setNomAtelier(string $nom_atelier): self
    {
        $this->nom_atelier = $nom_atelier;

        return $this;
    }

    public function getDateAtelier(): ?\DateTimeInterface
    {
        return $this->date_atelier;
    }

    public function setDateAtelier(\DateTimeInterface $date_atelier): self
    {
        $this->date_atelier = $date_atelier;

        return $this;
    }

    public function getUrlRessource(): ?string
    {
        return $this->url_ressource;
    }

    public function setUrlRessource(?string $url_ressource): self
    {
        $this->url_ressource = $url_ressource;

        return $this;
    }

    public function getPdfRessource()
    {
        return $this->pdf_ressource;
    }

    public function setPdfRessource($pdf_ressource): self
    {
        $this->pdf_ressource = $pdf_ressource;

        return $this;
    }
}
