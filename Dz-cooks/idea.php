<?php
 
 require_once "../controllers/nutrationController.php" ;
 require_once "../controllers/homeController.php" ;



/*
* Write your logic to manage the data
* like storing data in database
*/
 
// POST Data

$cntrl = new HomeController();
if(isset ($_POST["filter"])) {
$ideas = $cntrl -> filtrageIdea($_POST["filter"], $_POST['ingredientList']);
//echo $ideas;
//echo json_encode($ideas);

}
else  $ideas = $cntrl -> ideaGenerator($_POST['ingredientList']);
$cntrlN = new NutrationController();

$p=  $cntrlN-> getPercentage(); 

$res = array();
foreach ($ideas as $recipe) {
    $cntrlh = new HomeController();
    if(intval($recipe['num'])/count($_POST['ingredientList'])   >= $p/100) {
        $variable = $cntrlh->getRecipes($recipe['id']);
        $ingredList = array();
        foreach ($variable as  $value) {
        array_push($ingredList, $value['ingredName']);
            
        }
        array_push($variable,$ingredList);
        array_push($res,$variable);
                   
    }
}
echo json_encode($res);
exit;
 
?>