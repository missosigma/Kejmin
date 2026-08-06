<?php

        include "navbar.php";
 


if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== "YES"){
    header("location:index.php");
    exit;
}

$team1 = intval($_SESSION["team1"] ?? 0);
if ($team1 === 0) {
    header("location:chooseyourkejmin.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kejmin Welcome Page</title>
  <script src = "audio.js" defer></script>
  <audio id="bg-music" src = "background.mp3" loop></audio> 
  <!-- bg music ^^^ -->
  <link rel= "icon" type = "image/x-icon" href = "K_Images/Sleaf.png">
  <!-- Icon ^^ -->
  <link rel="stylesheet" href="kejmin.css">
  <!-- Links css^^ -->
</head>
<body>
  
    <!-- ^^ add to any page to include the navbar!!  -->
    <h1>Welcome to the Kejmin starting page.</h1>
    <h2>(In development.)</h2>
    <h2>Turn your volume down we have noise!!</h2>
    <a></a>
    <p>Links</p>
    <p>|</p>
    <p>v</p>
<div class="button-group">
  <a class="button" href="navbar.php">Navbar (testing current)</a>
  <a class="button" href="KejMain.php">Testing Game</a>
  <a class="button" href="chooseyourkejmin.php">Possible Change Team</a>
  <a class = "button" href = "encounter.php"> Encounter (Testing) </a>
</div>
    
</body>
</html>

<style>
body{
    Font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    background-image:url(https://img.magnific.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902621.jpg?semt=ais_test_b&w=740&q=80);
    background-repeat:no-repeat;
     background-size: cover;
        background-position: center center;
        background-attachment:fixed;
}
h1{
    text-align:center;
    color:black;
    -webkit-text-stroke:0.5px white;
    font-family:Impact;
}
h2{
    text-align:center;
    -webkit-text-stroke:0.5px white;
    font-family:Comic Sans MS;
}
p{
        text-align:center;
    -webkit-text-stroke:0.2px white;
    font-family:monospace;
    font-size:20px;
    font-weight:bold;
}


    </style>
