<?php

//src/DrankProject/Data/UserDAO.php

namespace DrankProject\Data;

use DrankProject\Data\DBConfig;
use DrankProject\Entities\User;

use PDO;

class UserDAO {
    
    public function getByUser($naam) {
       /* $controluser = $this->getByUser();
            if($controluser->getNaam() == false) 
            {
               throw new FoutieveLoginException();
            }*/
       
        $sql = ("select id, naam, pwoord from gebruiker where naam = :naam ");
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':naam' => $naam)); 
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rij) {
            $user = User::create ($rij["id"], $rij["naam"], $rij["pwoord"]);
            $dbh = null;
            return $user;
        }else {
            return null;
        }
    }
}

