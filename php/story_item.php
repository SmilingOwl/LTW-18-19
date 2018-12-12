<?php
    include_once('../includes/session.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');

    if (!isset($_GET['story_id']))
        die("No id passed for the story item!");
    
    if (isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];
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

    include_once('../templates/common/header.php');
    include_once('../templates/story_item/scripts.php');
    include_once('../templates/common/upper_header.php');
    include_once('../templates/story_item/story_section.php');
    include_once('../templates/story_item/comments_section.php');
    include_once('../templates/common/footer.php');
?>