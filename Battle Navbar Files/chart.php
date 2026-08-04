<?php
include "../back_button.php";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejmin Element Chart</title>
</head>
<div class="heading-container">
<h1> Element Chart:</h1>
</div>
<body>
  <div class="image-container">
    <img src="../K_Images/ElementChart.png" alt="Centered Image">
  </div>  
</body>
<style>
 .heading-container {
  text-align: center;         
  width: 100%;
}
   h1 {
  display: inline-block;     
  position: relative;         
  padding-bottom: 12px;   
  color:white;
  -webkit-text-stroke: 1px  black;
  font-family:Impact;   
  text-align:center; 
  margin: 0 auto;
}

h1::after {
  content: "";                
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;                
  height: 8px;                
  background-color: white;  
  border: 2px solid black;  
  border-radius: 4px;         
}
.image-container{
    display:flex;
    justify-content: center;
    align-items:center;
    min-height:100vh;
    width:100%;
    box-sizing:border-box;
}
img{
    max-width:90%;
    max-height:90vh;
    object-fit:contain;
}
    body{
        background-color:#B9A5E2;
    }
</style>
</html>
