
<?php 

require_once "../controllers/dashboardController.php" ;


session_start();

if(!isset($_SESSION['admin'])){
    header("Location:./loginPage.php");
}
else {
    $cntrl = new DashboardController();
    $cntrl -> index();

}


?>