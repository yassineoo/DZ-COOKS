
<?php 

require_once "../controllers/nutrationController.php" ;


session_start();

$cntrl = new NutrationController();
if (isset($_GET['name'] )) 
 {

    $cntrl -> recipe($_GET['name']);

}
else  $cntrl ->IngredientList();

    

?>