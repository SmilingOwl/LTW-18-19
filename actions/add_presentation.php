<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../includes/session.php');

    $presentation = $_POST['presentation'];
    $user_id = $_SESSION['user_id'];

    add_presentation($user_id, $presentation);

    header('Location: ../php/profile.php');
?>