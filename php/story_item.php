<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');

    if (!isset($_GET['story_id']))
        die("No id passed for the story item!");
    
    if (isset($_GET['user_id']))
    {
        $user_id = $_GET['user_id'];
        $user = get_user($user_id);
    }
    $story_id=$_GET['story_id'];
    $story = get_story($story_id);
    $writer = get_user($story['writer_id']);
    $paragraphs = explode("\n", $story['text']);
    $comments = get_comments_in_story($story['story_id']); 
    $favorites = get_favorites_story($story_id);

    $tasteChoice = get_taste_choice($story['id_taste']);

    $likes = get_likes_story($story['story_id']);
    $likes_to_write='likes';
    if(count($likes) == 1)
        $likes_to_write='like';

    $dislikes = get_dislikes_story($story['story_id']);
    $dislikes_to_write='dislikes';
    if(count($dislikes) == 1)
        $dislikes_to_write='dislike';

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
    <script src="../scripts/add_comment.js" defer></script>
    <script src="../scripts/show_menu.js" defer></script>
    <script src="../scripts/update_likes.js" defer></script>
    <script src="../scripts/add_favorite.js" defer></script>
</head>
<body>

    <header>
        <h1><?=$story['title']?></a></h1>
        <span class="menu"><img src="../icons/menu_icon.png" alt="Menu"></span>
    </header>

    <section id="story">
        <article>
            <?php foreach($paragraphs as $paragraph) {?>
                <p><?=$paragraph?></p>
            <?php } ?>
            <header>
                <img src=<?=$story['photo']?> alt="Can't load picture">
            </header>
            <footer>
                <span class="author">By <?=$writer['username']?></span>
                <span class="likes"><?=count($likes)?> <img src="../icons/like_icon.png" alt="<?=$likes_to_write?>"></span>
                <span class="dislikes"><?=count($dislikes)?> <img src="../icons/dislike_icon.png" alt="<?=$dislikes_to_write?>"></span>
                <span class="tasteChoice">
                    <a href="story_item.html">#<?=$tasteChoice['taste']?></a>
                </span>
                <span class="favorites"><?=count($favorites)?> <img src="../icons/saved_icon.png" alt="favorites"></span>
            </footer>
        </article>
    </section>

    <section id="comments">
    <h3> Comments: </h3>
    <?php include_once('../templates/show_comments.php'); ?>
    <?php if (isset($_GET['user_id'])) { ?>
        <form>
            <h3><?=$user['username']?> says:</h3>
            <textarea name="text"> Write your comment here! </textarea>
            <input type="hidden" name="user_id" value="<?=$user_id?>">
            <input type="hidden" name="story_id" value="<?=$story_id?>">
            <input type="submit" value="Reply">
        </form>
    <?php } else {?>
        <h3> Log in to add a comment! <h3>
    <?php } ?>
    </section>
<?php include_once('../templates/common/footer.php'); ?>