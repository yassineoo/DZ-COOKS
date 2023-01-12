<?php

include_once "dbConnection.php";

class UserModel{

    public function login($email ,$pass,$admin) {
        $dbConn = new Dbconnection();
        $conn = $dbConn ->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
        if ($admin) {
        $sql= "SELECT * FROM admin WHERE email=? AND  password =?; ";
          
        }
        else {
         $sql= "SELECT * FROM user WHERE email=? AND  password =?; ";
        }
        $statement = $dbConn ->request($conn,$sql,
                array(  
                         $email,  
                       $pass  
                ));
           $count = $statement->rowCount(); 
           echo $count ; 
           if($count > 0)  
           {  
               $dbConn ->deconnexion($conn);
                return $statement->fetchAll(); 
                
                             
           }  
           else  
           {  
            $dbConn ->deconnexion($conn);
            return NULL;
           }  
           return NULL;
      


    }


    public function SignUp($fName ,$lName,$email ,$pass,$birth,$sex) {
        $dbConn = new Dbconnection();
        $conn = $dbConn ->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
        
        $sql= "SELECT * FROM user WHERE email=? ";
        
        $statement = $dbConn ->request($conn,$sql,
                array(  
                         $email
                ));
           $count = $statement->rowCount(); 
            
           if($count > 0)  
           {  

               $dbConn ->deconnexion($conn);
                return 1; 
             //   header("location:admin.php");  
                
                             
           }  
           else  
           {  

            $sql= "INSERT INTO `user` (`id`, `FirstName`, `lastName`, `email`, `password`, `sex`, `birth`) VALUES (NULL, ?,?,?,?,?,?)";
            $dbConn ->request($conn,$sql,
            array(  
                $fName ,$lName,$email ,$pass,$sex,$birth
            ));
            $dbConn ->deconnexion($conn);
            return 2;
           }  
           return 2;
      


    } 
    public function getUsers($id=null){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($id)) {
            $sql= "SELECT * FROM user where id=?;";
            $args=[$id];
        }
        else {
            $sql="SELECT * FROM user";
            $args=[];
        }
        $user = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $user->fetchAll();
    }
    public function confirme($id){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql='UPDATE user SET confirmed=1 WHERE id=?;';

            $args=[$id];
       
            
        
        $user = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;
    }




}



?>