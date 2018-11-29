<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');

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
    $comments_to_write='comments';
    if(count($comments) == 1)
        $comments_to_write='comment';

    $tasteChoice = get_taste_choice($story['id_taste']);

    $likes = get_likes_story($story['story_id']);
    $likes_to_write='likes';
    if(count($likes) == 1)
        $likes_to_write='like';

    $dislikes = get_dislikes_story($story['story_id']);
    $dislikes_to_write='dislikes';
    if(count($dislikes) == 1)
        $dislikes_to_write='dislike';

    include_once('../templates/common/header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stories Website</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
    <script src="../scripts/script.js" defer></script>
</head>
<body>

    <header>
        <h1><?=$story['title']?></a></h1>
    </header>

    <section id="story">
        <article>
            <header>
                <img src=<?=$story['photo']?> alt="Can't load picture">
            </header>
            <?php foreach($paragraphs as $paragraph) {?>
                <p><?=$paragraph?></p>
            <?php } ?>
            <footer>
                <span class="author">By <?=$writer['username']?></span>
                <span class="likes"><?=count($likes)?> <?=$likes_to_write?></span>
                <span class="dislikes"><?=count($dislikes)?> <?=$dislikes_to_write?></span>
                <span class="tasteChoice">
                    <a href="story_item.html">#<?=$tasteChoice['taste']?></a>
                </span>
                <span class="comments"><?=count($comments)?> <?=$comments_to_write?>:</span>
            </footer>
        </article>
    </section>

    <section id="comments">
    <?php foreach ($comments as $comment) { 
        $comments_likes = get_likes_comment($comment['id_comment']);
        $comments_dislikes = get_dislikes_comment($comment['id_comment']);
        $likes_to_write='likes';
        if(count($comments_likes) == 1)
            $likes_to_write='like';

        $dislikes = get_dislikes_story($story['story_id']);
        $dislikes_to_write='dislikes';
        if(count($comments_dislikes) == 1)
            $dislikes_to_write='dislike';
    ?>
        <article class="comment">
            <?php $comment_user = get_user($comment['user_id']);?>
            <span class="user"><?=$comment_user['username']?> says: </span>
            <p><?=$comment['text']?></p>
            <span class="likes"><?=count($comments_likes)?> <?=$likes_to_write?></span>
            <span class="dislikes"><?=count($comments_dislikes)?> <?=$dislikes_to_write?></span>
        </article>
    <?php } ?>
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
    </body>
</html>