<h1> <?=$taste_choice['taste']?> </h1>
    <div id="followers_sect">
        <span class="followers"><?=$followers?> <?=$followers_to_write?></span>
        <?php if(isset($_SESSION['user_id'])) { ?>
            <span class="follow">Follow</span>
            <input type="hidden" name="user_id" value=<?=$user_id?>>
        <?php } else { ?>
            <span class="follow">Login to follow</span>
        <?php } ?>
        <input type="hidden" name="id_taste" value=<?=$taste_choice_id?>>
    </div>
</header>