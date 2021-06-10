<?php namespace App\Entity;
use App\Controller\PropertySearchType;
 class PropertySearch {
      private $NomFormation; public function getNomFormation(): ?string {
           return $this->NomFormation; }
            public function setNomFormation(string $NomFormation): self {
                 $this->NomFormation = $NomFormation; return $this; } }