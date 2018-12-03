<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $user_id = $_GET['user_id'];
    $stories = get_all_stories($user_id);
    $user = get_user($user_id);

    include_once('../templates/common/header.php');
?>

    <header>
        <h1> Home Page </h1>
        <span>Menu</span>
    </header>

<?php 
    include_once('../templates/create_story.php');
    include_once('../templates/show_stories.php');
    include_once('../templates/common/footer.php');
?>