<?php include_once('../includes/session.php');
    $username=$_SESSION['username'];
    ?>

    <div id="main_header">
        <span class="menu"><img src="../icons/menu_icon.png" alt="Menu" height="40" width="45"></span>
        <img src="../icons/owl.png" alt="logo" height="35" width="40">
        <h5 id="header_title"> Eunoia </h5>

        <?php if ($username != NULL) { ?>
              <h6><a href="profile.php"><?=$username?></a></h6>
              <h6><a href="../actions/action_logout.php">Logout</a></h6>
        <?php } ?>
    </div>
