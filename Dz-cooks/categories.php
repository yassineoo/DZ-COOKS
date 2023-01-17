
<?php 

require_once "../controllers/homeController.php" ;


session_start();

$cntrl = new HomeController();


if (isset($_GET['categorie'] )) {   

    if(isset($_SESSION['username']) ){

  

    $cntrl -> categoriePage($_GET['categorie'],$_SESSION['username'],$_SESSION['id']);
    echo 'Nsso';

 }
   
 elseif(isset($_SESSION['admin'])) {
    $cntrl -> categoriePage($_GET['categorie'],$_SESSION['admin'],$_SESSION['id']);

}
else {
  $cntrl -> categoriePage($_GET['categorie']);
  


}
}

?>