<body>
    <header>
    <script src="../scripts/show_menu.js" defer></script>
    <?php if(isset($_SESSION['user_id']) && isset($_GET['id_taste']) && sizeof($stories) != 0) { ?>
        <script src="../scripts/add_favorite.js" defer></script>
        <script src="../scripts/update_likes.js" defer></script>
        <script src="../scripts/show_comments.js" defer></script>
    <?php } ?>
    <?php if(isset($_SESSION['user_id'])) { ?>
        <script src="../scripts/follow.js" defer></script>
    <?php } ?>