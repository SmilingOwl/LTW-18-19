<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

    $user_id = $_POST['user_id'];
    $id_taste = $_POST['id_taste'];

    $answer = save_taste_choice_user($user_id, $id_taste);

    echo json_encode($answer);
?>