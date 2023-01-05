<?php

include_once "dbConnection.php";

class RecipeModel{

  
    public function getRecipes($id=null){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($id)) {
            $sql= "SELECT recipe.id,imgPath,cookingTime,restTime,preparationTime,recipe.name , ingredient.name as ingredName ,idingred FROM `recipe` INNER JOIN `makein`   as res1  on recipe.id =res1.idRecipe  INNER JOIN ingredient ON res1.idingred = ingredient.id where recipe.id=? ;";
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

    public function getRecipeByname($name){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($name)) {
            $sql= "SELECT recipe.id,imgPath,serves,cookingTime,restTime,preparationTime,recipe.name , ingredient.name as ingredName ,idingred FROM `recipe` INNER JOIN `makein`   as res1  on recipe.id =res1.idRecipe  INNER JOIN ingredient ON res1.idingred = ingredient.id where recipe.name=? ;";
            $args=[$name];
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


    public function getIngredientList($id){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM `makein` INNER JOIN `ingredient` ON makein.idingred = ingredient.id  WHERE idRecipe=?;";
            $args=[$id];
      
        $list = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $list->fetchAll();
    }

    public function getMesures(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM `mesure` ";
            $args=[];
      
        $mesures = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $mesures->fetchAll();
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
        FROM noter
        WHERE idRecipe=?";
            $args=[$idRecipe];
       
            
        
        $note = $dbConn->request($conn,$sql,$args);
        $sql= " SELECT *
        FROM noter
        WHERE idRecipe=?";
        $args=[$idRecipe];
        $number = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return  [intVal($note->fetchAll()[0][0]) , count($number->fetchAll())] ;


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



    public function addRecipe($name,$description,$serves,$PrepTime,$CookTime, $RestTime,$optionCat,$optionParty,$Ingreds,$steps ,$imagePath,$videoPath, $writer){


        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
        $sql = "INSERT INTO `recipe` (`id`, `name`, `description`, `serves`, `preparationTime`, `restTime`, `categorie`, `cookingTime`, `imgPath`, `videoPath`, `party`, `writer`) VALUES (NULL, ?, ?,?,?, ?,?,? ,?,?,?,?);";
        $args=[$name,$description,$serves,$PrepTime,$RestTime,$optionCat,$CookTime,$imagePath,$videoPath, $optionParty , $writer];
        $dbConn->request($conn,$sql,$args);
        
        
        $sql= " SELECT id FROM `recipe`  WHERE `name` = ? ";
        $args=[$name ];
        $idR  = $dbConn->request($conn,$sql,$args)->fetchAll()[0][0];
        
        $sqlG= "INSERT INTO `makein` (`idingred`, `idRecipe`, `quentity`, `mesure`)  VALUES (?, ?, ?,?);";
      
         
        foreach ($Ingreds as  $ingred) {

            $sql= " SELECT id FROM `ingredient`  WHERE `name` = ? ";
            $args=[$ingred[0]];
            $idI  = $dbConn->request($conn,$sql,$args)->fetchAll()[0][0];
    
            $args=[$idI,$idR , $ingred[2] , $ingred[1]];
            $dbConn->request($conn,$sqlG,$args);
                
            }
        

        $sql ="INSERT INTO `step` (`id`, `idRecipe`, `order`, `description`) VALUES (NULL, ?,?,?);";
        foreach ($steps as  $step) {

            $args=[$idR , $step[1] , $step[0]];
            $dbConn->request($conn,$sql,$args);
                
            }
        
        $dbConn ->deconnexion($conn);

    }




}




?>