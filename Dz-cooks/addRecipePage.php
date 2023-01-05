
<?php 

require_once "../controllers/homeController.php" ;


session_start();

if(!isset($_SESSION['username'])){
    header("Location:./loginPage.php");
}
else {
    $cntrl = new HomeController();
    $cntrl -> addRecipePage();

}


?>