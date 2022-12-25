
<?php 

require_once "../controllers/userController.php" ;


$cntrl = new UserController();
if (isset($_GET['err'] )) 
 {
    $cntrl->index($_GET['err']);
}
else {  $cntrl->index();}

?>