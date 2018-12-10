<?php 
     include_once('../includes/session.php');
     include_once('../database/connection.php');
     include_once('../database/access_database.php');
     include_once('../templates/common/header.php');

    $user_id = $_SESSION['user_id'];
    $user = get_user($user_id); 
?>
<body id="edit_profile">
 	<header>
    <?php include_once('../templates/common/upper_header.php'); ?> 
        
        <script src="../scripts/show_menu.js" defer></script>    
    	<h3>Edit Profile</h3>
        
        <?php if (isset($_SESSION['messages'])) {?>
            <section id="messages">
            <?php foreach($_SESSION['messages'] as $message) { ?>
                <div class="<?=$message['type']?>"><?=$message['content']?></div>
            <?php } ?>
            </section>
        <?php unset($_SESSION['messages']); } ?>
           
 	</header>

    <h3>Personal Information</h3>
    <div id="account">
        <h5>Username: <?php echo htmlentities($_SESSION['username']) ?></h5>

        <form action="../actions/update_user.php" method="post" class="register_form">
                        
            <label>Email:
                <input name="email"  type="email" placeholder="Email" value="<?php echo htmlentities($user['email']) ?>" required="required">
            </label>
                
            <label>Current Password:
			    <input name="currpassword" type="password" placeholder="password" required="required">
		    </label>

            <label> New Password
                <input name="password" type="password" placeholder="password" required="required">
                <span class="hint">At least 6 characters, 1 uppercase, 1 symbol and 1 number</span>
            </label>
                    
            <label>Repeat new password:
                <input name="password" type="password"  placeholder="Repeat Password" required="required">
                <span class="hint">Must match new password.</span>
            </label>

            <input type="submit" name="Submit" value="Update">
        </form>
    </div>

<?php include_once('../templates/common/footer.php'); ?>
