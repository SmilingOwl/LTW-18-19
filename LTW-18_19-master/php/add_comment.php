<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

    $user_id = $_POST['user_id'];
    $story_id = $_POST['story_id'];
    $text = $_POST['text'];

    $comments = add_comment($story_id, $user_id, $text);

    echo json_encode($comments);
?>