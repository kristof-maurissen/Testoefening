<?php 
//test.php 

use DrankProject\Business\DrankenService;
require_once ("Bootstrap.php");

$drankSvc = new DrankenService(); 
$drankenLijst = $drankSvc->getRestVoorraad(6);
print("<pre>"); 
print_r($drankenLijst); 
print("</pre>");

/*u<?php
//test.php 
se DrankProject\Data\DrankDAO;
require_once("Bootstrap.php"); 

$dao = new DrankDAO(); 
$lijst = $dao->getAll();
print("<pre>"); 
var_dump($lijst); 
print("</pre>");*/ 
