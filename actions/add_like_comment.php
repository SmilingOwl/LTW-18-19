<?php
    include_once('../database/connection.php');
    include_once('../database/access_for_likes.php');

    $user_id = $_POST['user_id'];
    $comment_id = $_POST['comment_id'];

    $likes = add_like_to_comment($user_id, $comment_id);

    echo json_encode(count($likes));
?>