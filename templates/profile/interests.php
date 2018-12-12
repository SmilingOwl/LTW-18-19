<section id="interests">
    <h4><?=$user['username']?>'s interests:</h4>
    <ul>
    <?php foreach($users_taste_choices as $each_taste_choice) { ?>
        <li><a href="taste_choice_stories.php?id_taste=<?=$each_taste_choice['id_taste']?>"> <?=$each_taste_choice['taste']?></a></li>
    <?php } ?>
    </ul>
</section>

<section id="profile_stories">
    <h4><?=$user['username']?>'s Stories: </h4>