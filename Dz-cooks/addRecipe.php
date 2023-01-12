<?php

require_once "../controllers/homeController.php" ;


session_start();

$target_dir = "../public/images/recipes/";
$target_file = $target_dir . basename($_FILES["ImageUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["ImageUpload"]["tmp_name"]);
  if($check !== false) {
  //  echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["ImageUpload"]["size"] > 1000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["ImageUpload"]["tmp_name"], $target_file)) {
    
    $imagePath = basename( $_FILES["ImageUpload"]["name"]);
    $name = $_POST["title"];
    $description = $_POST["description"];
    $serves = $_POST["serves"];
    $PrepTime = intval( $_POST["PrepTimeH"]) * 60 + intval(  $_POST["PrepTimeM"]) ;
    $CookTime = intval( $_POST["CookTimeH"]) * 60 + intval(  $_POST["CookTimeM"]) ;
    $RestTime = intval( $_POST["RestTimeH"]) * 60 + intval(  $_POST["RestTimeM"]) ;
    
    $optionParty = $_POST['party'];  
    $optionCat = $_POST['categorie'];  
    $writer = $_SESSION["username"]; 
    $videoPath = null;

    
    
    
    
    
    $Inumber =  intval($_POST["INumber"]);
    $Snumber =  intval($_POST["SNumber"]);

    $Ingred = array();
    $steps = array();
        
    for ($i=1; $i <=$Inumber  ; $i++) { 

      array_push ($Ingred , [$_POST["IngredientName".$i] , $_POST["measurement".$i],$_POST["qte".$i]]);
    }
    for ($i=1; $i <=$Snumber  ; $i++) { 

      array_push ($steps , [$_POST["step".$i],$i] );
    }
    
    $homeController = new HomeController();
    
    $homeController->addRecipe($name,$description,$serves,$PrepTime,$CookTime, $RestTime,$optionCat,$optionParty,$Ingred,$steps ,$imagePath,$videoPath, $writer);
  
    header("./".$name) ;
    exit();
    
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

}

?>