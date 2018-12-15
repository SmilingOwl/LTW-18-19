<?php
  include_once('../includes/session.php');
  include_once('../database/database_user.php');
  include_once('../database/connection.php');
  include_once('../database/access_database.php');

  // Verifies CSRF token
  if ($_SESSION['csrf'] !== $_POST['csrf']) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid Request!' );
    header('Location: ../php/homepage.php');
  }
  
  $user_id=$_POST['user_id'];
  $answer = deleteUser($user_id);

  session_destroy();
  get_all_users();

  echo json_encode($answer);
?>