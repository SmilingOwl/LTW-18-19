<?php
    include_once('../includes/session.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');

    $user_id = $_SESSION['user_id'];
    if(isset($_GET['user_id']))
        $user_id = $_GET['user_id'];
    $stories = get_stories_by_user($user_id);
    $user = get_user($user_id);
    $users_taste_choices = get_users_taste_choices($user_id);

    include_once('../templates/common/header.php');
    include_once('../templates/profile/scripts.php');
    include_once('../templates/common/upper_header.php');
    include_once('../templates/profile/profile_photo.php');
    include_once('../templates/profile/profile_name.php');
    include_once('../templates/profile/interests.php');
    include_once('../templates/show_stories.php');
    include_once('../templates/profile/close.php');
    include_once('../templates/common/footer.php');
?>

