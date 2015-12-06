<?php
//index.php

use DrankProject\Business\DrankenService;
require_once ("Bootstrap.php");
require_once ("Libraries/Twig/AutoLoader.php");

$drankSvc = new DrankenService(); 
$drankenLijst = $drankSvc->getDrankenOverzicht();

session_start();

if(isset($_GET["bedrag"])) {
    $_SESSION["totaal"] += $_GET["bedrag"];
}

if(isset($_GET["keuze"])) {
    $check = $drankSvc->checkTotaalIngegeven($_SESSION["totaal"], $_GET["keuze"]);
    if($check) {
        $wissel = $drankSvc->berekenWissel($_SESSION["totaal"], $_GET["keuze"]);
        try {
            $drankSvc->updateVoorraad($id, $voorraad);
            $_SESSION["totaal"] = 0;
        } catch (VoorraadLeegExcept $ex) {
            header("location: index.php?error=voorraadleeg");
            exit(0);

        }
    } else {
        $wissel = "";
    }
    if(isset($_GET["error"]) && $_GET["error"] == "voorraadleeg") {
        $errorVoorraad = true;
    } else {
        $errorVoorraad = false;
    }
}

$view = $twig->render("DrankenAutomaat.twig", array("drankenlijst" => $lijst, "totaal" => $_SESSION["totaal"], "check" => $check, "wisselgeld" => $wissel, "errorVoorraad" => $errorVoorraad));
print($view);
