<?php 
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../database/access_for_sorting.php');
    include_once('../database/access_for_likes.php');
    
    $sort_option = $_POST['sort_option'];

    if ($sort_option == "date")
        $stories = get_all_stories_users();
    else if($sort_option == "likes")
        $stories = get_stories_sort_by_likes();
    else if($sort_option == "dislikes")
        $stories = get_stories_sort_by_dislikes();
    else if($sort_option == "favorites")
        $stories = get_stories_sort_by_favorites();
    else if($sort_option == "comments")
        $stories = get_stories_sort_by_comments();

    $stories_to_return = [];
    foreach ($stories as $story) {
        $likes = get_likes_story($story['story_id']);
        $dislikes = get_dislikes_story($story['story_id']);
        $favorites = get_favorites_story($story['story_id']);
        $comments = get_comments_in_story($story['story_id']);
        
        $story['likes'] = count($likes);
        $story['dislikes'] = count($dislikes);
        $story['favorites'] = count($favorites);
        $story['comments'] = count($comments);
        array_push($stories_to_return, $story);
    }

    echo json_encode($stories_to_return);
?>