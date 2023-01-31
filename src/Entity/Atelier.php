<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Salle $salle = null;

    #[ORM\ManyToOne]
    private ?Secteur $secteur = null;

    #[ORM\ManyToMany(targetEntity: Metier::class, inversedBy: 'ateliers')]
    private Collection $metier;

    public function __construct()
    {
        $this->metier = new ArrayCollection();
    }

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

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getSecteur(): ?Secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

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
