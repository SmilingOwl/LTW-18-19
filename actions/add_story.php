<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../includes/session.php');
    include_once('../database/database_user.php');

    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $id_taste_choice = $_POST['tasteChoice'];

    $story_id = add_story($user_id, $title, $text, $id_taste_choice);

    $dir = "../pictures/story/";
    $originalName = basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($originalName, PATHINFO_EXTENSION);
    $target_file = $dir . $story_id . "." . $imageFileType ;
    $upload_is_Ok = 1;

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg") {
        $_SESSION['ERROR'] = "ERROR: Sorry, only JPG, PNG, JPEG and GIF files are allowed!";
        $upload_is_Ok = 0;
    }

    if (file_exists($target_file)) {
        unlink($target_file);
    }
     
    if ($upload_is_Ok == 0 || !move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
            || updateStoryPhoto($story_id, $target_file) == null) {
        $_SESSION['ERROR'] =  "Error uploading photo";
    }
    
    header('Location: ../php/homepage.php');
?>