<?php

include_once "dbConnection.php";

class RecipeModel{

  
    public function getRecipes($id=null){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($id)) {
            $sql= "SELECT * FROM recipe where id=?;";
            $args=[$id];
        }
        else {
            $sql="SELECT * FROM recipe";
            $args=[];
        }
        $recipies = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $recipies->fetchAll();
    }


    public function getCategories(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM categorie ";
            $args=[];
      
        $categories = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $categories->fetchAll();
    }

    public function getParty(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM party ";
            $args=[];
      
        $party = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $party->fetchAll();
    }


    public function aprroved($id){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql='UPDATE user SET aprroved=1 WHERE id=?;';

            $args=[$id];
       
            
        
        $user = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;
    }
    public function noter($idUser,$idRecipe,$note){

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);


        $sql="SELECT * FROM `noter` where  idUser =?, idRecipe =?";
        $args=[$idUser,$idRecipe] ;
        $noted = $dbConn->request($conn,$sql,$args);
        $count = $statement->rowCount(); 
            
        if($count > 0) {
            $sql="UPDATE noter SET  note = ? where idUser =?, idRecipe =? ";
            $args=[$note,$idUser,$idRecipe];
            
        }
        else {
            $sql="INSERT INTO `noter` (`idUser`, `idRecipe`, `note`) VALUES (?,?,?)";
            $args=[$idUser,$idRecipe,$note];

        }
        
        $note = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;

    }


    public function getNote($idRecipe) {

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql= " SELECT AVG(note)
        FROM note
        WHERE idRecipe=?";
            $args=[$idRecipe];
       
            
        
        $user = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;


    }









    public function getprefer($idUser) {

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql= " SELECT *
        FROM  recipe join prefer ON recipe.id =prefer.idRecipe
        WHERE idUser=?";
            $args=[$idRecipe];
       
            
        
        $user = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;


    }

    public function prefer($idUser,$idRecipe){

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);


        $sql="SELECT * FROM `prefer` where  idUser =?, idRecipe =?;";
        $args=[$idUser,$idRecipe] ;
        $noted = $dbConn->request($conn,$sql,$args);
        $count = $statement->rowCount(); 
            
        if($count > 0) {
            $sql = "DELETE FROM prefer WHERE idUser =?, idRecipe =?;";
          //  $sql="Delete noter SET  note = ? where idUser =?, idRecipe =?;";
            
        }
        else {
            $sql="INSERT INTO `prefer` (`idUser`, `idRecipe`) VALUES (?,?)";
            
        }
        $args=[$idUser,$idRecipe];
        
        $prefer = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;

    }





}




?>