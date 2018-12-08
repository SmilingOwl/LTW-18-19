<?php
  include_once('../includes/database.php');

  function insertUser($username, $password, $email, $birthdate) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Users (username, email, birthdate, password) VALUES(?,?,?,?)');
    $stmt->execute(array($username, $email, $birthdate, $password));
    $stmt = $db->prepare('SELECT user_id FROM Users WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetch()['user_id'];
  }

  function verifyLogin($username, $password) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Users WHERE username = ? AND password = ?');
    $stmt->execute(array($username, $password));
    if($stmt->fetch() !== false)
      return getID($username);
    else return -1;
  }

  function getID($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT user_id FROM Users WHERE username = :username');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $var=$stmt->fetch();
    if($var !== false)
      return $var['user_id'];
    return -1;
  }

  function deleteUser($userID) {
     $db = Database::instance()->db();
    try {
      $stmt = $db->prepare('DELETE FROM LikesStories WHERE user_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('DELETE FROM DislikesStories WHERE user_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('DELETE FROM TasteChoiceUser WHERE user_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('DELETE FROM SavedStory WHERE user_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('DELETE FROM LikesComments WHERE user_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('DELETE FROM DislikesComments WHERE user_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('SELECT story_id FROM Story WHERE writer_id = ?');
      $stmt->execute(array($userID));
      $ids=$stmt->fetchAll();
      foreach($ids as $id) {
        $stmt = $db->prepare('DELETE FROM Comment WHERE story_id = ?');
        $stmt->execute(array($id['story_id']));
        $stmt = $db->prepare('DELETE FROM LikesStories WHERE story_id = ?');
        $stmt->execute(array($id['story_id']));
        $stmt = $db->prepare('DELETE FROM DislikesStories WHERE story_id = ?');
        $stmt->execute(array($id['story_id']));
        $stmt = $db->prepare('DELETE FROM SavedStory WHERE story_id = ?');
        $stmt->execute(array($id['story_id']));
      }
      $stmt = $db->prepare('DELETE FROM Story WHERE writer_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('DELETE FROM Comment WHERE user_id = ?');
      $stmt->execute(array($userID));
      $stmt = $db->prepare('DELETE FROM Users WHERE user_id = ?');
      $stmt->execute(array($userID));
      return true;
    }
    catch(PDOException $e) {
      return false;
    }
  }

  function duplicateUsername($username) {
    $db = Database::instance()->db();
    try {
      $stmt = $db->prepare('SELECT user_id FROM Users WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch()  !== false;
    
    }catch(PDOException $e) {
      return true;
    }
  }
  function duplicateEmail($email) {
    $db = Database::instance()->db();
    try {
      $stmt = $db->prepare('SELECT user_id FROM Users WHERE email = ?');
      $stmt->execute(array($email));
      return $stmt->fetch()  !== false;
    
    }catch(PDOException $e) {
      return true;
    }
  }

  
  function updateUserPhoto($userID, $photoName) {
    $db = Database::instance()->db();
    try {
      $stmt = $db->prepare('UPDATE Users SET photo = ? WHERE user_id = ?');
      if($stmt->execute(array($photoName, $userID)))
          return true;
      else
          return false;
    }catch(PDOException $e) {
      return false;
    }
  } 
  
  function getUserPhoto($userID) {
    $db = Database::instance()->db();
    try {
      $stmt = $db->prepare('SELECT photo FROM Users WHERE user_id = ?');
      $stmt->execute(array($userID));
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
  }
 ?>