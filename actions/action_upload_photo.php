<?php
    include_once('../includes/session.php');
    include_once("../database/database_user.php");

  $dir = "../pictures/profile/";
  $originalName = basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($originalName,PATHINFO_EXTENSION);
  $target_file = $dir . $_SESSION['user_id'] . "." . $imageFileType ;
  $upload_is_Ok = 1;
 
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg"  ) {
    $_SESSION['ERROR'] = "ERROR: Sorry, only JPG, PNG, JPEG and GIF files are allowed!";
    $upload_is_Ok = 0;
  }
  

  //Overide picture
  if (file_exists($target_file)) {
    unlink($target_file);
  }
 

  if ($upload_is_Ok == 0) {
    $_SESSION['ERROR'] =  "Error uploading photo";

  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      
      if(updateUserPhoto($_SESSION['user_id'], $target_file)==null){
        $_SESSION['ERROR'] = "Error uploading photo";
      }

    } else {
        $_SESSION['ERROR'] =  "Error uploading photo";
    }
  }


  header('Location: ../php/profile.php');
?>