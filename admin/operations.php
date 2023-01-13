<?php
    session_start();
    require_once "../controllers/dashboardController.php" ;



    $cntrl = new DashboardController();
    if(!isset($_SESSION['admin'])){
        header("Location:./loginPage.php");
    }
    
    $id=$_POST['id'];
    if (isset($_POST['confirme'])) {
        $cntrl->confirme($id);
        header('location: ./users.php');
    }  
    elseif(isset($_POST["confirmeRecipe"])) {
        $cntrl->confirmeRecipe($id);
        header('location: ./recipes.php');

    }
    
    
  
    
?>