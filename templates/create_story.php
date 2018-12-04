<?php 
    include_once('../database/connection.php');
    include_once('../database/access_database.php');
    
    $taste_choices = get_taste_choices();
    
    echo json_encode( $taste_choices);
?>