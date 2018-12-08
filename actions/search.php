<?php 
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_likes.php');
    
    $stories = [];
    $search_word = $_POST['search_word'];

    if ($search_word == "")
        $stories = get_all_stories_users();
    else {
        $stories_by_user = get_stories_by_username($search_word);
        $stories_by_title = get_stories_by_title($search_word);

        $stories = array_merge($stories_by_user, $stories_by_title);
    }

    $stories_to_return = [];
    foreach ($stories as $story) {
        $likes = get_likes_story($story['story_id']);
        $dislikes = get_dislikes_story($story['story_id']);
        $favorites = get_favorites_story($story['story_id']);
        $comments = get_comments_in_story($story['story_id']);
        $taste = get_taste_choice($story['id_taste');
        
        $story['likes'] = count($likes);
        $story['dislikes'] = count($dislikes);
        $story['favorites'] = count($favorites);
        $story['comments'] = count($comments);
        $story['taste'] = $taste;
        array_push($stories_to_return, $story);
    }

    echo json_encode($stories_to_return);
?>