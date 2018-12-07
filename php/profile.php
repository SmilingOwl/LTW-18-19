<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $user_id = $_SESSION['user_id'];
    $stories = get_stories_by_user($user_id);
    $user = get_user($user_id);

    include_once('../templates/common/header.php');
?>

<header>
  <title>User profile page</title>
  <link href="../css/layout_profile.css" rel="stylesheet">
  <span class="menu"><img src="../icons/menu_icon.png" alt="Menu"></span>
</header>

<body>
    <img src=<?=$user['photo']?> alt="Can't load picture">
    <h3><?=$user['username']?>'s Profile</h3>

    <p id="presentation">
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book. It has survived not
    </p>
    <section id="interests">
        <h4>My interests</h4>
        <ul>
            <li>Local</a></li>
            <li>World</a></li>
            <li>Politics</a></li>
            <li>Sports</a></li>
            <li>Science</a></li>
            <li>Weather</a></li>
        </ul>
    </section>

    <section id="stories">
        <h4> My Stories: </h4>
        <?php include_once('../templates/show_stories.php');?>
    </section>
</body>

<footer>
    <?php include_once('../templates/common/footer.php');?>
</footer>
