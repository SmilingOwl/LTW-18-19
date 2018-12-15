<body>
    <header>
    <?php if(isset($_SESSION['user_id'])) { ?>
        <script src="../scripts/add_favorite.js" defer></script>
        <script src="../scripts/update_likes.js" defer></script>
        <script src="../scripts/show_menu.js" defer></script>
        <script src="../scripts/show_add_story.js" defer></script>
    <?php } ?>
    <script src="../scripts/show_comments.js" defer></script>
    <script src="../scripts/search_engine.js" defer></script>
    <script src="../scripts/sort_engine.js" defer></script>