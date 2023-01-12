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

}

?>