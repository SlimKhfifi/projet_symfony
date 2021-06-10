<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EmployeRepository::class)
 */
class Employe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 8, 
           * max = 8, 
           * minMessage = "La cin d'un employe doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "La cin d'un employe doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Cin;

    /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 3, 
           * max = 50, 
           * minMessage = "Le nom d'un employe doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "Le nom d'un employe doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Nom;

    /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 3, 
           * max = 50, 
           * minMessage = "Le prenom d'un employe doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "Le prenom d'un employe doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Prenom;

    /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 3, 
           * max = 50, 
           * minMessage = "La fonction d'un employe doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "La fonction d'un employe doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Fonction;

    /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 3, 
           * max = 50, 
           * minMessage = "La direction d'un employe doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "La direction d'un employe doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Direction;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     
           
     */
    private $Salaire;

   /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 8, 
           * max = 8, 
           * minMessage = "Le nbre de tel d'un employe doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "Le nbre de tel d'un employe doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Telephone;

    /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 3, 
           * max = 50, 
           * minMessage = "L'email d'un employe doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "L'email d'un employe doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Email;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="employe")
     */
    private $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->Cin;
    }

    public function setCin(string $Cin): self
    {
        $this->Cin = $Cin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->Fonction;
    }

    public function setFonction(string $Fonction): self
    {
        $this->Fonction = $Fonction;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->Direction;
    }

    public function setDirection(string $Direction): self
    {
        $this->Direction = $Direction;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->Salaire;
    }

    public function setSalaire(string $Salaire): self
    {
        $this->Salaire = $Salaire;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setEmploye($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getEmploye() === $this) {
                $formation->setEmploye(null);
            }
        }

        return $this;
    }
}
