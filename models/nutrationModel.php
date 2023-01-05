<?php

include_once "dbConnection.php";

class NutrationModel{

  
    public function getIngredient($id=null){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($id)) {
            $sql= "SELECT * FROM  ingredient where id=?;";
            $args=[$id];
        }
        else {
            $sql="SELECT * FROM  ingredient";
            $args=[];
        }
        $data = array();
        $result = $dbConn->request($conn,$sql,$args);
        foreach($result as $row)
        {
            $data[] = array(
                'label'     =>  $row["name"],
                'value'     =>  $row["name"]
            );
        }
        $dbConn ->deconnexion($conn);

        return $data;
    }


    public function mostPobular(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
        $sql= "SELECT name from `ingredient` INNER JOIN (SELECT idingred , COUNT(idRecipe) as num FROM `makein` GROUP BY `idingred` ORDER BY `num` DESC LIMIT 3 ) as res On ingredient.id = res.idingred ;";
        $args=[];
        $result = $dbConn->request($conn,$sql,$args);

        return $result->fetchAll();
    }

    public function getCategories(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM `ingredientscategorie`";
            $args=[];
      
        $categories = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $categories->fetchAll();
    }

    public function getSeasons(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM `seasons`";
            $args=[];
      
        $seasons = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $seasons->fetchAll();
    }
    public function getMineraux(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM `mineraux`";
            $args=[];
      
        $mineraux = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $mineraux->fetchAll();
    }
    public function getVitamines(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM `vitamines`";
            $args=[];
      
        $vitamines = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $vitamines->fetchAll();
    }
    public function getInfo(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT * FROM `infoingredient`";
            $args=[];
      
        $Info = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $Info->fetchAll();
    }

   
    public function addIngredient($name ,$calories ,$season ,$categorie,$vitamines,$mineraux , $information){

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "INSERT INTO `ingredient` (`id`, `name`,`categorie`, `saison`, `healthy`, `calorie` ) VALUES (NUll, ?, ?, ?, 50,?); ";
            $args=[$name ,$categorie , $season , $calories ];
      


        $dbConn->request($conn,$sql,$args);

        $sql= " SELECT id FROM `ingredient`  WHERE `name` = ? ";
        $args=[$name ];
        $id  = $dbConn->request($conn,$sql,$args)->fetchAll()[0][0];

        $sql= "INSERT INTO `vitin` (`idIngred`, `vitamine`, `qte`) VALUES (?, ?, ?);";
      
        foreach ($vitamines as  $vitamine) {
        $args=[$id , $vitamine[0] , $vitamine[1]];
        $dbConn->request($conn,$sql,$args);
            
        }
        $sql= "INSERT INTO `minerauxin` (`idIngred`, `mineraux`, `qte`) VALUES (?, ?, ?);";

        foreach ($mineraux as  $min) {
            $args=[$id , $min[0] , $min[1]];
            $dbConn->request($conn,$sql,$args);
                
            }
        $sql= "INSERT INTO `infoin` (`idIngred`, `info`, `qte`) VALUES (?, ?, ?);";

        foreach ($information as  $info) {
                $args=[$id , $info[0] , $info[1]];
                $dbConn->request($conn,$sql,$args);
                    
                }
        $dbConn ->deconnexion($conn);

        //return $seasons->fetchAll();


    }



    public function getPercentage(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
            $sql= "SELECT ideaPercentage FROM `settings`";
            $args=[];
      
        $Percentage = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $Percentage->fetchAll();
    }

  



    public function ideaGenerator($ingredList) {

        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        
      

        $first=1 ;
        $sql="";
        foreach ($ingredList as $ingred) {
            if ($first == 0){
                $sql=$sql." UNION  SELECT * from makein INNER JOIN (SELECT id FROM `ingredient` WHERE name='".$ingred."') as res1 ON makein.idingred = res1.id  ";
            }
            else {
                $first=0 ;
                $sql=$sql."SELECT * from makein INNER JOIN (SELECT id FROM `ingredient` WHERE name='".$ingred."') as res1 ON makein.idingred = res1.id  ";
            }

        }
        
        $sqlFinale = "SELECT idRecipe,count(idingred) as num from (".$sql.") as res2  GROUP BY res2.idRecipe; ";
        $args=[];
        $ideas = $dbConn->request($conn,$sqlFinale,$args);
        $dbConn ->deconnexion($conn);
        
        return $ideas->fetchAll() ;
    }


   





}

//  $t =new NutrationModel();
//  $r = $t ->ideaGenerator(['ingred1',"koko","dodo"]);
//  echo $r[0];
?>