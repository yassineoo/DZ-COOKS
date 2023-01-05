
<?php 

require_once "../controllers/homeController.php" ;


session_start();

$cntrl = new HomeController();
if (isset($_GET['name'] )) 
 {

    $cntrl -> recipe($_GET['name']);

}
    

?>