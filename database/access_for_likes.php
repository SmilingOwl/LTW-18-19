<?php
    function add_like_to_story($user_id, $story_id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM LikesStories WHERE user_id = ? AND story_id=?');
        $stmt->execute(array($user_id, $story_id));
        $stmt2 = $db->prepare('SELECT * FROM DislikesStories WHERE user_id = ? AND story_id=?');
        $stmt2->execute(array($user_id, $story_id));
        if(empty($stmt->fetch()) && empty($stmt2->fetch())) {
            $stmt = $db->prepare('INSERT INTO LikesStories (user_id, story_id) VALUES (?, ?)');
            $stmt->execute(array($user_id, $story_id));
        }

        $stmt = $db->prepare('SELECT * FROM LikesStories WHERE story_id=?');
        $stmt->execute(array($story_id));
        return $stmt->fetchAll();
    }

    function add_dislike_to_story($user_id, $story_id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM DislikesStories WHERE user_id = ? AND story_id=?');
        $stmt->execute(array($user_id, $story_id));
        $stmt2 = $db->prepare('SELECT * FROM LikesStories WHERE user_id = ? AND story_id=?');
        $stmt2->execute(array($user_id, $story_id));
        if(empty($stmt->fetch()) && empty($stmt2->fetch())) {
            $stmt = $db->prepare('INSERT INTO DislikesStories (user_id, story_id) VALUES (?, ?)');
            $stmt->execute(array($user_id, $story_id));
        }

        $stmt = $db->prepare('SELECT * FROM DislikesStories WHERE story_id=?');
        $stmt->execute(array($story_id));
        return $stmt->fetchAll();
    }

    function does_user_like_story($user_id, $story_id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM LikesStories WHERE user_id = ? AND story_id=?');
        $stmt->execute(array($user_id, $story_id));

        $stmt2 = $db->prepare('SELECT * FROM DislikesStories WHERE user_id = ? AND story_id=?');
        $stmt2->execute(array($user_id, $story_id));

        $st1 = $stmt->fetch();
        $st2 = $stmt2->fetch();

        if(empty($st1) && empty($st2)) {
            return 0;
        }

        if(empty($st2)) {
            return 1;
        }

        if(empty($st1)) {
            return 2;
        }

        return 3;
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
        $stmt = $db->prepare('SELECT * FROM DislikesStories WHERE story_id = :id');
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

    function add_like_to_comment($user_id, $comment_id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM LikesComments WHERE user_id = ? AND comment_id=?');
        $stmt->execute(array($user_id, $comment_id));
        $stmt2 = $db->prepare('SELECT * FROM DislikesComments WHERE user_id = ? AND comment_id=?');
        $stmt2->execute(array($user_id, $comment_id));
        if(empty($stmt->fetch()) && empty($stmt2->fetch())) {
            $stmt = $db->prepare('INSERT INTO LikesComments (user_id, comment_id) VALUES (?, ?)');
            $stmt->execute(array($user_id, $comment_id));
        }

        $stmt = $db->prepare('SELECT * FROM LikesComments WHERE comment_id=?');
        $stmt->execute(array($comment_id));
        return $stmt->fetchAll();
    }

    function add_dislike_to_comment($user_id, $comment_id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM DisLikesComments WHERE user_id = ? AND comment_id=?');
        $stmt->execute(array($user_id, $comment_id));
        $stmt2 = $db->prepare('SELECT * FROM LikesComments WHERE user_id = ? AND comment_id=?');
        $stmt2->execute(array($user_id, $comment_id));
        if(empty($stmt->fetch()) && empty($stmt2->fetch())) {
            $stmt = $db->prepare('INSERT INTO DisLikesComments (user_id, comment_id) VALUES (?, ?)');
            $stmt->execute(array($user_id, $comment_id));
        }

        $stmt = $db->prepare('SELECT * FROM DisLikesComments WHERE comment_id=?');
        $stmt->execute(array($comment_id));
        return $stmt->fetchAll();
    }

    function does_user_like_comment($user_id, $comment_id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM LikesComments WHERE user_id = ? AND comment_id=?');
        $stmt->execute(array($user_id, $comment_id));

        $stmt2 = $db->prepare('SELECT * FROM DisLikesComments WHERE user_id = ? AND comment_id=?');
        $stmt2->execute(array($user_id, $comment_id));

        $st1 = $stmt->fetch();
        $st2 = $stmt2->fetch();

        if(empty($st1) && empty($st2)) {
            return 0;
        }

        if(empty($st2)) {
            return 1;
        }

        if(empty($st1)) {
            return 2;
        }

        return 3;
    }
?>