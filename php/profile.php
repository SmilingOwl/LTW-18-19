<?php
    include_once('../includes/session.php');
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $user_id = $_SESSION['user_id'];
    $stories = get_stories_by_user($user_id);
    $user = get_user($user_id);
    $users_taste_choices = get_users_taste_choices($user_id);

    include_once('../templates/common/header.php');
?>

<header>
    <link href="../css/layout_profile.css" rel="stylesheet">
    <script src="../scripts/add_favorite.js" defer></script>
    <script src="../scripts/update_likes.js" defer></script>
    <script src="../scripts/show_menu.js" defer></script>
    <script src="../scripts/show_comments.js" defer></script>
    <?php include_once('../templates/common/upper_header.php'); ?>
</header>

<section id="profile_photo">
    <img src=<?=$user['photo']?> alt="Can't load picture">
    <div id="photo_field">
        <form action="../actions/action_upload_photo.php" method="post" enctype="multipart/form-data">
            <label>Change profile picture: 
                <input type="file" name="fileToUpload" id="fileToUpload">
            </label>
            <input type="submit" name="Submit" value="Upload">
        </form>
    </div>
</section>

<section id="profile_name">
    <h3><?=$user['username']?>'s Profile</h3>
    <?php
        $points = get_points($user_id);
    ?>
    <h4>Number of Points: <?=$points?></h4>
    <section id="presentation">
    <?php if($user['presentation']!= null) { ?>
        <p><?=$user['presentation']?></p>
    <?php } else {?>
        <h4> Add a presentation: </h4>
        <form action="../actions/add_presentation.php" method="post" >
            <input type="text" name="presentation" value="">
            <input type="submit" name="submit" value="Submit">
        </form>
    <?php } ?>
    </section>
</section>

<section id="interests">
    <h4> My interests:</h4>
    <ul>
    <?php foreach($users_taste_choices as $each_taste_choice) { ?>
        <li><a href="taste_choice_stories.php?id_taste=<?=$each_taste_choice['id_taste']?>"> <?=$each_taste_choice['taste']?></a></li>
    <?php } ?>
    </ul>
</section>

<section id="profile_stories">
    <h4> My Stories: </h4>
<?php 
    include_once('../templates/show_stories.php');
?>
</section>
<?php
    include_once('../templates/common/footer.php');
?>
