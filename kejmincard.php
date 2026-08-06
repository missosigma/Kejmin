<?php
require_once("dbconfig.php");
include "back_button.php";

$id = $_GET["id"];
  $conn = new mysqli($servername, $username, $password, $database);
  if($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);}
    
  //send sql statement 
  $sql ="SELECT * FROM Kejmin where kejmin_id={$id};";
  $stmt = $conn->prepare($sql);
  $stmt-> execute();
  $result = $stmt->get_result();
echo "<div class = 'w3-bar w3-white w3-padding w3-animate-opacity'>";

    $rows = $result->fetch_all(MYSQLI_ASSOC);
         for($i=0;$i<count($rows);$i++){
            $name = $rows[$i]["kejmin_name"];
            $id = $rows[$i]["kejmin_id"];
            $desc = $rows[$i]["kejdesc"];
            // sanitize and normalize image filename (remove special chars/spaces)
            $cleanName = trim($name);
            $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
            $image = str_replace(' ', '', $cleanName) . '.png';
        }
  echo "<br>";
echo "</div>";
$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejmin Card</title>
    <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
</head>
<body>
    <div class = "gallery">
    <div class = "card">
 <!-- Place Holder Image -->
<div class="image-container">
<img src= "K_Images/Card_Bg.png" class="background">
 <div class ="kejmin">
 <?php
    $imagePath = __DIR__ . '/K_Images/' . $image;
    if (is_file($imagePath)) {
        echo "<img src='K_Images/{$image}'> ";
    } else {
        // fallback placeholder if image missing
        echo "<img src='K_Images/Card_Bg.png' alt='placeholder'> ";
    }
?>
    </div>
</div>
<h3> <?php echo $name; ?> </h3>
<hr> 
<h4> Description </h4> 
<br> 
<p> <?php echo $desc; ?> </p>
</div>
</div>
    <style>
        body{
            /* Path to the image */
            background-image: url(https://img.magnific.com/premium-photo/old-yellow-grunge-background-blank-crumpled-paper_186380-1525.jpg);
            /* Make image not repeat */
            background-repeat: no-repeat;
            /* Make the image cover the entire page */
            background-size: cover;
            /* Make the image Center */
            background-position: center center; 
            /* Make it not move when scrolling */
            background-attachment: fixed;
            /* Make the body fill the entire browser height */
            min-height: 100vh;
           
          
        }
        .gallery{
            display:flex;
            flex-wrap: wrap;
            /* Make the context in the center*/
            justify-content: center;
            gap:20px;
        }
        .card{
            /*Set the width and height of card */
               width:300px;
               height: 500px;
               /*Set background color */
               background-color:white;
               /*Make the border and set radius */
               border: 2px solid black;
               border-radius:10px;
               padding:10px;
               text-align:center;
               box-shadow: 0 2px 5px rgba(0,0,0,0.2);
               margin-top: 40px;
               overflow:hidden;
        }
        .image-container {
position: relative; 
    width: 100%; 
    height: 180px; 
    display: flex; 
    justify-content: center; 
    align-items: flex-end;   

}
.background{
    position: absolute; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
     border: 2px solid black;
    border-radius:10px;
}

.kejmin{
    position: relative; 
    z-index: 10; 
    width: 180px; 
    justify-content: center;
}
.kejmin img {
    width: 80%;
    margin-left: 30px;
    height: auto;
    display: block;
}
.card-content {
  padding: 20px;
  flex: 1; 
}
h3{
    /*Set the font */
    font-family: monospace;
    /* Add an outline to the text */
    -webkit-text-stroke: 1px #D6B588;
    /* Adjust size */
    font-size: 20px;
}
h4{
    /*Set the font */
    font-family:monospace;
    /*Add an outline to the text */
    -webkit-text-stroke: 1px #D6B588;
    /*Adjust size*/
    font-size: 14px;
}
hr{
    /*Set the font */
    font-family:monospace;
    /* Make sure the line is filled in */
    background-color: black;
    width: 100%;
    height: 1px;
}
p{
    font-family:Comic Sans MS;
    font-size:12px;
}
        </style>
</body>
</html>
<link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">