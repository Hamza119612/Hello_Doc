<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="integer" , nullable=true)
     */
    private $telephone;

  

    /**
     * @ORM\Column(type="integer" , nullable=true)
     */
    private $prix_visite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CIN;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Cabinet_add;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_registred;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_de_naissance;

  

    /**
     * @ORM\OneToMany(targetEntity=Rendezvous::class, mappedBy="user")
     */
    private $rendezvouses;

    /**
     * @ORM\OneToMany(targetEntity=Specialite::class, mappedBy="user")
     */
    private $Specialite;



   

    public function __construct()
    {
        $this->rendezvouses = new ArrayCollection();
        $this->Specialite = new ArrayCollection();
    }

    

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = '';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }


    public function getPrixVisite(): ?int
    {
        return $this->prix_visite;
    }

    public function setPrixVisite(?int $prix_visite): self
    {
        $this->prix_visite = $prix_visite;

        return $this;
    }

    public function getCIN(): ?int
    {
        return $this->CIN;
    }

    public function setCIN(?int $CIN): self
    {
        $this->CIN = $CIN;

        return $this;
    }

    public function getCabinetAdd(): ?string
    {
        return $this->Cabinet_add;
    }

    public function setCabinetAdd(?string $Cabinet_add): self
    {
        $this->Cabinet_add = $Cabinet_add;

        return $this;
    }

    public function getIsRegistred(): ?bool
    {
        return $this->is_registred;
    }

    public function setIsRegistred(?bool $is_registred): self
    {
        $this->is_registred = $is_registred;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(?\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }


    /**
     * @return Collection|Rendezvous[]
     */
    public function getRendezvouses(): Collection
    {
        return $this->rendezvouses;
    }

    public function addRendezvouse(Rendezvous $rendezvouse): self
    {
        if (!$this->rendezvouses->contains($rendezvouse)) {
            $this->rendezvouses[] = $rendezvouse;
            $rendezvouse->setUser($this);
        }

        return $this;
    }

    public function removeRendezvouse(Rendezvous $rendezvouse): self
    {
        if ($this->rendezvouses->contains($rendezvouse)) {
            $this->rendezvouses->removeElement($rendezvouse);
            // set the owning side to null (unless already changed)
            if ($rendezvouse->getUser() === $this) {
                $rendezvouse->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Specialite[]
     */
    public function getSpecialite(): Collection
    {
        return $this->Specialite;
    }

    public function addSpecialite(Specialite $specialite): self
    {
        if (!$this->Specialite->contains($specialite)) {
            $this->Specialite[] = $specialite;
            $specialite->setUser($this);
        }

        return $this;
    }

    public function removeSpecialite(Specialite $specialite): self
    {
        if ($this->Specialite->contains($specialite)) {
            $this->Specialite->removeElement($specialite);
            // set the owning side to null (unless already changed)
            if ($specialite->getUser() === $this) {
                $specialite->setUser(null);
            }
        }

        return $this;
    }

 




}
