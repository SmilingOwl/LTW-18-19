<?php $taste_choices=get_taste_choices(); ?>

<section id=create_story>
    <form>
        <label>Title: <textarea name="title"></textarea></label>
        <textarea name="text"> Write your story here! </textarea>
        <textarea name="image"> Write the name of the image here! </textarea>
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        <select name="tasteChoice">
            <?php foreach($taste_choices as $taste) {?>
                <option value="<?=$taste['id_taste']?>"><?=$taste['taste']?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Submit">
    </form>
</section>