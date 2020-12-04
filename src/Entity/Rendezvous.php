<?php

namespace App\Entity;

use App\Repository\RendezvousRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RendezvousRepository::class)
 */
class Rendezvous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $occup�;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="rendezvouses")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureAt(): ?\DateTimeInterface
    {
        return $this->heureAt;
    }

    public function setHeureAt(\DateTimeInterface $heureAt): self
    {
        $this->heureAt = $heureAt;

        return $this;
    }

    public function getOccup�(): ?bool
    {
        return $this->occup�;
    }

    public function setOccup�(bool $occup�): self
    {
        $this->occup� = $occup�;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
}
