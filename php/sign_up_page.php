<?php  include_once('../database/database_user.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<title>...</title>
		<meta charset="utf-8">
		<link href="../css/style.css" rel="stylesheet">
	</head>

	<body id="first_page">
 		<header>
 			<h3>Welcome! <br> Thanks for joining us!</h3>
 		</header>
		<div class="register_container_sign_up">
			<h1>Sign Up </h1>
			
			<form action="../actions/action_signup.php" method="post">
			
			<label>Name:
				<input type="text" name="name" placeholder="Name" required="required">
			</label>
			

			<label>Username:
				<input type="text" name="username" placeholder="Username" required="required">
			</label>
			

			<label>email:
				<input type="email" name="email" placeholder="Email" required="required">
			</label>
			

			<label>birthdate:
				<input type="date" name="birthdate" placeholder="birthdate" required="required">
			</label>
			

			<label>password:
				<input type="password" name="password" placeholder="Password">
				 <span class="hint">at least 6 characters.</span>
			</label>
			

			<label>repeat password:
				<input type="password" name="passwordAgain" placeholder="Repeat Password">
				 <span class="hint">Must match new password.</span>
			</label>
			

			<input name="Submit"  type="submit" value="Next">

	        </div>

	<div id="final">

      <p>Already have an account? <a href="first_page.php">Login!</a></p>
    
    </div>

	 <?php include_once('../templates/common/footer.php'); ?>