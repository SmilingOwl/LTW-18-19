<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

    $user_id = $_SESSION['user_id'];
    $taste_choices = get_taste_choices();
    $users_taste_choices = get_users_taste_choices($user_id);
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
</head>
<body>
   
   <header>
    <?php include_once('../templates/common/upper_header.php');?>
        <h3>Choose your <br> favorites topics!</h5>
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
    </div>
    <?php include_once('../templates/common/footer.php'); ?>