<?php
    include_once('../includes/session.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $users_id = $_SESSION['user_id'];
    $stories = get_all_stories($users_id);
    $user = get_user($users_id);

    include_once('../templates/common/header.php');
    include_once('../templates/homepage/scripts.php');
    include_once('../templates/common/upper_header.php');
    include_once('../templates/homepage/filter_stories.php');
    include_once('../templates/show_stories.php');
    include_once('../templates/common/footer.php');
?>