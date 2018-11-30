<?php
  session_start();

   function setCurrentUser($userID, $username) {
      $_SESSION['username'] = $username;
      $_SESSION['userID'] = $userID;
   }
?>