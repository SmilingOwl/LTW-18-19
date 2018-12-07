<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

    $story_id = $_POST['story_id'];

    $comments = get_comments_with_user($story_id);

    echo json_encode($comments);
?>