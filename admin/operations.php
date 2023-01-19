<?php
    session_start();
    require_once "../controllers/dashboardController.php" ;
    require_once "../controllers/nutrationController.php" ;



    $cntrl = new DashboardController();
    if(!isset($_SESSION['admin'])){
        header("Location:./loginPage.php");
        exit();

    }
    
    if(isset($_POST["setPercentage"])){
        $cntrl = new NutrationController();
    
        $cntrl->setPercentage($_POST["setPercentage"]);
        header('location: ./nutrationPage.php');
        exit();
        }
    elseif(isset($_POST['imageName'])){
        $cntrl->deleteDiapo($_POST['imageName']);
        header('location: ./theme.php');
        exit();
    }

    $id=$_POST['id'];
    if (isset($_POST['confirmeUser'])) {
        
        $cntrl->confirmeUser($id);
        header('location: ./users.php');
    }  
    elseif(isset($_POST["confirmeRecipe"])) {
      
        $cntrl->confirmeRecipe($id);
        header('location: ./recipes.php');

    }elseif (isset($_POST["deleteRecipe"])) {
        $cntrl->deleteRecipe($id);
        header('location: ./recipes.php');
    }
    elseif (isset($_POST['deleteUser'])) {
        
        $cntrl->deleteUser($id);
        header('location: ./users.php');
    }  
    elseif (isset($_POST['deleteIngredient'])) {
        $cntrl = new NutrationController();

        $cntrl->deleteIngredient($id);
        header('location: ./nutrationPage.php');

    } 
    
  
    
?>