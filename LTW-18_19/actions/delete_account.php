<?php
  include_once('../includes/session.php');
  include_once('../database/database_user.php');
  include_once('../database/connection.php');
  include_once('../database/access_database.php');
  
  $user_id=$_POST['user_id'];
  deleteUser($user_id);

  session_destroy();
  $users = get_all_users();

  echo json_encode($users);
?>