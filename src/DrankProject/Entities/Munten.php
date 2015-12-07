<?php
//src/DrankProject/Entities/Munten.php

namespace DrankProject\Entities;

class Munten {
    
   private static $idMap = array();
    
    private $id;
    private $twee;
    private $een;
    private $halve;
    private $twintigcent;
    private $tiencent;
   
    
    private function __construct($id, $twee, $een, $halve, $twintigcent, $tiencent) {
        $this->id = $id;
        $this->twee = $twee;
        $this->een = $een;
        $this->halve = $halve;
        $this->twintigcent = $twintigcent;
        $this->tiencent = $tiencent;
    }
    
    public static function create($id, $twee, $een, $halve, $twintigcent, $tiencent) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Dranken($id, $twee, $een, $halve, $twintigcent, $tiencent);
        }
        return self::$idMap[$id];
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getTwee(){
        return $this->twee;
    }
    
    public function getEen(){
        return $this->een;
    }
    
    public function getHalve() {
        return $this->halve;
    }
    
    public function getTwintigcent() {
        return $this->twintigcent;
    }
    
    public function getTiencent() {
        return $this->tiencent;
    }
}

