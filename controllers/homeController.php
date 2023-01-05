<?php 
require_once "../views/globaleView.php";
require_once "../views/recipeFormView.php";
require_once "../views/recipeIdeaView.php";

require_once "../models/userModel.php" ;
require_once "../models/recipeModel.php" ;


class HomeController {


    private $model;

    public function home($error=null) {
        $view = new GlobaleView();
        $view->home();
        
  }
  public function addRecipePage($error=null) {
    $view = new recipeFormView();
    
    $view->AddPage();

    
}

public function  addRecipe($name,$description,$serves,$PrepTime,$CookTime, $RestTime,$optionCat,$optionParty,$Ingred,$steps ,$imagePath,$videoPath, $writer){
  $model = new RecipeModel();
  $model -> addRecipe($name,$description,$serves,$PrepTime,$CookTime, $RestTime,$optionCat,$optionParty,$Ingred,$steps ,$imagePath,$videoPath, $writer);
}

public function recipeIdea() {
  $view = new RecipeIdeaView();
  $viewGlob = new GlobaleView();

  $view->head();
  $viewGlob->header();
  $view->index();
  $viewGlob->footer();


  
}


  public function getCategories() {
    $model = new RecipeModel();
    return  $model->getCategories();

  }
  public function getParty() {
    $model = new RecipeModel();
    return  $model->getParty();

  }
  public function getRecipes($id) {
    $model = new RecipeModel();
    return  $model->getRecipes($id);

  }


  
  public function getMesures() {
    $model = new RecipeModel();
    return  $model->getMesures();

  }





 


}


