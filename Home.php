<?php

        include "navbar.php";
 


if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== "YES"){
    header("location:index.php");
    exit;
}

$team1 = intval($_SESSION["team1"] ?? 0);
$team2 = intval($_SESSION["team2"] ?? 0);
$team3 = intval($_SESSION["team3"] ?? 0);
if ($team1 === 0 || $team2 === 0 || $team3 === 0) {
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
    <text>Links vvvvv</text></br></br>
    <a class = "button" href = "navbar.php"> Navbar (testing current)</a> </Br></br>
    <a class = "button" href = "KejMain.php"> Testing Game </a> </Br></br>
    <a class = "button" href = "chooseyourkejmin.php"> Possible Change Team </a> <br><br>
    <a></a>
    
</body>
</html>
