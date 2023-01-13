<?php 
require_once "../views/globaleView.php";
require_once "../views/recipeFormView.php";
require_once "../views/recipeView.php";
require_once "../views/recipeIdeaView.php";

require_once "../models/userModel.php" ;
require_once "../models/recipeModel.php" ;
require_once "../models/diapoModel.php" ;


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
  public function isPrefer($idRecipe , $idUser) {
    $model = new RecipeModel();
    return  $model->isPrefer($idRecipe , $idUser);

  }
  public function isNoted($idRecipe , $idUser) {
    $model = new RecipeModel();
    return  $model->isNoted($idRecipe , $idUser);

  }
  public function getDiapos() {
    $model = new DiapoModel();
    return  $model->getDiapos();

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

  public function noter($note,$idRecipe,$id) {
    $model = new RecipeModel();
    return  $model->noter($note,$idRecipe,$id);

  }
  public function prefer($idRecipe,$id) {
    $model = new RecipeModel();
    return  $model->prefer($idRecipe,$id);

  }
  public function  getIngredientList($id) {
    $model = new RecipeModel();
    return  $model-> getIngredientList($id);

  }
  public function  getstepsList($id) {
    $model = new RecipeModel();
    return  $model-> getstepsList($id);

  }
  public function  getcalories($id) {
    $model = new RecipeModel();
    return  $model-> getcalories($id);

  }
 

  public function recipe($name,$id){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new RecipeModel();
    $recipe = $model ->getRecipeByname($name); 

    $view->head();
    $viewGlob->header();
    $view->index($recipe ,$this->isPrefer( $recipe[0][0] ,$id ),$this->isNoted( $recipe[0][0] ,$id ));
    $viewGlob->footer();
  
  
  }
  public function categoriePage($name){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new RecipeModel();
    $recipes = $model ->getRecipesBycategorie($name); 
   // echo count($recipes);
    $view->head();
    $viewGlob->header();
    $view->categorie($recipes);
    $viewGlob->footer();
  
  
  }


  public function ideaGenerator($ingredList){
    $model = new NutrationModel();       
    return $model->ideaGenerator($ingredList);
    
  }
  public function filtrage($filter){

   $model = new RecipeModel();
    return $model ->filtrage($filter,"recipe"); 
  }

  
  public function filtrageIdea($filter ,$ingredList){
    $model1 = new NutrationModel();       
    $input = $model1->ideaSql($ingredList);
     $model = new RecipeModel();
      return $model ->filtrage($filter,"(".$input.")"); 
    }
  


 


}


