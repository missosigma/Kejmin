<link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
<?php
        include "navbar.php";
 
if($_SESSION["loggedIn"]=="YES"){

}else{
    // echo "You are a scammer.";
    header("location:index.php");
    exit;
}

?>
resume game / game overall