<?php

include_once "dbConnection.php";

class RecipeModel{

  
    public function getRecipes($id=null,$all=null){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($id)) {
            $sql= "SELECT recipe.id,imgPath,cookingTime,saison,difficulty,restTime,preparationTime,recipe.name , ingredient.name as ingredName ,idingred FROM `recipe` INNER JOIN `makein`   as res1  on recipe.id =res1.idRecipe  INNER JOIN ingredient ON res1.idingred = ingredient.id where recipe.id=? ;";
            $args=[$id];
        }
        elseif(isset($all)) {
            $sql="SELECT * FROM recipe";
            $args=[];
        }
        else {
            $sql="SELECT * FROM recipe where approved=1";
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
            $sql= "SELECT recipe.id,imgPath,serves,recipe.saison,difficulty,videoPath,cookingTime,restTime,preparationTime,description,recipe.name , ingredient.name as ingredName ,idingred FROM `recipe` INNER JOIN `makein`   as res1  on recipe.id =res1.idRecipe  INNER JOIN ingredient ON res1.idingred = ingredient.id where recipe.name=? ;";
            $args=[$name];
        }
        $recipies = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $recipies->fetchAll();
    }

    public function getRecipesBycategorie($name){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($name)) {
            $sql= "SELECT * FROM `recipe` where categorie=?  AND approved=1 ;";
            $args=[$name];
        }
        $recipies = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $recipies->fetchAll();
    }
    public function saisonFilter($name){
      //  $name=str_replace("'","\\'",$name);
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($name)) {
            $sql= 'SELECT * FROM `recipe` where saison="'.$name.'" AND approved=1' ;
            $args=[];
        }
      $recipies = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);
       // echo $sql;
        return $recipies->fetchAll();
    }
    public function partyFilter($name){
        //  $name=str_replace("'","\\'",$name);
          $dbConn = new Dbconnection();
          $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
  
          if (isset($name)) {
              $sql= 'SELECT * FROM `recipe` where party="'.$name.'" And approved=1';;
              $args=[];
          }
        $recipies = $dbConn->request($conn,$sql,$args);
          $dbConn ->deconnexion($conn);
         // echo $sql;
          return $recipies->fetchAll();
      }
  


    public function getCategories(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM categorie  ";
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
    public function getstepsList($id){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM  `step`   WHERE idRecipe=?;";
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
    public function getCalories($id){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= " SELECT SUM(calorie) From `makein` INNER JOIN `ingredient` on makein.idingred = ingredient.id WHERE idRecipe=?";
            $args=[$id];
      
        $calories = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $calories->fetchAll();
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

        $sql='UPDATE `recipe` SET approved=1 WHERE id=?;';

            $args=[$id];
       
            
        
        $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;
    }

    public function delete($id){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql='DELETE FROM `recipe`  WHERE id=?;';

            $args=[$id];        
        $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;
    }
    public function noter($note,$idRecipe,$idUser){

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);


        $sql="SELECT * FROM `noter` where  idUser =? And idRecipe =? ;";
        $args=[intval($idUser),intval($idRecipe)] ;
        $noter = $dbConn->request($conn,$sql,$args);
        $count = $noter->rowCount(); 
            
        if($count > 0) {
            $sql="UPDATE noter SET  note = ? where idUser =? And idRecipe =? ; ";
            $args=[$note,intval($idUser),intval($idRecipe)];
            
        }
        else {
            $sql="INSERT INTO `noter` (`idUser`, `idRecipe`, `note`) VALUES (?,?,?) ;";
            $args=[intval($idUser),intval($idRecipe),$note];

        }
        
        $noter = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);
        
        if ($count > 0) return  NULL;
        else return $noter->fetchAll();

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









    public function getPrefer($idUser) {

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql= " SELECT *
        FROM  recipe join prefer ON recipe.id =prefer.idRecipe
        WHERE idUser=?";
            $args=[$idUser];
       
            
        
        $r = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);
        return $r->fetchAll();


    }
    public function getNoted($idUser) {

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql= " SELECT *
        FROM  recipe join noter ON recipe.id =noter.idRecipe
        WHERE idUser=?";
            $args=[$idUser];
       
            
        
        $r = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);
        return $r->fetchAll();


    }

    public function getAjouter($id) {

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);


            
        $sql= " SELECT FirstName FROM `user`  WHERE id = ? ";
        $args=[$id ];
       $name  = $dbConn->request($conn,$sql,$args)->fetchAll()[0][0];
        
        $sql= " SELECT * FROM  recipe  WHERE writer='$name'";
            $args=[];
               
        $r = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);
         return $r->fetchAll();


    }


    public function isPrefer($idRecipe, $idUser){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql= " SELECT *
        FROM  prefer
        WHERE idUser=? and idRecipe=?";
            $args=[$idUser,$idRecipe];
       
        $prefer = $dbConn->request($conn,$sql,$args);
        $count = $prefer->rowCount(); 
        $dbConn ->deconnexion($conn);
        if ($count > 0 )
        return 1;
        else return 0 ;
    
    } 
    public function isNoted($idRecipe, $idUser){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
       
        $sql="SELECT * FROM `noter` where  idUser =? And idRecipe =? ;";
        $args=[intval($idUser),intval($idRecipe)] ;
        $noter = $dbConn->request($conn,$sql,$args);
        $count = $noter->rowCount(); 
       
        $dbConn ->deconnexion($conn);
        if ($count > 0 ) 
          return  $noter->fetchAll()[0][2];

        else  return 0;
    
    }
    public function prefer($idRecipe, $idUser){

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);


        $sql="SELECT * FROM `prefer` where  idUser =? AND idRecipe =?;";
        $args=[$idUser,$idRecipe] ;
        $noted = $dbConn->request($conn,$sql,$args);
        $count = $noted->rowCount(); 
            
        if($count > 0) {
            $sql = "DELETE FROM prefer WHERE idUser =? And idRecipe =?;";
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



    public function addRecipe($name,$description,$serves,$PrepTime,$CookTime, $RestTime,$optionCat,$optionParty,$Ingreds,$steps ,$imagePath,$videoPath, $writer,$saison,$optiondiff){


        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
        $sql = "INSERT INTO `recipe` (`id`, `name`, `description`, `serves`, `preparationTime`, `restTime`, `categorie`, `cookingTime`, `imgPath`, `videoPath`, `party`, `writer`,`saison`,`difficulty`) VALUES (NULL, ?, ?,?,?, ?,?,? ,?,?,?,?,?,?);";
        $args=[$name,$description,$serves,$PrepTime,$RestTime,$optionCat,$CookTime,$imagePath,$videoPath, $optionParty , $writer,$saison,$optiondiff];
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


    public function filtrage($filter,$recipeSql) {

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

       
        $args=[];
        $sql= "select * from  (SELECT * from $recipeSql as input  INNER join (SELECT id as idR,AVG(note) as NoteF FROM `recipe` inner join `noter` on recipe.id = noter.idRecipe GROUP By idR)  as res on  input.id = res.idR ) as res2  INNER join ( SELECT idRecipe,SUM(calorie) as calorieF From `makein` INNER JOIN `ingredient` on makein.idingred = ingredient.id  GROUP By idRecipe) as res3  on res2.id = res3.idRecipe  where ";
        $ss = $filter['saison'];
      //  echo "$ss";
        if("1" != $ss) {
            if ($ss=="4")
           $sql=  $sql.'saison="automne" AND ' ;
           elseif ($ss=="2") {
           
            $sql=  $sql.'saison="hiver" AND ' ;
            # code...
           }
           elseif ($ss=="3") {
           
            $sql=  $sql.'saison="L????????????t????" AND ' ;
            # code...
           }   
            elseif ($ss=="Le printemps") {
           
            $sql=  $sql.'saison="Le printemps" AND ' ;
            # code...
           }
        }
        $MIN =$filter['cuisson'][0];
        $MAX =$filter['cuisson'][1];
        $sql=  $sql. " cookingTime BETWEEN $MIN AND $MAX  AND ";
        $MIN =$filter['preparation'][0];
        $MAX =$filter['preparation'][1];
        $sql=  $sql. " preparationTime BETWEEN $MIN AND $MAX AND ";
        $MIN =$filter['totale'][0];
        $MAX =$filter['totale'][1];
        $sql=  $sql. " preparationTime + cookingTime  BETWEEN $MIN AND $MAX AND ";
        
        $MIN =$filter['star'][0];
        $MAX =$filter['star'][1];
        $sql=  $sql. " NoteF  BETWEEN $MIN AND $MAX  AND";
        
        $MIN =$filter['calorie'][0];
        $MAX =$filter['calorie'][1];
        $sql=  $sql. " calorieF  BETWEEN $MIN AND $MAX  ";
        $sql=  $sql. " AND approved=1";
        if ( $filter['sortBy'] == "NC") $sql=  $sql." ORDER BY calorieF";
        if ( $filter['sortBy'] == "TP") $sql=  $sql." ORDER BY preparationTime";
        if ( $filter['sortBy'] == "TT") $sql=  $sql." ORDER BY (preparationTime + cookingTime)";
        if ( $filter['sortBy'] == "TC") $sql=  $sql." ORDER BY cookingTime";
        if ( $filter['sortBy'] == "NT") $sql=  $sql." ORDER BY NoteF DESC";

       
       
            
      // echo $sql;
        $res = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);
      //  echo $res->fetchAll()[0][0];
        return  $res ->fetchAll();

    }




}




?>