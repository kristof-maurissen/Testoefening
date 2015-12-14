<?php

//use DrankProject\Exceptions\VoorraadLeegException;
use DrankProject\Business\DrankenService;
//use DrankProject\Business\MuntenService;
require_once ("Bootstrap.php");
require_once ("Libraries/Twig/AutoLoader.php");

$drankSvc = new DrankenService(); 
$drankenLijst = $drankSvc->getDrankenOverzicht();

 if(isset($_GET["action"]) && $_GET["action"] == "voegtoe"){
        $bijvullen = true;
        if(isset($_GET["artikel"])){
            try{
                $drankSvc->voegDrankToe($_GET["artikel"], $_POST["aantalBijvullen"]);
                header("location:bijvullen.php");
                exit(0);
            } catch (AantalTeHoogException $ex) {
                header("location:bijvullen.php?error=tehoog");
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
    $view = $twig->render("Bijvullen.twig", array("drankenLijst" => $drankenLijst, "bijvullen" => $bijvullen, "errorTeHoog" => $errorTeHoog));
    print($view);


