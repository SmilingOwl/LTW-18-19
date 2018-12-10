<?php
  include_once('../includes/session.php');
  include_once("../database/database_user.php");

    $username=$_SESSION['username'];
    $userID=$_SESSION['user_id'];  
    $email = $_POST['email'];
    $current_password = $_POST['currpassword'];
    $new_password = $_POST['password'];


    if( (verifyLogin($username, $current_password) )!= -1){
        if($email != "") {

            if(updateUserEmail($userID, $email)){
                
                if($new_password != null){
                   
                    if(!updateUserPassword($userID, $new_password))
                    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Error on updating password!');                          
                }

            } else $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Error on updating data base');     

        } else $_SESSION['messages'][] = array('type' => 'error', 'content' =>'Error! email and password cannot be null');
        
    } else $_SESSION['messages'][] = array('type' => 'error', 'content' =>'Error! Password is not correct');
   
header('Location:../php/homepage.php'); 