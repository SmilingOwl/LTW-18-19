<?php
  include_once('../includes/database.php');

  function insertUser($username, $password) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Users (username, email, birthdate, photo, password, gender)  VALUES(?,?,?,?,?,?)');
    $stmt->execute(array($username, $email, $birthdate, $photo, sha1($password), $gender));
  }

 function VerifyLogin($username, $password) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Users WHERE username = ? AND password = ?');
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() !== false;
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
 ?>