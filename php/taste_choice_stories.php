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
    $followers = get_followers($taste_choice_id);

    $followers_to_write = "Followers";
    if($followers==1)
        $followers_to_write = "Follower";

    include_once('../templates/common/header.php');
?>
<body>
    <header>
    <script src="../scripts/show_menu.js" defer></script>
    <?php if(sizeof($stories) != 0) { ?>
    <script src="../scripts/add_favorite.js" defer></script>
    <script src="../scripts/update_likes.js" defer></script>
    <script src="../scripts/show_comments.js" defer></script>
    <?php } ?>
    <script src="../scripts/follow.js" defer></script>
    <?php include_once('../templates/common/upper_header.php'); ?>
        <h1> <?=$taste_choice['taste']?> </h1>
        <div id="followers_sect">
            <span class="followers"><?=$followers?> <?=$followers_to_write?></span>
            <span class="follow">Follow</span>
            <input type="hidden" name="user_id" value=<?=$user_id?>>
            <input type="hidden" name="id_taste" value=<?=$taste_choice_id?>>
        </div>
    </header>

    <?php 
        if(sizeof($stories) == 0)
            echo "<h3> There are no stories in this channel. Add one in the homepage! </h3>";
        else
            include_once('../templates/show_stories.php');
        
        include_once('../templates/common/footer.php');
    ?>