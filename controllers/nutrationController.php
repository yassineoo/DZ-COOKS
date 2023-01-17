<?php 
require_once "../views/adminView.php";
require_once "../views/globaleView.php";
require_once "../views/nutrationView.php";
//require_once "../views/recipeFormView.php";

//require_once "../models/userModel.php" ;
require_once "../models/nutrationModel.php" ;

class NutrationController {

    public function IngredientForm(){

        $view = new NutrationView();
        $viewGlob = new AdminView();
       // $viewGlob-> head();
      //  $viewGlob-> navbar();

         
        $view->main();

    }

    public function nutration($name=null,$id=null){

      $view = new NutrationView();
      $viewGlob = new GlobaleView();
      //$viewGlob-> head();
      

      $view->head();
      $viewGlob-> header($name,$id);
      $view->IngredientsList();

  }
    public function getCategories() {
        $model = new NutrationModel();
        return  $model->getCategories();
    
      }
    public function getPercentage(){
        $model = new NutrationModel();
        return  $model->getPercentage()[0][0];

    }

      public function getSeasons() {
        $model = new NutrationModel();
        return  $model->getSeasons();
    
      }
      public function getmineraux() {
        $model = new NutrationModel();
        return  $model->getmineraux();
    
      }
      public function getVitamines() {
        $model = new NutrationModel();
        return  $model->getVitamines();
    
      }
      public function getInfo() {
        $model = new NutrationModel();
        return  $model->getInfo();
    
      }
      public function getIngredient() {
        $model = new NutrationModel();
        return  $model->getIngredient();
    
      }

      public function GetIngredientList() {
        $model = new NutrationModel();
        return  $model->IngredientList();
    
      }
      public function addIngredeient($name ,$calories ,$season ,$categorie , $vitamines,$mineraux,$information) {

        $model = new NutrationModel();
        $model ->addIngredient($name ,$calories ,$season ,$categorie,$vitamines,$mineraux , $information);

      }
      public function mostPobular(){
        $model = new NutrationModel();       
        return  $model->mostPobular();
        
      }
      public function ideaGenerator($ingredList){
        $model = new NutrationModel();       
        return $model->ideaGenerator($ingredList);
        
      }
     public function getAllInfo($id )
      {
        $model = new NutrationModel();       
        return $model->getAllInfo($id);
      }
      public function setPercentage($value){
        $model = new NutrationModel();       
        return $model->setPercentage($value);
      }

}

?>