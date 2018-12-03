<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

    $user_id = 1;//$_GET['id'];
    $taste_choices = get_taste_choices();
    $users_taste_choices = get_users_taste_choices($user_id);

    include_once('../templates/common/header.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
   
   <header>
            <h4> </h4>
        </header>
    <div id=save_tastes>
        <h1>Choose your favorites topics!</h1>
        <form action="save_tastes.php" method="get">
        <?php foreach($taste_choices as $taste) { 
            $is_checked = false;
            foreach($users_taste_choices as $user_taste)
                if($user_taste['taste'] == $taste['taste']) {
                    $is_checked = true;
                    break;
                }
            if ($is_checked) {
        ?>
            <label><input type="checkbox" name="interest" value=<?=$taste['taste']?> checked="checked"> <?=$taste['taste']?> </label>
        <?php } else {?>
            <label><input type="checkbox" name="interest" value=<?=$taste['taste']?>> <?=$taste['taste']?> </label>
        <?php }} ?>
            <input type="submit" value="Submit">

        </form>
    </div>
    <?php include_once('../templates/common/footer.php'); ?>