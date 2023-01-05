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

  public function getUsers($id=null) {
    $model = new userModel();
    return $model->getUsers($id);
    }
  public function confirme($id){
    $model = new userModel();
    return $model->confirme($id);
  }




  
  
  


}