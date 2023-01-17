<?php 
require_once "../views/adminView.php";
require_once "../models/userModel.php" ;


class DashboardController {


    private $model;

    public function index($error=null) {
        $view = new adminView();
        $view->head();
        $view->navbar();
        $view->main(1);
    
        
  }

  public function users($error=null) {
    $view = new adminView();
    $view->head();
    $view->navbar();
    $view->main(3);

    
}
public function recipes($error=null) {
  $view = new adminView();
  $view->head();
  $view->navbar();
  $view->main(2);

  
}
public function diapos($error=null) {
  $view = new adminView();
  $view->head();
  $view->navbar();
  $view->main(5);

  
}

public function nutration($error=null) {
  $view = new adminView();
  $view->head();
  $view->navbar();
  $view->main(4);

  
}
public function getDiapos() {
  $model = new DiapoModel();
  return $model->getDiapos();
  }
  public function  addDiapos($imageName,$title,$path,$type) {
    $model = new DiapoModel();
    return $model-> addDiapos($imageName,$title,$path,$type);
    }
 

  public function getUsers($id=null) {
    $model = new userModel();
    return $model->getUsers($id);
    }
  public function confirmeUser($id){
    $model = new userModel();
    return $model->confirme($id);
  }
  public function confirmeRecipe($id){
    $model = new RecipeModel();
    return $model->aprroved($id);
  }
  public function deleteUser($id){
    $model = new userModel();
    return $model->delete($id);
  }
  public function deleteRecipe($id){
    $model = new RecipeModel();
    return $model->delete($id);
  }
  public function deleteDiapo($imageName){
    $model = new DiapoModel();
    return $model->deleteDiapo($imageName);
  }





  
  
  


}