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
    
    public function updateMunten($id, $twee, $een, $twintigcent, $tiencent) {
        $sql = "update munten set twee = :twee, een = :een, halve = :halve, twintigcent = :twintigcent, tiencent = :tiencent where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array( ":twee" => $twee, ":een" => $een, ":halve" => $halve, ":twintigcent" => $twintigcent, ":tiencent" => $tiencent, ":id" => $id));
        $dbh = null;
        
    }
    
}

