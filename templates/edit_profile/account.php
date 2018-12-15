<div id="account">
        
    <form action="../actions/update_user.php" method="post">
                        
        <label>Email:  </label>
            <input name="email"  type="email" placeholder="Email" value="<?php echo htmlentities($user['email']) ?>" required="required">
    
        <label>Presentation:  </label>
        <textarea name="presentation"> Write something about you! </textarea>
                
        <label>Current Password:  </label>
		    <input name="currpassword" type="password" placeholder="password">


        <label> New Password:</label>
            <input name="password" type="password" placeholder="password">
            <span class="hint">At least 6 characters, 1 uppercase, 1 symbol and 1 number</span>
      
                    
        <label>Repeat new password:  </label>
            <input name="password" type="password"  placeholder="Repeat Password" >
            <span  id="lastOne" class="hint">Must match new password.</span>
    
        <input type="submit" name="Submit" value="Update">
    </form>
</div>