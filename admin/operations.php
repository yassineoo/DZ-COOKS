<?php
    session_start();
    require_once "../controllers/dashboardController.php" ;



    $cntrl = new DashboardController();
    if(!isset($_SESSION['admin'])){
        header("Location:./loginPage.php");
    }
    
    $id=$_POST['id'];
    
    $cntrl->confirme($id);
    
  
    header('location: ./index.php')
?>