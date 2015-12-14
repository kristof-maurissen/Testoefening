<?php
//src/DrankProject/Business/DrankenService.php

namespace DrankProject\Business;
use DrankProject\Data\DrankDAO;


class DrankenService {
    
    public function getDrankenOverzicht() {
        $drankDAO = new DrankDAO(); 
        $lijst = $drankDAO->getAll(); 
        return $lijst; 
    }
    
    public function checkTotaalIngegeven($totaal, $keuzedrank) {
        $drankDAO = new DrankDAO();
        $drank = $drankDAO->getDrankById($keuzedrank);
        if($drank) {
            if($totaal >= $drank->getPrijs()) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function berekenWissel($totaal, $keuzedrank){
        $drankDAO = new DrankDAO();
        $drank = $drankDAO->getDrankById($keuzedrank);
        $rest = $totaal - $drank->getPrijs();
        $wissel = array("2" => 0, "1" => 0, "0.5" => 0, "0.2" => 0, "0.1" => 0);
        /*$wissel[0] = 0;
        $wissel[1] = 0;
        $wissel[2] = 0;
        $wissel[3] = 0;
        $wissel[4] = 0;*/
        if($drank){
         while($rest > 0) {
             
               if($rest >= 2){
                    $wissel["2"]++;
                    $rest -= 2;
                }
                if($rest >= 1){
                    $wissel["1"]++;
                    $rest -= 1;
                }
                 if($rest >= 0.5){
                    $wissel["0.5"]++;
                    $rest -=0.5;
                }
                if($rest >= 0.4){
                    $wissel["0.2"]++;
                    $rest -= 0.2;
                }
                if($rest >= 0.2){
                    $wissel["0.2"]++;
                    $rest -= 0.2;
                }
                if($rest >= 0.1){
                    $wissel["0.1"]++;
                    $rest -= 0.1;
                }
                else{
                    $rest = 0;
                }
           }
           
        }
        
        return $wissel;
    }
    
    public function updateVoorraad($keuze) {
        $drankDAO = new DrankDAO();
        $drank = $drankDAO->getDrankById($keuze);
        $voorraad = $drank->getVoorraad();
        $voorraad--;
        $drankDAO->updateDrank($keuze, $voorraad);
    }
    
    Public function voegDrankToe($keuze, $aantal) {
        $drankDAO = new DrankDAO();
        $drank = $drankDAO->getDrankById($keuze);
        $voorraad = $drank->getVoorraad();
        $voorraad += $aantal;
        $drankDAO->updateDrank($keuze, $voorraad);
    }
}


