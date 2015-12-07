<?php
//src/DrankProject/Data/DrankDAO.php

namespace DrankProject\Data;

use DrankProject\Data\DBConfig;
use DrankProject\Entities\Dranken;
use DrankProject\Exceptions\VoorraadLeegException;
use PDO;

class DrankDAO {
    
    public function getAll() {
        $sql = "select * from dranken"; 
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array(); 
        
        foreach ($resultSet as $rij) {
            $dranken = Dranken::create($rij["id"], $rij["dranknaam"], $rij["prijs"], $rij["voorraad"]); 
            array_push($lijst, $dranken);  
        } 
            $dbh = null; 
            return $lijst;       
    }
    
    public function getDrankById($id) {
        $sql = "select id, dranknaam, prijs, voorraad from dranken where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':id' => $id)); 
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $dranken = dranken::create($rij["id"], $rij["dranknaam"], $rij["prijs"], $rij["voorraad"]);
        
        $dbh = null; 
        return $dranken; 
    }
    public function updateDrank($id, $voorraad) {
        $drank = $this->getDrankById($id);
            if($drank->getVoorraad() <= 0 ) {
               throw new VoorraadLeegException();
            }
            
        $sql = "update dranken set voorraad = :voorraad where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array( ":voorraad" => $voorraad, ":id" => $id));
        $dbh = null;
    }
    
    
    
}


