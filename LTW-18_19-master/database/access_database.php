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

    function get_taste_choices(){
        global $db;
        $stmt = $db->prepare('SELECT * FROM TasteChoice');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_users_taste_choices($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM TasteChoice, TasteChoiceUser 
                                WHERE user_id = :id 
                                AND TasteChoice.id_taste = TasteChoiceUser.id_taste');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_likes_story($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM LikesStories WHERE story_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_dislikes_story($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM LikesStories WHERE story_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_likes_comment($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM LikesComments WHERE comment_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_dislikes_comment($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM DisLikesComments WHERE comment_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function add_comment($story_id, $id_user, $text) {
        global $db;
    
        $stmt = $db->prepare('INSERT INTO Comment (story_id, user_id, likes, dislikes, text) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($story_id, $id_user, 0, 0, $text));

        $stmt = $db->prepare('SELECT * FROM Comment, Users WHERE story_id = :s_id AND Comment.user_id= :u_id AND text = :t
                                AND Comment.user_id = Users.user_id');
        $stmt->bindParam(':s_id', $story_id, PDO::PARAM_INT);
        $stmt->bindParam(':u_id', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':t', $text, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
?>