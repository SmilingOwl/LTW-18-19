<?php 
    include_once('../includes/session.php');
    if(isset($_SESSION['user_id']))
        $user_id = $_SESSION['user_id'];

    include_once('../templates/common/header.php');
    include_once('../templates/about/before_upper_header.php');
    include_once('../templates/common/upper_header.php');
    include_once('../templates/about/about_text.php');
    include_once('../templates/common/footer.php'); 
?>
