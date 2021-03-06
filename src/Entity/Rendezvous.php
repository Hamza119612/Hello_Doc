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
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_rdv;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_rdv;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rendezvouses" , cascade={"persist"})
     */
    private $User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $docotr_name;

   

    public function getId_rdv(): ?int
    {
        return $this->id_rdv;
    }

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->date_rdv;
    }

    public function setDateRdv(\DateTimeInterface $date_rdv): self
    {
        $this->date_rdv = $date_rdv;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getDocotrName(): ?string
    {
        return $this->docotr_name;
    }

    public function setDocotrName(string $docotr_name): self
    {
        $this->docotr_name = $docotr_name;

        return $this;
    }

   

   
}
