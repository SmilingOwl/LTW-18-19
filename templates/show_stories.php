<section id="stories">
    <?php foreach($stories as $story) { 
        $user = get_user($story['writer_id']);
        $num_comments = get_comments_in_story($story['story_id']); 
        $tasteChoice = get_taste_choice($story['id_taste']);
        $comments_to_write='comments';
        if(count($num_comments) == 1)
            $comments_to_write='comment';

    ?>
    <article>
        <header>
            <h1><a href="story_item.php?story_id=<?=$story['story_id']?>&user_id=<?=$user_id?>"><?=$story['title']?></a></h1>
            <img src=<?=$story['photo']?> alt="Can't load picture">
        </header>
        <p><?=$story['text']?></p>
        <footer>
            <span class="author">By <?=$user['username']?></span>
            <span class="likes"><?=$story['likes']?> likes</span>
            <span class="dislikes"><?=$story['dislikes']?> dislikes</span>
            <span class="tasteChoice">
                <a href="story_item.html">#<?=$tasteChoice['taste']?></a>
            </span>
            <a class="comments" href="story_item.php?story_id=<?=$story['story_id']?>&user_id=<?=$user_id?>"><?=count($num_comments)?> <?=$comments_to_write?></a>
        </footer>
    </article>
    <?php } ?>
</section>