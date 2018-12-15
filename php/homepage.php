<?php
    include_once('../includes/session.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    if(isset($_SESSION['user_id'])) {
        $users_id = $_SESSION['user_id'];
        $user = get_user($users_id);
    }
    
    $stories = get_all_stories();
    include_once('../templates/common/header.php');
    include_once('../templates/homepage/scripts.php');
    include_once('../templates/common/upper_header.php');
    include_once('../templates/homepage/filter_stories.php');
    include_once('../templates/show_stories.php');
    include_once('../templates/common/footer.php');
?>