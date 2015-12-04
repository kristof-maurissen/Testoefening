<?php
//index.php

use DrankProject\Business\DrankenService;
require_once ("Bootstrap.php");
//require_once ("Libraries/Twig/AutoLoader.php");

$drankSvc = new DrankenService(); 
$drankenLijst = $drankSvc->getDrankenOverzicht();



/*if (isset($_GET["keuze"])) {
    
    $drankScv = new DrankenService();
    $drankScv->updateVoorraad($_GET["id"], $_GET["voorraad"]);
    exit(0);
    
}*/

include ("src/DrankProject/Presentation/DrankenAutomaat.php");