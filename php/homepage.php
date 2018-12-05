<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $users_id = $_SESSION['user_id'];
    $stories = get_all_stories($users_id);
    $user = get_user($users_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stories Website</title>
    <meta charset="utf-8">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/comments.css" rel="stylesheet">
    <link href="../css/layout.css" rel="stylesheet">
    <link href="../css/icons.css" rel="stylesheet">
    <script src="../scripts/show_menu.js" defer></script>
    <script src="../scripts/show_comments.js" defer></script>
    <script src="../scripts/show_add_story.js" defer></script>
</head>
<body>
    <header>
        <h1> Home Page </h1>
        <span class="menu"><img src="../icons/menu_icon.png" alt="Menu"></span>
    </header>
    <span class="add_story"><img src="../icons/add_icon.png" alt="Add story"> </span>
    <input type="hidden" name="user_id" value="<?=$users_id?>">

<?php 
    include_once('../templates/show_stories.php');
    include_once('../templates/common/footer.php');
?>