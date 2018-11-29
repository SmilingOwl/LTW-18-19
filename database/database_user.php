<?php
  include_once('../includes/database.php');

  function insertUser($username, $password) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Users VALUES(?,?,?,?,?,?)');
    $stmt->execute(array($username, $email, $birthdate, $photo, sha1($password), $gender));
  }

 ?>