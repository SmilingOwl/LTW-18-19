<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../includes/session.php');

    $taste = $_POST['taste'];

    add_new_taste_choices($taste);
    
    header('Location: ../php/taste_choices.php');
?>