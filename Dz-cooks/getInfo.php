<?php
 
 require_once "../controllers/nutrationController.php" ;
 require_once "../controllers/homeController.php" ;



/*
* Write your logic to manage the data
* like storing data in database
*/
 
// POST Data
$cntrl = new NutrationController();
$infos = $cntrl -> getAllInfo($_POST['ingredientId']);

echo json_encode($infos);


?>