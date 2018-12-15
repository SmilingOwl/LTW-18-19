<body id="story_item">

    <header>
    <?php if(isset($_SESSION['user_id'])) { ?>
        <script src="../scripts/add_comment.js" defer></script>
        <script src="../scripts/add_favorite.js" defer></script>
        <script src="../scripts/update_likes.js" defer></script>
        <script src="../scripts/show_menu.js" defer></script>
    <?php } ?>