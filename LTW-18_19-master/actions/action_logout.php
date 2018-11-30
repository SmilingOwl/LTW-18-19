<?php
  include_once('../includes/session.php');
  
  session_destroy();
  header('Location: ../pages/first_page.php');

?>