<body id="edit_profile">
    <header>
        <link href="../css/edit_profile.css" rel="stylesheet">
        <?php if(isset($_SESSION['user_id'])) { ?>
            <script src="../scripts/show_menu.js" defer></script> 
        <?php } ?>
        <input type="hidden" name="user_id" value=<?=$user_id?>>