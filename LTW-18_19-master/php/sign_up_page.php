<?php  include_once('../database/database_user.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<title>...</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet">
	</head>

	<body>

		<div id="register_container">
        <div class="register_header">
            <a href="first_page.php" class="register_button">Login</a>
            <p>Welcome!
                <br>Thanks for joining us!</p>
        </div>

		<div class="register_content signup">
			<h1>Sign Up </h1>
			<form action="../actions/action_signup.php" method="post">
			
			<label>Name:
				<input type="text" name="name" placeholder="Name" required="required">
			</label>
			<p>

			<label>Username:
				<input type="text" name="username" placeholder="Username" required="required">
			</label>
			<p>

			<label>email:
				<input type="email" name="email" placeholder="Email" required="required">
			</label>
			<p>

			<label>birthdate:
				<input type="date" name="birthdate" placeholder="birthdate" required="required">
			</label>
			<p>

			<label>password:
				<input type="password" name="password" placeholder="Password">
				 <span class="hint">at least 6 characters.</span>
			</label>
			<p>

			<label>repeat password:
				<input type="password" name="passwordAgain" placeholder="Repeat Password">
				 <span class="hint">Must match new password.</span>
			</label>
			<p>

			<input name="Submit"  type="submit" value="Next">

	        </div>

	         <footer>
      <p>Already have an account? <a href="login.php">Login!</a></p>
    
    </footer>
    </body>

</html>