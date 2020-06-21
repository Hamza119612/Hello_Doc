<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialiteRepository::class)
 */
class Specialite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialite_medcin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialiteMedcin(): ?string
    {
        return $this->specialite_medcin;
    }

    public function setSpecialiteMedcin(string $specialite_medcin): self
    {
        $this->specialite_medcin = $specialite_medcin;

        return $this;
    }
}
