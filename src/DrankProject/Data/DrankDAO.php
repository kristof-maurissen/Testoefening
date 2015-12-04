<?php
//src/DrankProject/Data/DrankDAO.php

namespace DrankProject\Data;

use DrankProject\Data\DBConfig;
use DrankProject\Entities\Dranken;
//use DrankProject\Exceptions\VoorraadLeegExcept;
use PDO;

class DrankDAO {
    
    public function getAll() {
        $sql = "select * from dranken"; 
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array(); 
        
        foreach ($resultSet as $rij) {
            $dranken = Dranken::create($rij["id"], $rij["dranknaam"], $rij["prijs"], $rij["voorraad"], $rij["foto"]); 
            array_push($lijst, $dranken);  
        } 
            $dbh = null; 
            return $lijst;       
    }
    
    public function updateDrank($drank) {
        $sql = "update dranken set dranknaam = :dranknaam, prijs = :prijs, voorraad = :voorraad, foto = :foto where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":dranknaam" => $drank->getDrankNaam(), ":prijs" => $drank->getPrijs(), ":voorraad" => $drank->getVoorraad(), ":foto" => $drank->getFoto(), ":id" => $drank->getId()));
        $dbh = null;
    }
    
    public function getVooraadById($id) {
        $sql = "select id, dranknaam, prijs, voorraad from dranken where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':id' => $id)); 
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $dranken = dranken::create($rij["id"], $rij["dranknaam"], $rij["prijs"], $rij["voorraad"]);
        
        $dbh = null; 
        return $dranken; 
    }
    
}


