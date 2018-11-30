<?php
  include_once('../includes/session.php');
  include_once('../database/database_user.php');
  

  
  if(($userID = VerifyLogin($_POST['username'], $_POST['password'])) != -1){
	setCurrentUser($userID, $_POST['username']);
	header("Location:../php/homepage.php");
} 

else {
	header('Location: ../php/first_page.php');
}

?>