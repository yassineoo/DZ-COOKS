
<?php 

require_once "../controllers/userController.php" ;


session_start();

$cntrl = new UserController();
if (isset($_GET['id'] ) && isset($_SESSION['id'])){
    if (($_SESSION['id'] == $_GET['id']) && isset($_SESSION['admin']))
     $cntrl -> profile($_GET['id'],$_SESSION['username']);
     $cntrl -> profile($_GET['id'],$_SESSION['admin']);
     
     exit();
}
    
 header("Location:./index.php");
?>