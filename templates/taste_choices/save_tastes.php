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