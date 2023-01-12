<?php
 
 require_once "../controllers/nutrationController.php" ;
 require_once "../controllers/homeController.php" ;



/*
* Write your logic to manage the data
* like storing data in database
*/
 
// POST Data
$cntrl = new homeController();
$res = $cntrl -> filtrage($_POST['filter']);


echo json_encode($res);
exit;
 
?>