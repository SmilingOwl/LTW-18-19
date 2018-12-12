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