<?php
 require_once "../controllers/homeController.php" ;
 session_start();

 $cntrl = new HomeController();
 $ideas = $cntrl -> prefer( intval($_POST['idRecipe'])  ,intval( $_SESSION['id']));
 echo json_encode("votre review a ete enregstre") ;
 exit(); 

?>
