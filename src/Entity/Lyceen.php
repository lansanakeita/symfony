<?php

namespace App\Entity;

use App\Repository\LyceenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LyceenRepository::class)]
class Lyceen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $class = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToOne]
    private ?Lycee $lycee = null;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
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

    public function getLycee(): ?Lycee
    {
        return $this->lycee;
    }

    public function setLycee(?Lycee $lycee): self
    {
        $this->lycee = $lycee;

        return $this;
    }
    
}
