<?php
 
 require_once "../controllers/nutrationController.php" ;
 require_once "../controllers/homeController.php" ;



/*
* Write your logic to manage the data
* like storing data in database
*/
 
// POST Data
$cntrl = new homeController();
if (isset($_POST['filter'])) {
    # code...
    $res = $cntrl -> filtrage($_POST['filter'],$_POST['name']);
}
elseif (isset($_POST['saison'])){
    $res = $cntrl -> saisonFilter($_POST['saison']);

}
elseif (isset($_POST['party'])){
    $res = $cntrl -> partyFilter($_POST['party']);

}


echo json_encode($res);
exit;
 
?>