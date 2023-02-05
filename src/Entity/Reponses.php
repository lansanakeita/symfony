<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponsesRepository::class)]
class Reponses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text_reponse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_reponse = null;


    #[ORM\ManyToOne(inversedBy: 'reponse')]
    private ?Archive $archive = null;

    #[ORM\Column(length: 255)]
    private ?string $text_reponse1 = null;

    #[ORM\Column(length: 255)]
    private ?string $text_reponse2 = null;

    #[ORM\Column(length: 255)]
    private ?string $text_reponse3 = null;

    #[ORM\Column(length: 255)]
    private ?string $text_reponse4 = null;

    #[ORM\ManyToMany(targetEntity: Lyceen::class, inversedBy: 'reponses')]
    private Collection $lyceen;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire = null;


    public function __construct()
    {
        $this->lyceen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextReponse(): ?string
    {
        return $this->text_reponse;
    }

    public function setTextReponse(string $text_reponse): self
    {
        $this->text_reponse = $text_reponse;

        return $this;
    }

    public function getDateReponse(): ?\DateTimeInterface
    {
        return $this->date_reponse;
    }

    public function setDateReponse(\DateTimeInterface $date_reponse): self
    {
        $this->date_reponse = $date_reponse;

        return $this;
    }



    public function getArchive(): ?Archive
    {
        return $this->archive;
    }

    public function setArchive(?Archive $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    public function getTextReponse1(): ?string
    {
        return $this->text_reponse1;
    }

    public function setTextReponse1(string $text_reponse1): self
    {
        $this->text_reponse1 = $text_reponse1;

        return $this;
    }

    public function getTextReponse2(): ?string
    {
        return $this->text_reponse2;
    }

    public function setTextReponse2(string $text_reponse2): self
    {
        $this->text_reponse2 = $text_reponse2;

        return $this;
    }

    public function getTextReponse3(): ?string
    {
        return $this->text_reponse3;
    }

    public function setTextReponse3(string $text_reponse3): self
    {
        $this->text_reponse3 = $text_reponse3;

        return $this;
    }

    public function getTextReponse4(): ?string
    {
        return $this->text_reponse4;
    }

    public function setTextReponse4(string $text_reponse4): self
    {
        $this->text_reponse4 = $text_reponse4;

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

    /**
     * @return Collection<int, Lyceen>
     */
    public function getLyceen(): Collection
    {
        return $this->lyceen;
    }

    public function addLyceen(Lyceen $lyceen): self
    {
        if (!$this->lyceen->contains($lyceen)) {
            $this->lyceen->add($lyceen);
        }

        return $this;
    }

    public function removeLyceen(Lyceen $lyceen): self
    {
        $this->lyceen->removeElement($lyceen);

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
