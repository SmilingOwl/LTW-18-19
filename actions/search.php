<?php 
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    
    $search_word = $_POST['search_word'];
    
    $stories_by_user = get_stories_by_username($search_word);
    $stories_by_title = get_stories_by_title($search_word);

    $stories = array_merge($stories_by_user, $stories_by_title);

    echo json_encode($stories);
?>