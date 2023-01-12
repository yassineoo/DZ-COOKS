
<?php 

require_once "../controllers/homeController.php" ;


session_start();

$cntrl = new HomeController();
if (isset($_GET['categorie'] )) 
 {

    $cntrl -> categoriePage($_GET['categorie']);

}
    

?>