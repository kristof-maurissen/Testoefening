<?php

namespace Data\DranDAO;

class DrankDAO {
    
    public function getVooraadByID($id) {
        $sql = "select id, dranknaam, prijs, voorraad from dranken where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':id' => $id)); 
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $dranken = dranken::create($rij["id"], $rij["dranknaam"], $rij["prijs"], $rij["voorraad"]  );
        
        $dbh = null; 
        return $dranken; 
        
    
    }
}


