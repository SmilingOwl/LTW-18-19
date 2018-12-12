<?php
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    include_once('../includes/session.php');

    $taste = $_POST['taste'];

    if(duplicateTasteChoices($taste)){   
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Sorry, this topic already exists!'); 
        die(header('Location:../php/taste_choices.php'));

    }else if(!preg_match("/^[a-zA-Z]+$/",$taste)){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Topics can only contain letters!');
	    die(header('Location:../php/taste_choices.php'));
    }
    else{
        add_new_taste_choices($taste); 
        header('Location:../php/taste_choices.php');
    }
?>