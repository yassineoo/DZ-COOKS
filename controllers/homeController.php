<?php 
require_once "../views/globaleView.php";
require_once "../views/recipeFormView.php";
require_once "../views/recipeView.php";

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
  public function getRecipes($id=null) {
    $model = new RecipeModel();
    return  $model->getRecipes($id);

  }


  
  public function getMesures() {
    $model = new RecipeModel();
    return  $model->getMesures();


  }

  public function getNote($id) {
    $model = new RecipeModel();
    return  $model->getNote($id);

  }
  public function  getIngredientList($id) {
    $model = new RecipeModel();
    return  $model-> getIngredientList($id);

  }
 

  public function recipe($name){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new RecipeModel();
    $recipe = $model ->getRecipeByname($name); 
    $view->head();
    $viewGlob->header();
    $view->index($recipe);
    $viewGlob->footer();
  
  
  }



 


}


