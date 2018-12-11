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
    <link href="../css/edit_profile.css" rel="stylesheet">
        
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

    <div id=personal_header>
        <h3>Personal Information</h3>
     
        <section id="profile_photo">
            <img src=<?=$user['photo']?> alt="Can't load picture">
            <?php if($user_id == $_SESSION['user_id']) {?>
   
                <div id="photo_field">
                    <form action="../actions/action_upload_photo.php" method="post" enctype="multipart/form-data">
                        <label>Change profile photo: 
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </label>
                        <input type="submit" name="Submit" value="Upload">
                    </form>
                </div>
             <?php } ?>
        </section>
        
    </div>
    <div id="account">
        
        <form action="../actions/update_user.php" method="post">
                        
            <label>Email:
                <input name="email"  type="email" placeholder="Email" value="<?php echo htmlentities($user['email']) ?>" required="required">
            </label>

            <label>Presentation:  </label>
            <textarea name="presentation"> Write something about you! </textarea>
                
            <label>Current Password:
			    <input name="currpassword" type="password" placeholder="password">
		    </label>

            <label> New Password
                <input name="password" type="password" placeholder="password">
                <br>
                <span class="hint">At least 6 characters, 1 uppercase, 1 symbol and 1 number</span>
            </label>
                    
            <label>Repeat new password:
                <input name="password" type="password"  placeholder="Repeat Password" >
                <br>
                <span class="hint">Must match new password.</span>
            </label>

            <input type="submit" name="Submit" value="Update">
        </form>
    </div>

<?php include_once('../templates/common/footer.php'); ?>
