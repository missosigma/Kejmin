<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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
</head>
<body>
    <div class = "buttoncontainer">
    <a class = "button" href = "kejmincard.php?id=6">Aerk</a><br>
    <a class = "button" href = "kejmincard.php?id=7">Sleaf</a><br>
    <a class = "button" href = "kejmincard.php?id=8">Sweeterie</a><br>
    <a class = "button" href = "kejmincard.php?id=9">Fanzo</a><br>
    <a class = "button" href = "kejmincard.php?id=10">Getzy</a><br>
    <!-- <a class = "button" href = "kejmincard.php?id=11">Kejmin</a><br>
    <a class = "button" href = "kejmincard.php?id=12">Kejmin</a><br> -->
</div>
</body>
</html>   
<style> 
body{
    background-color:#D6B588;
}
.buttoncontainer{
    display:flex;
    flex-direction: column;
    gap:0;
    font-size: 0;
    text-align:center;
}
.buttoncontainer button{
    margin: 0px;
     padding: 12px;
     border: 1px solid black;
      margin-top: -1px;

}
    .button{
       display:inline-block;
       font-size:32px;
       justify-content: center;
       align-items:center;
        background-image:url(https://img.magnific.com/premium-photo/old-yellow-grunge-background-blank-crumpled-paper_186380-1525.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment:fixed;
        font-family:Impact;
        color:black;
        border: 1px solid black;
        -webkit-text-stroke:0.5px white;
    }
.buttoncontainer button:first-child {
  margin-top: 0;
}
    .buttoncontainer button:last-child {
  border-bottom: 2px solid #000;
}
</style>