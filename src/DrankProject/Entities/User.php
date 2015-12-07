<?php

namespace DrankProject\Entities; 

class User {
    
    private static $idMap = array(); 
    
    private $id;
    private $naam;
    private $pwoord;
    
    private function __construct($id, $naam, $pwoord) {
        
        $this->id = $id; 
        $this->naam = $naam; 
        $this->pwoord = $pwoord;   
    } 
    
    public static function create($id, $naam, $pwoord) { 
        
        if (!isset(self::$idMap[$id])) { 
            self::$idMap[$id] = new User($id, $naam, $pwoord); 
            } 
        return self::$idMap[$id]; 
        
        }
    
    public function getNaam() {
        return $this->naam;  
    }
    public function getPwoord() {
        return $this->pwoord;
    }
    
    
}

