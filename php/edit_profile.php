<?php 
    include_once('../includes/session.php');
    include_once('../database/access_database.php');
    include_once('../templates/common/header.php');

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user = get_user($user_id); 
    }

    include_once('../templates/edit_profile/before_upper_header.php');
    include_once('../templates/common/upper_header.php');
    if(isset($_SESSION['user_id'])) {
        include_once('../templates/edit_profile/error_message.php');
        include_once('../templates/edit_profile/personal_header.php');
        include_once('../templates/edit_profile/account.php');
    }
    else {
        echo '<h3> Login to access page! </h3>';
    }
    include_once('../templates/common/footer.php'); 
?>
