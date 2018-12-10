<?php
    $comments = get_comments_in_story($story['story_id']);  
    foreach ($comments as $comment) { 
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
        <span class="user"><?=$comment_user['username']?> </span>
        <p><?=$comment['text']?></p>
        <footer>
            <span class="likes"><?=count($comments_likes)?> <img src="../icons/like_icon.png" alt="<?=$likes_to_write?>"></span>
            <span class="dislikes"><?=count($comments_dislikes)?> <img src="../icons/dislike_icon.png" alt="<?=$dislikes_to_write?>"></span>
            <input type="hidden" name="id_comment" value="<?=$comment['id_comment']?>">
            <input type="hidden" name="user_id" value="<?=$comment['user_id']?>">
        </footer>
    </article>
<?php } ?>