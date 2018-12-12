<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

    $user_id = $_SESSION['user_id'];
    $taste_choices = get_taste_choices();
    $users_taste_choices = get_users_taste_choices($user_id);

    include_once('../templates/common/header.php');
?>

<body>
   
   <header>
    <script src="../scripts/show_menu.js" defer></script>
    <input type="hidden" name="user_id" value=<?=$user_id?>>
    <?php include_once('../templates/common/upper_header.php');?>
        <h3>Choose your <br> favorites topics!</h5>
        <?php if (isset($_SESSION['messages'])) {?>
            <section id="messages">
            <?php foreach($_SESSION['messages'] as $message) { ?>
                <div class="<?=$message['type']?>"><?=$message['content']?></div>
            <?php } ?>
            </section>
        <?php unset($_SESSION['messages']); } ?>

    </header>
    <div id=save_tastes>
        <form action="../actions/save_taste_choices.php" method="post">
        <?php foreach($taste_choices as $taste) { 
            $is_checked = false;
            foreach($users_taste_choices as $user_taste)
                if($user_taste['taste'] == $taste['taste']) {
                    $is_checked = true;
                    break;
                }
            if ($is_checked) {
        ?>
            <label><input type="checkbox" name=<?=$taste['taste']?> value=<?=$taste['taste']?> checked> <?=$taste['taste']?> </label>
        <?php } else {?>
            <label><input type="checkbox" name=<?=$taste['taste']?> value=<?=$taste['taste']?>> <?=$taste['taste']?> </label>
        <?php }} ?>
            <input type="submit" value="Submit">
        </form>

        <form id= add_new_topic action="../actions/add_taste_choices.php" method="post">
            <label><input type="text" name="taste" placeholder="Add a new topic!" ></label>
            <input type="submit" value="Add">
        </form>
    </div>
    <?php include_once('../templates/common/footer.php'); ?>