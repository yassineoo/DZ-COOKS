<?php

require_once "../controllers/dashboardController.php" ;


session_start();

$target_dir = "../public/images/diapo/";
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
    
    $imageName = basename( $_FILES["ImageUpload"]["name"]);
    $title= $_POST["title"];
    $path= $_POST["path"];
    $type = $_POST["type"];    
    
    $homeController = new DashboardController();
    
    $homeController-> addDiapos($imageName,$title,$path,$type);
  
    header("location:./theme.php") ;
    exit();
    
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

}

?>