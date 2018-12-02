<section id="stories">
    <?php foreach($stories as $story) { 
        $user = get_user($story['writer_id']);
        $num_comments = get_comments_in_story($story['story_id']); 
        $tasteChoice = get_taste_choice($story['id_taste']);
        $comments_to_write='comments';
        if(count($num_comments) == 1)
            $comments_to_write='comment';
        $likes = get_likes_story($story['story_id']);
        $likes_to_write='likes';
        if(count($likes) == 1)
            $likes_to_write='like';
        $dislikes = get_dislikes_story($story['story_id']);
        $dislikes_to_write='dislikes';
        if(count($dislikes) == 1)
            $dislikes_to_write='dislike';
    ?>
    <article>
        <header>
            <h1><a href="story_item.php?story_id=<?=$story['story_id']?>&user_id=<?=$user_id?>"><?=$story['title']?></a></h1>
        </header>
        <p><?=$story['text']?></p>
        <footer>
            <span class="author">By <?=$user['username']?></span>
            <span class="likes"><?=count($likes)?> <?=$likes_to_write?></span>
            <span class="dislikes"><?=count($dislikes)?> <?=$dislikes_to_write?></span>
            <span class="tasteChoice">
                <a href="story_item.html">#<?=$tasteChoice['taste']?></a>
            </span>
            <a class="comments" href="story_item.php?story_id=<?=$story['story_id']?>&user_id=<?=$user_id?>"><?=count($num_comments)?> <?=$comments_to_write?></a>
            <input type="hidden" name="story_id" value="<?=$story['story_id']?>">
        </footer>
    </article>
    <?php } ?>
</section>