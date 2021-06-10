<?php namespace App\Entity;
 class SalaireSearch {
      /**
        * @var int|null
        */ private $minSalaire;
         /** 
           * @var int|null
           */
           private $maxSalaire;
            public function getMinSalaire(): ?int {
                 return $this->minSalaire;
                 }
                 
            public function setMinSalaire(int $minSalaire): self {
                 $this->minSalaire = $minSalaire;
                  return $this;
                 }
             public function getMaxSalaire(): ?int
             { 
              return $this->maxSalaire;
             } 
             public function setMaxSalaire(int $maxSalaire): self {
                  $this->maxSalaire = $maxSalaire; return $this; } }