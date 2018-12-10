<?php include_once('../includes/session.php'); 
	include_once('../templates/common/header.php');
?>

	<body id=first_page>
		<header>
		  <img src="../icons/owl.png" alt="logo" height="85" width="90">
			<h1>Eunoia </h1>
			<h2> Share your stories </h2>
			
		</header>

	<div class="register_container">
		<h1> Login </h1>
		<?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
          <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>"><?=$message['content']?></div>
          <?php } ?>
        </section>
 	<?php unset($_SESSION['messages']); } ?>
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