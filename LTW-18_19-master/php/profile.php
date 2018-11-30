<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    
    $user_id = 1;//$_GET['id'];
    $stories = get_stories_by_user($user_id);
    $user = get_user($user_id);

    include_once('../templates/common/header.php');
?>

    <header>
      <h1> Profile </h1>
    </header>

    <section id="presentation">
        <h2><?=$user['username']?></h2>
        <img src=<?=$user['photo']?> alt="Can't load picture">
    </section>

    <h2> My Stories: </h2>

    <?php 
        include_once('../templates/show_stories.php');
    ?>
  </body>
</html>