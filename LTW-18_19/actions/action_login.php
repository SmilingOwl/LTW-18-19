<?php
  include_once('../includes/database.php');
  include_once('../includes/session.php');
  include_once('../database/database_user.php');
  
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  if(($userID = verifyLogin($username, $password)) != -1) {
    setCurrentUser($userID, $username);
    header("Location:../php/homepage.php");}

  else {
    header("Location:../php/first_page.php");
  }
?>