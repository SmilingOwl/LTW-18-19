<?php
    function get_stories_by_user($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story WHERE writer_id = :id ORDER BY story_id DESC');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_stories_by_username($id){
        global $db;
        $stmt = $db->prepare('SELECT writer_id, user_id, story_id, id_taste, text, username, title 
                            FROM Story, Users WHERE username = :id AND writer_id = user_id ORDER BY story_id DESC');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_saved_stories_by_user($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM SavedStory, Story WHERE SavedStory.story_id = Story.story_id AND user_id = :id ORDER BY story_id DESC');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_stories_by_taste_choice($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story WHERE id_taste = :id ORDER BY story_id DESC');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_stories_by_title($id){
        global $db;
        $stmt = $db->prepare('SELECT writer_id, user_id, story_id, id_taste, text, username, title
                        FROM Story, Users WHERE title = :id AND writer_id = user_id ORDER BY story_id DESC');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_filtered_stories_by_user($id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story, TasteChoice, TasteChoiceUser 
                            WHERE TasteChoice.id_taste = TasteChoiceUser.id_taste 
                                AND Story.id_taste=TasteChoice.id_taste 
                                AND TasteChoiceUser.user_id = :id ORDER BY story_id DESC');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_all_stories(){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story ORDER BY story_id DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_all_stories_users(){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Story, Users WHERE writer_id = user_id ORDER BY story_id DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_all_users(){
        global $db;
        $stmt = $db->prepare('SELECT * FROM Users');
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

    function get_comments_with_user($id){
        global $db;
        $stmt = $db->prepare('SELECT Users.user_id, Comment.text, Users.username FROM Comment, Users WHERE story_id = :id
            AND Comment.user_id = Users.user_id');
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

    function get_favorites_story($id) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM SavedStory WHERE story_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function add_comment($story_id, $id_user, $text) {
        global $db;
    
        $stmt = $db->prepare('INSERT INTO Comment (story_id, user_id, text) VALUES (?, ?, ?)');
        $stmt->execute(array($story_id, $id_user, $text));

        $stmt = $db->prepare('SELECT * FROM Comment, Users WHERE story_id = :s_id AND Comment.user_id= :u_id AND text = :t
                                AND Comment.user_id = Users.user_id');
        $stmt->bindParam(':s_id', $story_id, PDO::PARAM_INT);
        $stmt->bindParam(':u_id', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':t', $text, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    function add_story($user_id, $title, $text, $id_taste_choice) {
        global $db;
    
        $stmt = $db->prepare('INSERT INTO Story (writer_id, title, text, id_taste) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($user_id, $title, $text, $id_taste_choice));

        $stmt = $db->prepare('SELECT * FROM Story, Users, TasteChoice WHERE text = :t AND title = :title
                                AND Story.id_taste = :id_taste_choice AND Story.writer_id = Users.user_id
                                AND Story.writer_id = :u_id AND TasteChoice.id_taste=Story.id_taste');
        $stmt->bindParam(':u_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':t', $text, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':id_taste_choice', $id_taste_choice, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch()['story_id'];
    }

    function save_taste_choice_user($user_id, $id_taste) {
        global $db;
        $stmt = $db->prepare('INSERT INTO TasteChoiceUser (user_id, id_taste) VALUES (?, ?)');
        $stmt->execute(array($user_id, $id_taste));
    }

    function clear_taste_choices_user($user_id) {
        global $db;
        $stmt = $db->prepare('DELETE FROM TasteChoiceUser WHERE user_id = ?');
        $stmt->execute(array($user_id));
    }

    function add_presentation($user_id, $presentation) {
        global $db;
        $stmt = $db->prepare('UPDATE Users SET presentation = ? WHERE user_id = ?');
        $stmt->execute(array($presentation, $user_id));
    }
?>