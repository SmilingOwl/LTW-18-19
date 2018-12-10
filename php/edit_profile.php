<!DOCTYPE html>
<html>
    <?php 
     include_once('../includes/session.php');
     include_once('../database/connection.php');
     include_once('../database/access_database.php');
     include_once('../templates/common/header.php');?>
    <body id="edit_profile">
 		<header>
        <?php 
        include_once('../templates/common/upper_header.php'); 
        $user_id = $_SESSION['user_id'];
        $user = get_user($user_id); 
        ?> 
        <script src="../scripts/show_menu.js" defer></script>    
    	
        <h1>Edit Profile</h1>
        
        <?php if (isset($_SESSION['messages'])) {?>
            <section id="messages">
            <?php foreach($_SESSION['messages'] as $message) { ?>
                <div class="<?=$message['type']?>"><?=$message['content']?></div>
            <?php } ?>
            </section>
        <?php unset($_SESSION['messages']); } ?>
           
 		</header>

        <h1>Personal Information</h1>
        <div id="account">
               <h5>Username: <?php echo htmlentities($_SESSION['username']) ?></h5>

            <form action="../actions/update_user.php" method="post" class="register_form">
                        
                <label>Email:
                    <input name="email"  type="email" placeholder="Email" value="<?php echo htmlentities($user['email']) ?>" required="required">
                </label>
                
                <label>Current Password:
				    <input name="currpassword" type="currpassword" placeholder="password" required="required">
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
                

        <div id="photo_field">
            <form action="../actions/action_upload_photo.php" method="post" enctype="multipart/form-data">
                <label>Photo</label>
                <img id="photo" src="<?php echo  htmlentities('../pictures/profile/'.$_SESSION['user_id']['photo']) ?>" alt="Profile photp">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" name="Submit" value="Upload">
            </form>   
        </div>

         <?php include_once('../templates/common/footer.php'); ?>
        </body>
