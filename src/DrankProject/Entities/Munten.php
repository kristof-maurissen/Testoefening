<?php
//src/DrankProject/Entities/Munten.php

namespace DrankProject\Entities;

class Munten {
    
   private static $idMap = array();
    
    private $id;
    private $munt;
    private $totaal;
   
    
    private function __construct($id, $munt, $totaal) {
        $this->id = $id;
        $this->munt = $munt;
        $this->totaal = $totaal;
    }
    
    public static function create($id, $munt, $totaal) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Dranken($id, $munt, $totaal);
        }
        return self::$idMap[$id];
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getMunt(){
        return $this->munt;
    }
    
    public function getTotaal(){
        return $this->totaal;
    }
}

