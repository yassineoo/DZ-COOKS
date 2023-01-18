
<?php 

require_once "../controllers/homeController.php" ;


session_start();

$cntrl = new HomeController();
if(isset($_SESSION['username']) ){

  

    $cntrl -> saisonPage($_SESSION['username'],$_SESSION['id']);
   

 }
   
 elseif(isset($_SESSION['admin'])) {
    $cntrl -> saisonPage($_SESSION['admin'],$_SESSION['id']);

}
else {
  $cntrl -> saisonPage();
  
}


?>