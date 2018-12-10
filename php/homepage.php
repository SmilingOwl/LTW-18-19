<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $users_id = $_SESSION['user_id'];
    $stories = get_all_stories($users_id);
    $user = get_user($users_id);

    include_once('../templates/common/header.php');
?>

<body>
    <header>
    <script src="../scripts/add_favorite.js" defer></script>
    <script src="../scripts/update_likes.js" defer></script>
    <script src="../scripts/show_menu.js" defer></script>
    <script src="../scripts/show_comments.js" defer></script>
    <script src="../scripts/show_add_story.js" defer></script>
    <script src="../scripts/search_engine.js" defer></script>
    <script src="../scripts/sort_engine.js" defer></script>
    <?php include_once('../templates/common/upper_header.php'); ?>
        <h1> Home Page </h1>
    </header>
    <span class="add_story"><img src="../icons/add_icon.png" alt="Add story"> </span>
    <input type="hidden" name="user_id" value="<?=$users_id?>">
    <header id="filter_stories">
            <label>Search: <input type="text" name="search_box" value=""></label>
            <label>Sort: 
                <select name="sort_menu">
                    <option value="date">Most Recent</option>
                    <option value="likes">Most Likes</option>
                    <option value="dislikes">Most Dislikes</option>
                    <option value="favorites">Most Favorites</option>
                    <option value="comments">Most Comments</option>
                </select>
            </label>
    </header>

<?php 
    include_once('../templates/show_stories.php');
    include_once('../templates/common/footer.php');
?>