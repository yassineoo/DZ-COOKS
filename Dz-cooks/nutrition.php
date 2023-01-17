
<?php 

require_once "../controllers/nutrationController.php" ;


session_start();

$cntrl = new NutrationController();



   

    if(isset($_SESSION['username']) ){

  

    $cntrl -> nutration($_SESSION['username'],$_SESSION['id']);
   

 }
   
 elseif(isset($_SESSION['admin'])) {
    $cntrl -> nutration($_SESSION['admin'],$_SESSION['id']);

}
else {
  $cntrl -> nutration();
  
}




    

?>