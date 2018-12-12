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
			<?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
          <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>"><?=$message['content']?></div>
          <?php } ?>
        </section>
 <?php unset($_SESSION['messages']); } ?>
			<form action="../actions/action_sign_up.php" method="post">
			
				<label>Username:
					<input type="text" name="username" placeholder="Username" required="required">
				</label>
				

				<label>Email:
					<input type="email" name="email" placeholder="Email" required="required">
				</label>
				

				<label>Birthdate:
					<input type="date" name="birthdate" placeholder="birthdate" required="required">
				</label>
				

				<label>Password:
					<input type="password" name="password" placeholder="Password">
					<span class="hint">at least 6 characters.</span>
				</label>
				

				<label>Repeat password:
					<input type="password" name="passwordAgain" placeholder="Repeat Password">
					<span class="hint">Must match new password.</span>
				</label>
			

				<input name="Submit"  type="submit" value="Next">

	        </div>

	<div id="final">

      <p>Already have an account? <a href="first_page.php">Login!</a></p>
    
    </div>