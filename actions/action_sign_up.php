<?php
  include_once('../includes/database.php');
  include_once('../includes/session.php');
  include_once('../database/database_user.php');

if ( !preg_match ("/^[a-zA-Z0-9]+$/",$_POST['username'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
	die(header('Location:../php/sign_up_page.php'));

}else if(duplicateUsername($_POST['username'])){
	$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Sorry, this username already exists!');
	header('Location:../php/sign_up_page.php');
	
	}else if(duplicateEmail($_POST['email'])){
		$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Sorry, this email already exists!');
		header('Location:../php/sign_up_page.php');

	}/* 6 characters, at least 1 uppercase letter, 1 lowercase letter and 1 number*/
	else if(!(preg_match ("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/",$_POST['password']))){
		$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Sorry, password must contain at least 
		6 characters, 1 uppercase letter, 1 lowercase letter and 1 number!');
		header('Location:../php/sign_up_page.php');
	
	}else if (($userID = insertUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['birthdate'])) != -1) {
 		setCurrentUser($userID, $_POST['username']);
 		header("Location:../php/taste_choices.php");

	}else{
  		header('Location:../php/sign_up_page.php');
 	}

?>