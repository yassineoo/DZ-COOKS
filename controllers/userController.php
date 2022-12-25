<?php 
require_once "../views/globaleView.php";
require_once "../models/userModel.php" ;


class UserController {


    private $model;

    public function index($error=null) {
        $view = new GlobaleView();
        $view->userLoginSign();
        
  }
     public function indexAdmin($error=null) {
    $view = new GlobaleView();
    $view->AdminLogin();
    
}



  public function run($email ,$password,$admin=false)
  {

      session_start(); 
      if (isset($email) && isset($password)) {

         
      
          $email = $this->validate($email);
      
          $pass = $this->validate($password);
      
         
          if (empty($email)) {
      

              header("Location: ./loginPage?err=email is required");
             // header("location: ./loginPage.php")
              //$this->index("UserName Name is required");
              
           exit();
      
       }else if(empty($pass)){
          header("Location: ./loginPage?err=Pass  is required");


      
        
           exit();
      
       }else{
          $model = new UserModel();
          $res =   $model->login($email,$pass,$admin);
          if ($res == 1){
             
             
              if ($admin) {
                $_SESSION["admin"] = $email;  
            }
            else {
                $_SESSION["username"] = $email;  
               
            }
            header("location:./index.php");  
             
          
           //   $view->login_form("password Name is required");
          }
          else {
             header("Location: ./loginPage?err=email or Password are wrong");


  
          }
          


      
     }
      
          
      }            
      
  }

     public function SignUp($fName ,$lName,$Email ,$password,$birthDate,$sexT) {
  
    session_start();
    if (isset($fName) && isset($lName) && isset($Email) && isset($password)&& isset($birthDate) && isset($sexT) ) {

      
    
        $email = $this->validate($Email);
    
        $pass = $this->validate($password);
        
        $fname = $this->validate($fName);
        $lname = $this->validate($lName);
        $sex = $this->validate($sexT);
        $birth = $this->validate($birthDate);
        
     
        $model = new UserModel();
        $res =   $model->SignUp($fname ,$lname,$email ,$pass,$birth,$sex);
        if ($res == 2){

            $_SESSION["username"] = $email;  
            header("location:./index.php");  
        
         //   $view->login_form("password Name is required");


        }
        else {
           header("Location: ./loginPage?err=User Name or Password is wrong");



        }
        


    
   
    
        
    } 
 


}
  
  
  /* logging out the user */
  public function logout()
  {
      Session::destroy();
      header('location: ./login.php');
      exit;
  }


  function validate($data){
    
    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

 }



}