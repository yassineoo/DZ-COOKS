<?php
 require_once "../controllers/homeController.php" ;
 session_start();

 $cntrl = new HomeController();
 $ideas = $cntrl -> noter(intval($_POST['note']) ,intval($_POST['idRecipe'])  ,intval( $_SESSION['id']));
 echo json_encode( [$_POST['note'] , intval($_POST['idRecipe']) , intval( $_SESSION['id']) ]) ;
 exit(); 

?>
