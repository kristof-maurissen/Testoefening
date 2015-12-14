<?php

//src/DrankProject/Data/MuntenDAO.php

namespace DrankProject\Data;

use DrankProject\Data\DBConfig;
use DrankProject\Entities\Munten;
//use DrankProject\Exceptions\VoorraadLeegException;
use PDO;

class MuntenDAO {
    
    public function getAlleMunten() {
        $sql = "select * from munten"; 
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array(); 
        
        foreach ($resultSet as $rij) {
            $munten = Munten::create($rij["id"], $rij["twee"], $rij["een"], $rij["halve"],$rij["twintigcent"], $rij["tiencent"]); 
            array_push($lijst, $munten);  
        } 
            $dbh = null; 
            return $lijst;        
    }
    
    public function getMuntById($id) {
        $sql = "select id, munt from munten where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':id' => $id)); 
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $munten = munten::create($rij["id"], $rij["munt"]);
        
        $dbh = null; 
        return $munten; 
    }
    
    public function updateMunten($id, $munt) {
        $sql = "update munten set :munt, :totaal where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":id" => $id, ":munt" => $munt, "totaal" => $totaal));
        $dbh = null;
        
    }
    
}

