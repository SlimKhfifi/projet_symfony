<?php namespace App\Entity;
 use Doctrine\ORM\Mapping as ORM;
  class EmployeSearch {
       /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Employe")
         */ private $employe;
         
         public function getEmploye(): ?Employe {
               return $this->employe;
 } 



 public function setEmploye(?Employe $employe): self {
      $this->employe = $employe;
      
      return $this;
     
     } }