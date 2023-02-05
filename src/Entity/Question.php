<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: Reponse::class)]
    private Collection $reponse;

    #[ORM\Column(length: 255)]
    private ?string $text_question = null;

    #[ORM\Column(length: 255)]
    private ?string $text_question1 = null;

    #[ORM\Column(length: 255)]
    private ?string $text_question2 = null;

    #[ORM\Column(length: 255)]
    private ?string $text_question3 = null;

    #[ORM\Column(length: 255)]
    private ?string $text_question4 = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: EditionParticipation::class)]
    private Collection $editionParticipations;

    public function __construct()
    {
        $this->reponse = new ArrayCollection();
        $this->editionParticipations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Reponse>
     */
    public function getReponse(): Collection
    {
        return $this->reponse;
    }

    public function addReponse(Reponse $reponse): self
    {
        if (!$this->reponse->contains($reponse)) {
            $this->reponse->add($reponse);
            $reponse->setQuestion($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponse->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getQuestion() === $this) {
                $reponse->setQuestion(null);
            }
        }

        return $this;
    }

    public function getTextQuestion(): ?string
    {
        return $this->text_question;
    }

    public function setTextQuestion(string $text_question): self
    {
        $this->text_question = $text_question;

        return $this;
    }

    public function getTextQuestion1(): ?string
    {
        return $this->text_question1;
    }

    public function setTextQuestion1(string $text_question1): self
    {
        $this->text_question1 = $text_question1;

        return $this;
    }

    public function getTextQuestion2(): ?string
    {
        return $this->text_question2;
    }

    public function setTextQuestion2(string $text_question2): self
    {
        $this->text_question2 = $text_question2;

        return $this;
    }

    public function getTextQuestion3(): ?string
    {
        return $this->text_question3;
    }

    public function setTextQuestion3(string $text_question3): self
    {
        $this->text_question3 = $text_question3;

        return $this;
    }

    public function getTextQuestion4(): ?string
    {
        return $this->text_question4;
    }

    public function setTextQuestion4(string $text_question4): self
    {
        $this->text_question4 = $text_question4;

        return $this;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return Collection<int, EditionParticipation>
     */
    public function getEditionParticipations(): Collection
    {
        return $this->editionParticipations;
    }

    public function addEditionParticipation(EditionParticipation $editionParticipation): self
    {
        if (!$this->editionParticipations->contains($editionParticipation)) {
            $this->editionParticipations->add($editionParticipation);
            $editionParticipation->setQuestion($this);
        }

        return $this;
    }

    public function removeEditionParticipation(EditionParticipation $editionParticipation): self
    {
        if ($this->editionParticipations->removeElement($editionParticipation)) {
            // set the owning side to null (unless already changed)
            if ($editionParticipation->getQuestion() === $this) {
                $editionParticipation->setQuestion(null);
            }
        }

        return $this;
    }
}
