<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    
    $user_id = 2;//$_GET['id'];
    $stories = get_filtered_stories_by_user($user_id);
    $user = get_user($user_id);

    include_once('../templates/common/header.php');
?>

    <header>
      <h1> Home Page </h1>
    </header>

    <?php 
        include_once('../templates/show_stories.php');
    ?>
        
  </body>
</html>