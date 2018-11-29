<?php include_once('../includes/session.php'); 



?>

<!DOCTYPE html>
<html>
	<head>
    	<title>...</title>
   		<meta charset="utf-8">
    	<link href="css.css" rel="stylesheet">
	</head>

	<body>
		<div id="register_container">
        	<div class="register_header">
            <a href="sign_up_page.php" class="register_button">Sign Up</a>
            <h1>Name</h1>
        </div>

		<header>
			<h1>Stories Network Title </h1>
			<h2>Famous quote </h2>
			<img src="logo.png" alt="logo">
		</header>

	<div class="register_container">
		<h1> Log In </h1>
		<form action="save.php" method="post" class="register_form">
			<label>Username:
				<input type="text" name="Username" placeholder="Username" required="required">
			</label>
			<p>
			<label>Password:
				<input type="password" name="Password" placeholder="Password" required="required">
			</label>
			<p>
			<input type="submit" name="Submit" value="Enter">
		</form>

			<p id="error_messages" style="color: black">
                <?php if(isset($_SESSION['ERROR'])) echo htmlentities($_SESSION['ERROR']); unset($_SESSION['ERROR'])?>
        	</p>
	</div>
	</body>

</html>