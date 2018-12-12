<section id="profile_name">
    <h3><?=$user['username']?>'s Profile</h3>
    <?php
        $points = get_points($user_id);
    ?>
    <h4>Number of Points: <?=$points?></h4>
    <section id="presentation">
    <?php if($user['presentation']!= null) { ?>
        <p><?=$user['presentation']?></p>
    <?php } else if($user_id == $_SESSION['user_id']) {?>
        <h4> Add a presentation: </h4>
        <form action="../actions/add_presentation.php" method="post" >
            <input type="text" name="presentation" value="">
            <input type="submit" name="submit" value="Submit">
        </form>
    <?php } ?>
    </section>
</section>