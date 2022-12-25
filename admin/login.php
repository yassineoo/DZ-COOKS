
<?php 

require_once "../controllers/userController.php" ;



$cntrl = new UserController();


$cntrl->run($_POST['email'] , $_POST['password'] , true );

?>