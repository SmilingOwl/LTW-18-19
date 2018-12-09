<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../includes/session.php');

    $user_id = $_SESSION['user_id'];
    $taste_choices = get_taste_choices();
    clear_taste_choices_user($user_id);
    foreach($taste_choices as $taste) {
        if(isset($_POST[$taste['taste']]))
            save_taste_choice_user($user_id, $taste['id_taste']);
    }
    
    header('Location: ../php/homepage.php');
?>