
<?php 

require_once "../controllers/userController.php" ;


session_start();

$cntrl = new UserController();
if (isset($_GET['id'] ) && isset($_SESSION['id'])){
    if ($_SESSION['id'] == $_GET['id'])
     $cntrl -> profile($_SESSION['id'],$_SESSION['username']);
     exit();
}
    
 header("Location:./index.php");
?>