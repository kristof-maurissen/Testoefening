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
    
    
}

