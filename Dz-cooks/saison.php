
<?php 

require_once "../controllers/homeController.php" ;


session_start();

$cntrl = new HomeController();

$cntrl -> saisonPage();


?>