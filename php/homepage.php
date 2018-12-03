<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $user_id = $_GET['user_id'];
    $stories = get_all_stories($user_id);
    $user = get_user($user_id);
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
    <script src="../scripts/add_story.js" defer></script>
</head>
<body>
    <header>
        <h1> Home Page </h1>
        <span>Menu</span>
    </header>

<?php 
    include_once('../templates/create_story.php');
    include_once('../templates/show_stories.php');
    include_once('../templates/common/footer.php');
?>