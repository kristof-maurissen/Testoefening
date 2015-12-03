<?php

namespace DrankProject\Entities;

class Dranken {
    
    private static $idMap = array();
    
    private $id;
    private $dranknaam;
    private $prijs;
    private $voorraad;
    
    private function __construct($id, $dranknaam, $prijs, $voorraad) {
        $this->id = $id;
        $this->dranknaam = $dranknaam;
        $this->prijs = $prijs;
        $this->voorraad = $voorraad;
    }
    
    public static function create($id, $dranknaam, $prijs, $voorraad) {
        if (!isset(self::$idMap["id"])) {
            self::$idMap["id"] = new Dranken($id, $dranknaam, $prijs, $voorraad);
        }
        return self::$idMap["id"];
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getDrankNaam(){
        return $this->dranknaam;
    }
    
    public function getPrijs(){
        return $this->prijs;
    }
    
    public function getVoorraad() {
        return $this->voorraad;
    }
    
    public function setVoorraad($voorraad) {
        $this->voorraad = $voorraad;
    }
            
}

