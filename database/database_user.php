<?php
  include_once('../includes/database.php');

  function insertUser($username, $password) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Users VALUES(?,?,?,?,?,?)');
    $stmt->execute(array($username, $email, $birthdate, $photo, sha1($password), $gender));
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
    $stmt = $db->prepare('SELECT user_id FROM Users WHERE username = ?');
    $stmt->execute(array($username));
    $var=$stmt->fetch();
    if($var !== false)
      return $var['user_id'];
    return -1;
  }
 ?>