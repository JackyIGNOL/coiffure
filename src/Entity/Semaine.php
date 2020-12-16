<?php

namespace App\Entity;

use App\Repository\SemaineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SemaineRepository::class)
 */
class Semaine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jour;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $horaire = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHoraire(): ?array
    {
        return $this->horaire;
    }

    public function setHoraire(?array $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }
}
