<?php

namespace App\Entity;

use App\Repository\IntervenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntervenantRepository::class)]
class Intervenant extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $company = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Atelier::class, mappedBy: 'intervenant')]
    private Collection $ateliers;

    public function __construct()
    {
        parent::__construct();
        $this->ateliers = new ArrayCollection();
    }

    public function getIdParent()
    {
        return parent::getFirstName() . " " . parent::getLastName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function __toString()
    {
        return $this->getIdParent();
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
            $atelier->addIntervenant($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): self
    {
        if ($this->ateliers->removeElement($atelier)) {
            $atelier->removeIntervenant($this);
        }

        return $this;
    }
}
