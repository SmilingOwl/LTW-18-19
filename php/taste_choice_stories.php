<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $user_id = $_SESSION['user_id'];
    $taste_choice_id = $_GET['id_taste'];
    $stories = get_stories_by_taste_choice($taste_choice_id);
    $taste_choice = get_taste_choice($taste_choice_id);
    $user = get_user($user_id);

    include_once('../templates/common/header.php');
?>

    <header>
    <?php include_once('../templates/common/upper_header.php'); ?>
        <h1> <?=$taste_choice['taste']?> </h1>
    </header>

    <?php 
        include_once('../templates/show_stories.php');
        include_once('../templates/common/footer.php');
    ?>