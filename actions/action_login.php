<?php
  include_once('../includes/session.php');
  include_once('../database/database_user.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if (checkUserPassword($username, $password)) {
    $_SESSION['username'] = $username;
    header('Location: ../pages/login.php');
  }
?>