
<?php 

require_once "../controllers/homeController.php" ;


session_start();

$cntrl = new HomeController();





if (isset($_GET['name'] )) 
 {
    
if(isset($_SESSION['username']) ){

  

    $cntrl -> recipe($_GET['name'],$_SESSION['username'],$_SESSION['id']);
   

 }
   
 elseif(isset($_SESSION['admin'])) {
    $cntrl -> recipe($_GET['name'],$_SESSION['admin'],$_SESSION['id']);

}
else {
  $cntrl -> recipe($_GET['name']);
  
}


}
    

?>