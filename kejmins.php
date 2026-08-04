<link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
<?php 
        include "back_button.php";
        
    session_start();

    if($_SESSION["loggedIn"]=="YES"){

    }else{
        // echo "You are a scammer.";
        header("location:index.php");
        exit;
    }


    ?> 
Kejmin Dex
