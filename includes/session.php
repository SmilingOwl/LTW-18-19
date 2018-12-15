<?php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid',0);

  session_start();
  session_regenerate_id(true);

  function setCurrentUser($userID, $username) {
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $userID;
   }

   function generate_random_token() {
      return bin2hex(openssl_random_pseudo_bytes(32));
     }
   
   if (!isset($_SESSION['csrf'])) {
      $_SESSION['csrf'] = generate_random_token();
   }
?>