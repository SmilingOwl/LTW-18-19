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
			<h1>Eunoia </h1>
			<img src="../icons/owl.png" alt="logo" height="85" width="90">
			<h2> Share your stories </h2>
			
		</header>

	<div class="register_container">
		<h1> Login </h1>
		<form action="../actions/action_login.php" method="post" class="register_form">
			<label>Username:
				<input type="text" name="username" placeholder="username" required="required">
			</label>
			
			<label>Password:
				<input type="password" name="password" placeholder="password" required="required">
			</label>
			
			<input type="submit" name="Submit" value="Enter">
		</form>

	</div>
	<div id="final">
      <p>Don't have an account? <a href="sign_up_page.php">Signup!</a></p>
    </div>

    <?php include_once('../templates/common/footer.php'); ?>