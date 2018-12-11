<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $user_id = $_SESSION['user_id'];
    $stories = get_saved_stories_by_user($user_id);
    
    include_once('../templates/common/header.php');
?>
<body>
    <header>
    <?php if(sizeof($stories) != 0) {?>
    <script src="../scripts/add_favorite.js" defer></script>
    <script src="../scripts/update_likes.js" defer></script>
    <script src="../scripts/show_comments.js" defer></script>
    <?php } ?>
    <script src="../scripts/show_menu.js" defer></script>
    <?php include_once('../templates/common/upper_header.php'); ?>
      <h1> Favorite Stories </h1>
    </header>

    <?php 
        include_once('../templates/show_stories.php');
        if(sizeof($stories) == 0)
            echo "<h3> You don't have any favorite stories!</h3>";
        include_once('../templates/common/footer.php');
    ?>