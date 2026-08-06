<link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
<?php 
        include "back_button.php";
    session_name('MY_GAME_SESSION');   
    session_start();

    if($_SESSION["loggedIn"]=="YES"){

    }else{
        // echo "You are a scammer.";
        header("location:index.php");
        exit;
    }


    ?> 


<img src="K_Images/town.png" width = "100%">
<image>
<image>