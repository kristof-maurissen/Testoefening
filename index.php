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



/*if(!isset($_SESSION["aangemeld"])){
    if(isset($_GET["action"]) && $_GET["action"] == "login"){
        $asvc = new AdminService();
        $check = $asvc->checkLogin($_POST["naam"], $_POST["wachtwoord"]);
        if($check){
            $_SESSION["aangemeld"] = true;
            header("refresh:2;url=adminController.php");
            exit(0);
        }else{
            header("location:adminController.php");
            exit(0);
        }
    }else{
        $view = $twig->render("adminLogin.twig", array());
        print($view);
    }
    
}else{
    if(isset($_GET["action"]) && $_GET["action"] == "logout"){
        unset($_SESSION["aangemeld"]);
        header("location:toonFrisdrankenController.php");
        exit(0);
    }
    if(isset($_GET["action"]) && $_GET["action"] == "voegtoe"){
        $bijvullen = true;
        if(isset($_GET["artikel"])){
            try{
                $fsvc->voegAantalToe($_GET["artikel"], $_POST["aantalBijvullen"]);
                header("location:adminController.php");
                exit(0);
            } catch (AantalTeHoogException $ath) {
                header("location:adminController.php?error=tehoog");
                exit(0);
            }
            
        }
    }else{
        $bijvullen = false;
    }
    if(isset($_GET["error"]) && $_GET["error"] == "tehoog"){
        $errorTeHoog = true;
    }else{
        $errorTeHoog = false;
    }
    $view = $twig->render("admin.twig", array("frisdrankenLijst" => $lijst, "bijvullen" => $bijvullen, "errorTeHoog" => $errorTeHoog));
    print($view);
}*/