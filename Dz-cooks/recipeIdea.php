
<?php 

require_once "../controllers/homeController.php" ;


session_start();


if(isset($_SESSION['username']) ){

  

    $cntrl -> recipeIdea($_SESSION['username'],$_SESSION['id']);
   

 }
   
 elseif(isset($_SESSION['admin'])) {
    $cntrl -> recipeIdea($_SESSION['admin'],$_SESSION['id']);

}
else {
  $cntrl -> recipeIdea();
  
}



?>