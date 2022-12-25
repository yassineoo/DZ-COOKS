<?php

class DbConnection{


    

    public $servername = "localhost:3306";
    public $dbname = "food";
    public $username = "root";
    public $password = "";
    
        public function connexion($servername,$dbname,$username,$password ){
        
        
        $conn ;
        
        try {
            $conn = new PDO(
           "mysql:host=$servername; dbname=$dbname",
           $username, $password
            );
       
           $conn->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);
                           
           }
            catch(PDOException $e) {
               echo "Connection failed: "
               . $e->getMessage();
               exit();
           }
 
        return $conn;
        }

        public function deconnexion(&$conn) {
            $conn=null;
        }
        public function request($c,$sql,$args=[]) {
   
             $query=$c->prepare($sql);
             
             $query->execute($args);
             return $query;
            
        }

}





    ?>