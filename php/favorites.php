<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    
    $user_id = $_GET['user_id'];
    $stories = get_saved_stories_by_user($user_id);
    
    include_once('../templates/common/header.php');
?>

    <header>
      <h1> Favorite Stories </h1>
    </header>

    <?php 
        include_once('../templates/show_stories.php');
        if(sizeof($stories) == 0)
        {
    ?>
        <h3> You don't have any favorite stories!</h2>
    <?php 
        }
    ?>
  </body>
</html>