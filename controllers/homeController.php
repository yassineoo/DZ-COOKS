<?php 
require_once "../views/globaleView.php";
require_once "../views/recipeFormView.php";

require_once "../models/userModel.php" ;
require_once "../models/recipeModel.php" ;


class HomeController {


    private $model;

    public function home($error=null) {
        $view = new GlobaleView();
        $view->home();
        
  }
  public function addRecipe($error=null) {
    $view = new recipeFormView();
    $view->head();
    $view->form();

    
}


  public function getCategories() {
    $model = new RecipeModel();
    return  $model->getCategories();

  }
  public function getParty() {
    $model = new RecipeModel();
    return  $model->getParty();

  }
  public function getRecipes() {
    $model = new RecipeModel();
    return  $model->getRecipes();

  }






 


}


