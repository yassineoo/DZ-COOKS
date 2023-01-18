
<?php 

require_once "../controllers/homeController.php" ;


session_start();

$cntrl = new HomeController();




    
if(isset($_SESSION['username']) ){
    if (isset($_GET['name'] )) 
    {
  
    $cntrl -> news($_GET['name'],$_SESSION['username'],$_SESSION['id']);
        }
        else  $cntrl ->newsPage($_SESSION['username'],$_SESSION['id']);
    

 }
   
 elseif(isset($_SESSION['admin'])) {
    if (isset($_GET['name'] )) 
    {

    $cntrl -> news($_GET['name'],$_SESSION['admin'],$_SESSION['id']);
}
else  $cntrl ->newsPage($_SESSION['admin'],$_SESSION['id']);

}
else {
    if (isset($_GET['name'] )) 
    {
  $cntrl -> news($_GET['name']);
    }else  $cntrl ->newsPage();


}
   

?>