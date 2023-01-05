<?php
    session_start();
    require_once "../controllers/nutrationController.php" ;



    if(!isset($_SESSION['admin'])){
        header("Location:./loginPage.php");
    }
    else {
        $cntrl = new NutrationController();
        $cntrl ->IngredientForm();
    
    }


?>