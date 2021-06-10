<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
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
           * min = 3, 
           * max = 50, 
           * minMessage = "Le nom d'une formation doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "Le nom d'une formation doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $NomFormation;

   /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 3, 
           * max = 50, 
           * minMessage = "Le centre d'une formation doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "Le centre d'une formation doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Centre;

   /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 3, 
           * max = 50, 
           * minMessage = "Le nom de formateur d'une formation doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "Le nom de formateur d'une formation doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Formateur;

    /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 10, 
           * max = 10, 
           * minMessage = "La date debut d'une formation doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "La date debut d'une formation doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $DateDebut;

     /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 10, 
           * max = 10, 
           * minMessage = "La date fin d'une formation doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "La date fin d'une formation doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $DateFin;

   /**
      * @ORM\Column(type="string", length=255) 
      * @Assert\Length(
           * min = 4, 
           * max = 50, 
           * minMessage = "Le lieu d'une formation doit comporter au moins {{ limit }} caractères", 
           * maxMessage = "Le lieu d'une formation doit comporter au plus {{ limit }} caractères" 
           * )
           */
    private $Lieu;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="formations")
     */
    private $employe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFormation(): ?string
    {
        return $this->NomFormation;
    }

    public function setNomFormation(string $NomFormation): self
    {
        $this->NomFormation = $NomFormation;

        return $this;
    }

    public function getCentre(): ?string
    {
        return $this->Centre;
    }

    public function setCentre(string $Centre): self
    {
        $this->Centre = $Centre;

        return $this;
    }

    public function getFormateur(): ?string
    {
        return $this->Formateur;
    }

    public function setFormateur(string $Formateur): self
    {
        $this->Formateur = $Formateur;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->DateDebut;
    }

    public function setDateDebut(string $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->DateFin;
    }

    public function setDateFin(string $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->Lieu;
    }

    public function setLieu(string $Lieu): self
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(?Employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }
}
