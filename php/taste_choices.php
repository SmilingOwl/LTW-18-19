<?php
    include_once('../includes/session.php');
    include_once('../database/access_database.php');

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $taste_choices = get_taste_choices();
        $users_taste_choices = get_users_taste_choices($user_id);
    }

    include_once('../templates/common/header.php');
    include_once('../templates/taste_choices/scripts.php');
    include_once('../templates/common/upper_header.php');
    if(isset($_SESSION['user_id'])) {
        include_once('../templates/taste_choices/header.php');
        include_once('../templates/taste_choices/save_tastes.php');
    } else {
        echo "<h3> Login to access page! </h3>";
    }
    include_once('../templates/common/footer.php'); 
?>