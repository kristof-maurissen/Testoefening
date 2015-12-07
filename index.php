<?php
//index.php
use DrankProject\Exceptions\VoorraadLeegException;
use DrankProject\Business\DrankenService;
use DrankProject\Business\UserService;
require_once ("Bootstrap.php");
require_once ("Libraries/Twig/AutoLoader.php");

$drankSvc = new DrankenService(); 
$drankenLijst = $drankSvc->getDrankenOverzicht();

session_start();

    if(isset($_GET["bedrag"])) {
            $_SESSION["totaal"] += $_GET["bedrag"];
    }

    if(!isset($_GET["keuze"])) {
            $wissel = "";
            } else {
                $check = $drankSvc->checkTotaalIngegeven($_SESSION["totaal"], $_GET["keuze"]);
                if($check) {
                    $wissel = $drankSvc->berekenWissel($_SESSION["totaal"], $_GET["keuze"]);
                    try {
                        $drankSvc->updateVoorraad($_GET["keuze"]);
                        $muntenSvc->updateMunten($_GET["keuze"]);
                        $_SESSION["totaal"] = 0;
                    } catch (VoorraadLeegException $ex) {
                        header("location: index.php?error=voorraadleeg");
                        exit(0);
                }
            }
           if(!isset($_GET["error"])) {
                $errorVoorraad = false;
            } else if(isset ($_GET["error"]) && ($_GET["error"] == "voorraadleeg")) {
                $errorVoorraad = true;
            }

    }
    
    if (isset($_GET["action"]) && $_GET["action"] == "login") {
            $userservice = new UserService;
            try {
                $toegelaten = $userservice->controlUser($_POST["txtGebruiker"], $_POST["txtPaswoord"]);
            } catch (FoutieveLoginException $ex) {
                header("location: index.php?error=foutelogin");
                exit(0);
            }
            if(!isset($_GET["error"])) {
                $errorLogin = false;
            } else if(isset ($_GET["error"]) && ($_GET["error"] == "foutelogin")) {
                $errorLogin = true;
            }

            if ($toegelaten) {
                $_SESSION["aangemeld"] = true;
             header ("location: index.php?action=login"); 
                exit(0);
            }
    }

$view = $twig->render("DrankenAutomaat.twig", array("drankenlijst" => $drankenLijst, "totaal" => $_SESSION["totaal"], "errorVoorraad" => ["error"],"check" => ["keuze"], "wisselgeld" => $wissel));
print($view);
