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
    
    public function updateVoorraad($id, $voorraad) {
        $drankDAO = new DrankDAO();
        $drank = $drankDAO->getVooraadById($id);
        $drank->setVoorraad($voorraad);
        $drankDAO->updateDrank($drank);
    }
    
    public function getRestVoorraad($id) {
        $drankDAO = new DrankDAO();
        $lijst = $drankDAO->getVooraadById($id);
        return $lijst;
    }
}


