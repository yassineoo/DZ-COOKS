
<?php 

require_once "../controllers/homeController.php" ;


session_start();
$cntrl = new HomeController();
if(isset($_SESSION['username']) ){

    $cntrl -> home($_SESSION['username'],$_SESSION['id']);
   
} elseif(isset($_SESSION['admin'])) {
    $cntrl -> home($_SESSION['admin'],$_SESSION['id']);

}
else {
  //  echo "koko";
    $cntrl -> home();

}


?>