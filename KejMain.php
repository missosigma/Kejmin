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

    <canvas width = 800px height = 600px style = "background: white"></canvas>
    <script src="index.js"></script>
    <script src="KejMain.js"></script>
</body>
</html>