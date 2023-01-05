<?php
    session_start();
    require_once "../controllers/dashboardController.php" ;



    if(!isset($_SESSION['admin'])){
        header("Location:./loginPage.php");
    }
    else {
        $cntrl = new DashboardController();
        $cntrl ->users();
    
    }


?>