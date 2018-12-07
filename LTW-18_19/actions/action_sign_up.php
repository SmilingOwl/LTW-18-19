<?php
  include_once('../includes/session.php');
  include_once('../database/database_user.php');
  
if(duplicateUsername($_POST['username'])){
		header('Location: ../php/sign_up_page.php');

	}
	else if(duplicateEmail($_POST['email'])){
		header('Location: ../php/sign_up_page.php');
	}

 	else if (($userID = insertUser($_POST['username'], $_POST['email'], $_POST['birthdate'], $_POST['photo'], $_POST['password'] , $_POST['gender'] )) != -1) {
 		setCurrentUser($userID, $_POST['username']);
 		header("Location:../php/homepage.php");
 	}
 	else{
  		header('Location: ../php/sign_up_page.php');
 	}

?>