<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $img = $_POST['img'];
    $id_taste_choice = $_POST['id_taste_choice'];

    $story = add_story($user_id, $title, $text, $img, $id_taste_choice);

    echo json_encode($story);
?>