<?php
include_once "dbConnection.php";

class NewsModel{


    public function getnews(){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
   
        $sql= "SELECT * FROM news ";
        $args=[];
  
    $categories = $dbConn->request($conn,$sql,$args);
    $dbConn ->deconnexion($conn);

    return $categories->fetchAll();
    }

    public function addNews($imageName,$title,$content,$videoPath=null,$writer) {
       $dbConn = new Dbconnection();
       $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);
       $sql="INSERT INTO `news` (`Description`, `title`, `imgPath`, `videoPath`, `writer`) VALUES (?,?,?,?,?);";
       $args=[$content,$title,$imageName,$videoPath,$writer];

       $dbConn->request($conn,$sql,$args);
       $dbConn ->deconnexion($conn);

    }

    public function deleteDiapo($imageName){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        $sql='DELETE FROM `news`  WHERE imageName=?;';

            $args=[$imageName];        
        $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return 1;
    }

    public function getNewsByname($name){
        $dbConn = new Dbconnection();
        $conn = $dbConn->connexion($dbConn ->servername,$dbConn ->dbname,$dbConn ->username,$dbConn ->password);

        if (isset($name)) {
            $sql= "SELECT * from `news` where news.title=? ;";
            $args=[$name];
        }
        $recipies = $dbConn->request($conn,$sql,$args);
        $dbConn ->deconnexion($conn);

        return $recipies->fetchAll();
    }


}

?>