<?php

class TDW_Model {

    private $servername = "localhost:3306";
    private $dbname = "php";
    private $username = "root";
    private $password = "";
    
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

        private function deconnexion(&$conn) {
            $conn=null;
        }
        private function request($c,$sql,$args=[]) {
   
             $query=$c->prepare($sql);
             
             $query->execute($args);
             return $query;
            
        }
        public function getCulture($id=null){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            if (isset($id)) {
                $sql= "SELECT * FROM culture where Id_culture=?;";
                $args=[$id];
            }
            else {
                $sql="SELECT * FROM culture";
                $args=[];
            }
            $culture = $this->request($conn,$sql,$args);
            $this->deconnexion($conn);
            return $culture->fetchAll();
        }
        public function getElevage($id=null){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
           
            if (isset($id)) {
                $sql= "SELECT * FROM elevage where Id_elevage=?;";
                $args=[$id];

            }
            else {
                $sql="SELECT * FROM elevage";
                $args=[];

            }

            $elevage = $this->request($conn,$sql,$args);
            $this->deconnexion($conn);
            return $elevage->fetchAll();
        }


        public function updateCulture($id ,$Culture,$Superficie,$Production){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            if (isset($id)) {
                $sql='UPDATE culture SET Nom_culture=?, Superficie=?, Production=? WHERE Id_culture=?';
                $args=array($Culture,$Superficie,$Production,$id);

               $this->request($conn,$sql,$args);
               
             
    
            }
            $this->deconnexion($conn);
            
        }


        public function updateElevage($id ,$Espece,$Nombre){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            if (isset($id)) {
                $sql='UPDATE elevage SET Nom_animal=?,Nombre_tete=? WHERE Id_elevage=?';
                $args=array($Espece,$Nombre,$id);

               $this->request($conn,$sql,$args);
               
             
    
            }
            $this->deconnexion($conn);
            
        }

        public function addCulture($Culture,$Superficie,$Production){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            
                $sql='INSERT INTO culture (Nom_culture,Superficie,Production) VALUES(?,?,?)';
                $args=array($Culture,$Superficie,$Production);

               $this->request($conn,$sql,$args);
               
             
    
            
            $this->deconnexion($conn);
            
        }

        public function addElevage($Espece,$Nombre){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
           
                $sql='INSERT INTO elevage (Nom_animal,Nombre_tete) VALUES(?,?)';
                $args=array($Espece,$Nombre);

               $this->request($conn,$sql,$args);
               
             
    
            
            $this->deconnexion($conn);
            
        }




        function deleteCulture($id){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            if (isset($id)) {
                $sql='DELETE FROM culture WHERE Id_culture=?';
                $args=array($id);

               $this->request($conn,$sql,$args);  
    
            }
            $this->deconnexion($conn);

        }
        function deleteElevage($id){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            if (isset($id)) {
                $sql='DELETE FROM elevage WHERE Id_elevage=?';
                $args=array($id);

               $this->request($conn,$sql,$args);  
    
            }
            $this->deconnexion($conn);

        }


        function login($uname ,$pass) {
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            
            $sql= "SELECT * FROM utilisateur WHERE name_user='$uname' AND hash_pwd='$pass'";
            
            $statement = $conn->prepare($sql);  
               $statement->execute(  
                    array(  
                         'username'     =>     $uname,  
                         'password'     =>     $pass  
                    )  
               );  
               $count = $statement->rowCount();  
               if($count > 0)  
               {  
                    return 1; 
                 //   header("location:admin.php");  
                    
                                 
               }  
               else  
               {  
                return 2;
               }  
               return 2;
          


        }

        public function sum(){
            $conn = $this->connexion($this->servername,$this->dbname,$this->username,$this->password);
            
            $sql1= "SELECT sum(Superficie) FROM culture";
            $sql2= "SELECT sum(Production) FROM culture";
            $sql3= "SELECT sum(Nombre_tete) FROM elevage";
            

            $Superficie =  $this->request($conn,$sql1)->fetchAll();
            $Production =  $this->request($conn,$sql2)->fetchAll();
            $Nombre_tete =  $this->request($conn,$sql3)->fetchAll();

            $res=array();
            array_push($res,$Superficie[0]);
            array_push($res,$Production[0]);
            array_push($res,$Nombre_tete[0] );

            return $res;
        }
        

}











  
?>