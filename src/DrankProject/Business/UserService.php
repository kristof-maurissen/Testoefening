<?php
//src/DrankProject/Business/UserService.php

namespace DrankProject\Business;
use DrankProject\Data\UserDAO;

Class UserService {
    
    public function controlUser($naam, $pwoord) {
        $userDao = new UserDAO();
        $user = $userDao->getByUser($naam);
        if (isset($user) && $user->getPwoord() == $pwoord){
        return true;
        } else {
        return false;
        } 
    }
}

