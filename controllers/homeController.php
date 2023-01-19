<?php 
require_once "../views/globaleView.php";
require_once "../views/recipeFormView.php";
require_once "../views/recipeView.php";
require_once "../views/recipeIdeaView.php";

require_once "../models/userModel.php" ;
require_once "../models/recipeModel.php" ;
require_once "../models/diapoModel.php" ;
require_once "../models/newsModel.php" ;


class HomeController {


    private $model;

    public function home($name=null , $id=null) {
        $view = new GlobaleView();
        $view->home($name,$id);
        
  }
  public function addRecipePage($name=null,$id=null, $error=null) {
    $view = new recipeFormView();
    
    $view->AddPage($name,$id);

    
}

public function  addRecipe($name,$description,$serves,$PrepTime,$CookTime, $RestTime,$optionCat,$optionParty,$Ingred,$steps ,$imagePath,$videoPath, $writer,$saison,$optiondiff){
  $model = new RecipeModel();
  $model -> addRecipe($name,$description,$serves,$PrepTime,$CookTime, $RestTime,$optionCat,$optionParty,$Ingred,$steps ,$imagePath,$videoPath, $writer,$saison,$optiondiff);
}

public function recipeIdea($name=null,$id=null) {
  $view = new RecipeIdeaView();
  $viewGlob = new GlobaleView();

  $view->head();
  $viewGlob->header($name,$id);
  
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
  public function getPrefer($idUser) {
    $model = new RecipeModel();
    return  $model->getPrefer($idUser);

  }
  public function getNoted($idUser) {
    $model = new RecipeModel();
  
   return  $model->getNoted($idUser);

  }
  public function getAjouter($idUser) {
    $model = new RecipeModel();
    return  $model->getAjouter($idUser);

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
  public function getRecipes($id=null,$all=null) {
    $model = new RecipeModel();
    return  $model->getRecipes($id,$all);

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
 

  public function news($name,$userName=null,$id=null){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new NewsModel();
    $new = $model ->getNewsByname($name); 

    $view->head();
    $viewGlob->header($userName,$id);
    $view -> news($new);

    $viewGlob->footer();
  
  }

  public function recipe($name,$userName=null,$id=null){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new RecipeModel();
    $recipe = $model ->getRecipeByname($name); 

    $view->head();
    $viewGlob->header($userName,$id);
    if (isset($id)) {
      $view->index($recipe ,$this->isPrefer( $recipe[0][0] ,$id ),$this->isNoted( $recipe[0][0] ,$id ));
    }
    else {
      $view->index($recipe);

    }

    $viewGlob->footer();
  
  
  }

  public function getRecipesBycategorie($name){
    $model = new RecipeModel();
   return $recipes = $model ->getRecipesBycategorie($name); 
  }
  public function categoriePage($name,$userName=null,$id=null){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $recipes = $this->getRecipesBycategorie($name);
   // echo count($recipes);
    $view->head();
    $viewGlob->header($userName,$id);
    $view->categoriePage($recipes);
    $viewGlob->footer();
  }
  public function saisonPage($name=null,$id=null){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new RecipeModel();
    $recipes = $model ->getRecipes(); 
   // echo count($recipes);
    $view->head();
    $viewGlob->header($name,$id);
    $view->SaisonPage($recipes);
    $viewGlob->footer();
  
  }
  public function newsPage($name=null,$id=null){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new newsModel();
    $news = $model ->getNews(); 
    $view->head();
    $viewGlob->header($name,$id);
    $view->newsPage($news);
    $viewGlob->footer();
  
  }
  public function partyPage($name=null,$id=null){
    $view = new RecipeView();
    $viewGlob = new GlobaleView();
    $model = new RecipeModel();
    $recipes = $model ->getRecipes(); 
   // echo count($recipes);
    $view->head();
    $viewGlob->header($name,$id);
    $view->partyPage($recipes);
    $viewGlob->footer();
  
  }
  public function saisonFilter($saison){
    $model = new RecipeModel();
    if( $saison =="tous les  saisons") {
      return $model ->getRecipes();
    }
    return $recipes = $model ->saisonFilter($saison); 
  }
  public function partyFilter($saison){
    $model = new RecipeModel();
    if( $saison =="generale") {
      return $model ->getRecipes();
    }
    return $recipes = $model ->partyFilter($saison); 
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


