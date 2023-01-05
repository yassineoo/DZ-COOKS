<?php

require_once "../controllers/nutrationController.php" ;


session_start();

if(isset($_POST["submit"])) {

    $name = $_POST["name"];
    $calories = $_POST["calories"];
    $categorie  = $_POST["categorie"];
    $season = $_POST["season"];
    $Vnumber =  intval($_POST["vitamineNumber"]);
    $Mnumber =  intval($_POST["minerauxNumber"]);
    $info =  intval($_POST["infoNumber"]);
  
    $vitamines = array();
    $mineraux = array();
    $information = array();


   for ($i=1; $i <=$Vnumber  ; $i++) { 

    array_push ($vitamines , [$_POST["vitamine".$i] , $_POST["qteV".$i]]);
   }
   
   for ($i=1; $i <=$Mnumber  ; $i++) { 

    array_push ($mineraux , [$_POST["mineraux".$i] , $_POST["qteM".$i]]);
   }
   for ($i=1; $i <=$info ; $i++) { 

    array_push ($information , [$_POST["information".$i] , $_POST["qteI".$i]]);
   }

}

$cntrl  = new NutrationController();

$cntrl->addIngredeient($name ,$calories ,$season ,$categorie, $vitamines,$mineraux , $information);



?>