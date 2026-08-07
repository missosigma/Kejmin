<!DOCTYPE html>
<html lang="en">
<head>
  <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial</title>
  <style>
    .t_text {
      background-color: #B9A5E2;
      padding: 30px;
      border: 1px solid black;
      border-radius: 20px;
      font-size: 150%;
      font-family: monospace;
      -webkit-text-stroke:0.2px white;
    }
    .bigger_text {
      font-size: 170%;
      font-family:Impact;
      -webkit-text-stroke:0.5px white;
    }
    .controls-wrapper {
  display: flex;
  flex-direction: column;
  align-items: flex-start; 
  text-align: left;
}
    .upcontainer{
      display:inline-flex;
      align-items:center;
      gap:10px;
    }
    .uparrow{
      width:20px;
      height:auto;
    }
    .leftcontainer{
      display:inline-flex;
      align-items:center;
      gap:10px;
    }
   .leftarrow{
    width:20px;
    height:auto;
   }
   .downcontainer{
    display:inline-flex;
      align-items:center;
      gap:10px;
   }
   .downarrow{
    width:10px;
    height:auto;
   }
   .rightcontainer{
     display:inline-flex;
      align-items:center;
      gap:10px;
   }
    .rightarrow{
        width:20px;
    height:auto;
    }
  </style>
</head>
<body bgcolor = #a898ce>
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
  <div class = "t_text">
  <text> <div class ="bigger_text">Welcome to Kejmin!</div><br>
   <div class="controlswrapper">
  <div class ="upcontainer">
          W / Up Arrow Key = Up
    <img src="K_Images/Uparrow.png" class ="uparrow">
</div><br>
<div class ="leftcontainer">
    A / Left Arrow Key = Left 
    <img src="K_Images/Leftarrow.png" class = "leftarrow">
</div><br>
<div class = "downcontainer">
    S / Down Arrow Key = Down 
    <img src="K_Images/Downarrow.png" class = "downarrow">
</div><br>
<div class = "rightcontainer">
    D / Right Arrow Key = Right 
    <img src ="K_Images/Rightarrow.png" class = "rightarrow">
</div>
</div>
<br><br>
      Press Z or Enter to interact with others.<br><br>
    Click the buttons on your screen to access different menus. <br> <br>

    A chart of the different Types and their effectiveness! <Br> <br>
    <img src = "K_Images/ElementChart.png" width = 500px height = 500px> <br> <br>
    This is also available when you are in battle. <br> <br>

    You can always come back to the tutorial by clicking the "Tutorial" button! 
  </text> 
  </div> 
</body>
</html>


<!-- You gotta make like it closeable and be able to be put on the front page.. --> 
 <!-- or not // depends on time ^^ this is a quality of life thing -->
