<?php
 
 require_once "../controllers/nutrationController.php" ;
 require_once "../controllers/homeController.php" ;



/*
* Write your logic to manage the data
* like storing data in database
*/
 
// POST Data
$cntrl = new NutrationController();
$ideas = $cntrl -> ideaGenerator($_POST['ingredientList']);

$p=  $cntrl-> getPercentage(); 

$res = array();
foreach ($ideas as $recipe) {
    $cntrlh = new HomeController();
    if(intval($recipe['num'])/count($_POST['ingredientList'])   > $p/100) {
        $variable = $cntrlh->getRecipes($recipe['idRecipe']);
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