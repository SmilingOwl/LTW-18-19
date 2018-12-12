<?php
    include_once('../includes/session.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $user_id = $_SESSION['user_id'];
    $taste_choice_id = $_GET['id_taste'];
    $stories = get_stories_by_taste_choice($taste_choice_id);
    $taste_choice = get_taste_choice($taste_choice_id);
    $user = get_user($user_id);
    $followers = get_followers($taste_choice_id);

    $followers_to_write = "Followers";
    if($followers==1)
        $followers_to_write = "Follower";

    include_once('../templates/common/header.php');
    include_once('../templates/taste_choice_stories/scripts.php');
    include_once('../templates/common/upper_header.php');
    include_once('../templates/taste_choice_stories/followers_div.php');
    if(sizeof($stories) == 0)
        echo "<h3> There are no stories in this channel. Add one in the homepage! </h3>";
    else
        include_once('../templates/show_stories.php');
    include_once('../templates/common/footer.php');
?>