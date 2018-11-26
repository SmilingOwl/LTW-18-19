<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    
    $user_id = 1;//$_GET['id'];
    $stories = get_saved_stories_by_user($user_id);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Stories Website</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1> Favorite Stories </h1>
    </header>

    <?php 
        include_once('../templates/show_stories.php');
    ?>
  </body>
</html>