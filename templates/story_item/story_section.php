    <h1><?=$story['title']?></a></h1>
</header>

<section id="story">
    <article>
        <div id="paragraphs">
        <?php foreach($paragraphs as $paragraph) {?>
            <p><?=$paragraph?></p>
        <?php } ?>
        </div>
        <header>
            <img src=<?=$story['photo']?> alt="Can't load picture">
        </header>
        <footer>
            <span class="author">By <a href="profile.php?user_id=<?=$writer['user_id']?>"> <?=$writer['username']?> </a></span>
            <span class="likes"><?=count($likes)?> <img src="../icons/like_icon.png" alt="<?=$likes_to_write?>"></span>
            <span class="dislikes"><?=count($dislikes)?> <img src="../icons/dislike_icon.png" alt="<?=$dislikes_to_write?>"></span>
            <span class="tasteChoice">
                <a href="taste_choice_stories.php?id_taste=<?=$story['id_taste']?>">#<?=$tasteChoice['taste']?></a>
            </span>
            <span class="favorites"><?=count($favorites)?> <img src="../icons/saved_icon.png" alt="favorites"></span>
            <span class="date"><?=$story['date']?></span>
            <input type="hidden" name="user_id" value="<?=$user_id?>">
            <input type="hidden" name="story_id" value="<?=$story_id?>">
        </footer>
    </article>
</section>