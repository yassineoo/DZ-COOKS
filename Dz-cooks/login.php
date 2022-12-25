
<?php 

require_once "../controllers/userController.php" ;



$cntrl = new UserController();

if(isset($_POST['signIn'])){

$cntrl->run($_POST['email'] , $_POST['password'] );
}
if(isset($_POST['signUp'])){

    $cntrl->SignUp($_POST['fname'] ,$_POST['lname'] ,$_POST['email'] ,$_POST['password'] , $_POST['birth'] , $_POST['sexe'] );
    }

?>