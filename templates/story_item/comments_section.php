<section id="comments">
    <h3> Comments: </h3>
    <?php include_once('../templates/show_comments.php'); ?>
    <?php if (isset($_SESSION['user_id'])) { ?>
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