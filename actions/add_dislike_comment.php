<?php
    include_once('../database/connection.php');
    include_once('../database/access_for_likes.php');

    $user_id = $_POST['user_id'];
    $comment_id = $_POST['comment_id'];

    $dislikes = add_dislike_to_comment($user_id, $comment_id);

    echo json_encode(count($dislikes));
?>