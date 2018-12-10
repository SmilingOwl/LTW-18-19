<?php
    include_once('../database/connection.php');
    include_once('../database/access_for_likes.php');

    $user_id = $_POST['user_id'];
    $comment_id = $_POST['id_comment'];

    $answer = does_user_like_comment($user_id, $comment_id);

    echo json_encode($answer);
?>