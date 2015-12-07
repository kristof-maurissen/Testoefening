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
    
    public function resetMunten(){
        $muntenDAO = new MuntenDAO();
        $reset = $muntenDAO->updateMunten();
    }
}