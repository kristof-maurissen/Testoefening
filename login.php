<?php
//use DrankProject\Exceptions\VoorraadLeegException;
//use DrankProject\Business\DrankenService;
use DrankProject\Business\UserService;

require_once ("Bootstrap.php");
require_once ("Libraries/Twig/AutoLoader.php");

session_start();

if (isset($_GET["action"]) && $_GET["action"] == "login") {
        $userservice = new UserService;
        $toegelaten = $userservice->controlUser($_POST["txtGebruiker"], $_POST["txtPaswoord"]);
        
        if ($toegelaten) {
            $_SESSION["aangemeld"] = true; //Variabele $_SESSION instellen (1 x = )
            header ("location: bijvullen.php"); 
            exit(0);
        
        }else {
            header ("location: login.php");
            exit(0);
        }
    }
    /*else {
        include ("Presentation/AanmeldForm.php");
    }*/

/*if (isset($_GET["action"]) && $_GET["action"] == "login") {
            $userservice = new UserService;
            try {
                $toegelaten = $userservice->controlUser($_POST["txtGebruiker"], $_POST["txtPaswoord"]);
            } catch (FoutieveLoginException $ex) {
                header("location: login.php?error=foutelogin");
                exit(0);
            }
            if(!isset($_GET["error"])) {
                $errorLogin = false;
            } else if(isset ($_GET["error"]) && ($_GET["error"] == "foutelogin")) {
                $errorLogin = true;
            }

            if ($toegelaten) {
                $_SESSION["aangemeld"] = true;
             header ("location: bijvullen.php"); 
                exit(0);
            }
    }*/

/*if(!isset($_SESSION["aangemeld"])){
    if(isset($_GET["action"]) && $_GET["action"] == "login"){
        $asvc = new UserService();
        $check = $asvc->checkLogin($_POST["txtGebruiker"], $_POST["txtPaswoord"]);
        if($check){
            $_SESSION["aangemeld"] = true;
            header("location:bijvullen.php");
            exit(0);
        }else{
            header("location:index.php");
            exit(0);
        }
    }
    /*else{
        $view = $twig->render("DrankenAutomaat.twig", array());
        print($view);
    }*/
    
/*}else{
    if(isset($_GET["action"]) && $_GET["action"] == "logout"){
        unset($_SESSION["aangemeld"]);
        header("location:index.php");
        exit(0);
    }

}*/
$view = $twig->render("Login.twig", array());
    print($view);