<?php

include "navbar.php";

if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== "YES") {
    header("location:index.php");
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejmin</title>
    <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">

</head>

<body>
    <style>
        body { background-color: black; }
    </style>

    <canvas width = 800px height = 600px style = "background: rgb(0, 0, 0)"></canvas>
    <script src="data/collisions.js"></script>
    <script src="data/battleZonesData.js"></script>
    <script src="classes.js"></script>
    <script src="index.js"></script>

</body>
</html>