<?php
    include_once('../database/connection.php');
    function get_stories_sort_by_likes(){
        global $db;
        $stmt = $db->prepare('SELECT Story.story_id as story_id, writer_id, title, date, text, Story.photo, id_taste, username, count(*) as likes
                              FROM Story, Users, LikesStories WHERE Users.user_id = writer_id AND Story.story_id = LikesStories.story_id
                              GROUP BY Story.story_id
                              UNION
                              SELECT story_id, writer_id, title, date, text, Story.photo, id_taste, username, 0 as likes
                              FROM Story, Users WHERE user_id = writer_id AND story_id NOT IN (SELECT story_id FROM LikesStories)
                              ORDER BY likes DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_stories_sort_by_dislikes(){
        global $db;
        $stmt = $db->prepare('SELECT Story.story_id as story_id, writer_id, title, date, text, Story.photo, id_taste, username, count(*) as dislikes
                              FROM Story, Users, DislikesStories WHERE Users.user_id = writer_id AND Story.story_id = DislikesStories.story_id
                              GROUP BY Story.story_id
                              UNION
                              SELECT story_id, writer_id, title, date, text, Story.photo, id_taste, username, 0 as dislikes
                              FROM Story, Users WHERE user_id = writer_id AND story_id NOT IN (SELECT story_id FROM DislikesStories)
                              ORDER BY dislikes DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_stories_sort_by_favorites(){
        global $db;
        $stmt = $db->prepare('SELECT Story.story_id as story_id, writer_id, title, date, text, Story.photo, id_taste, username, count(*) as favorites
                              FROM Story, Users, SavedStory WHERE Users.user_id = writer_id AND Story.story_id = SavedStory.story_id
                              GROUP BY Story.story_id
                              UNION
                              SELECT story_id, writer_id, title, date, text, Story.photo, id_taste, username, 0 as favorites
                              FROM Story, Users WHERE user_id = writer_id AND story_id NOT IN (SELECT story_id FROM SavedStory)
                              ORDER BY favorites DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_stories_sort_by_comments(){
        global $db;
        $stmt = $db->prepare('SELECT Story.story_id as story_id, writer_id, title, Story.date as date, Story.text as text, Story.photo, id_taste, username, count(*) as comments
                              FROM Story, Users, Comment WHERE Users.user_id = writer_id AND Story.story_id = Comment.story_id
                              GROUP BY Story.story_id
                              UNION
                              SELECT story_id, writer_id, title, date, Story.text as text, Story.photo, id_taste, username, 0 as comments
                              FROM Story, Users WHERE user_id = writer_id AND story_id NOT IN (SELECT story_id FROM Comment)
                              ORDER BY comments DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }
?>