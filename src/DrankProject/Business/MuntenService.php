<?php

//src/DrankProject/Business/MuntenService.php

namespace DrankProject\Business;
use DrankProject\Data\MuntenDAO;

class MuntenService {
    
    public function getMuntenOverzicht() {
        $muntenDAO = new MuntenDAO(); 
        $lijst = $muntenDAO->getAlleMunten(); 
        return $lijst; 
    }
    
    public function updateMunten($munt) {
        $muntenDAO = new MuntenDAO();
        $munten = $muntenDAO->getDrankById($keuze);
        $saldo = $munten->getTotaal();
        $saldo += $munt;
        $muntenDAO->updateMunten($munt);
    }
    
    
    public function resetMunten(){
        $muntenDAO = new MuntenDAO();
        $reset = $muntenDAO->updateMunten();
    }
    
    public function getTotaal($id) {
        $muntenDAO = new MuntenDAO();
        $munten = $muntenDAO->getTotaal;
        return $munten;
    }
}