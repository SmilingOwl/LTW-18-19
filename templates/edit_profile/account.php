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