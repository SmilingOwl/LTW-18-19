<?php
    function get_stories_by_user($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story WHERE writer_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_saved_stories_by_user($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM SavedStory, Story WHERE SavedStory.story_id = Story.story_id AND user_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_filtered_stories_by_user($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story, TasteChoice, TasteChoiceUser 
                            WHERE TasteChoice.id_taste = TasteChoiceUser.id_taste 
                                AND Story.id_taste=TasteChoice.id_taste 
                                AND TasteChoiceUser.user_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_comments_in_story($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Comment WHERE story_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_user($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Users WHERE user_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    function get_taste_choice($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM TasteChoice WHERE id_taste = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    function get_story($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story WHERE story_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
?>