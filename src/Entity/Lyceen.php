<?php

namespace App\Entity;

use App\Repository\LyceenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LyceenRepository::class)]
class Lyceen extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $class = null;

    #[ORM\ManyToOne]
    private ?Lycee $lycee = null;

    public function getIdParent()
    {
        return parent::getId();
    }


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

    public function getLycee(): ?Lycee
    {
        return $this->lycee;
    }

    public function setLycee(?Lycee $lycee): self
    {
        $this->lycee = $lycee;

        return $this;
    }

    public function __toString()
    {
        return (String)$this->class;
    }
    
}
