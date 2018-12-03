<?php include_once('../includes/session.php'); 

?>

<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<link href="../css/style.css" rel="stylesheet">
	</head>

	<body id=first_page>
		<header>
			<h1>Eunoia</h1>
			<h2> Share your stories </h2>
			<img src="logo.png" alt="logo">
		</header>

	<div class="register_container">
		<h1> Login </h1>
		<form action="../actions/action_login.php" method="post" class="register_form">
			<label>Username:
				<input type="text" name="Username" placeholder="Username" required="required">
			</label>
			
			<label>Password:
				<input type="password" name="Password" placeholder="Password" required="required">
			</label>
			
			<input type="submit" name="Submit" value="Enter">
		</form>

	</div>
	<div id="final">
      <p>Don't have an account? <a href="sign_up_page.php">Signup!</a></p>
    </div>

    <?php include_once('../templates/common/footer.php'); ?>