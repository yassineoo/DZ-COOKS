<?php
include_once "dbConnection.php";

class DiapoModel{


    public function getDiapos(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
   
        $sql= "SELECT * FROM diapos ";
        $args=[];
  
    $categories = $dbConn->request($conn,$sql,$args);
    $dbConn ->deconnexion($conn);

    return $categories->fetchAll();
    }

    public function addDiapos($imageName,$title,$path,$type) {
       $dbConn = new Dbconnection();
       $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
       $sql="INSERT INTO `diapos` (`imageName`, `title`, `path`, `type`) VALUES (?,?,?,?);";
       $args=[$imageName,$title,$path,$type];
       $dbConn->request($conn,$sql,$args);
       $dbConn ->deconnexion($conn);

    }

    public function deleteDiapo($imageName){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql='DELETE FROM `diapos`  WHERE imageName=?;';

            $args=[$imageName];        
        $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;
    }

}

?>