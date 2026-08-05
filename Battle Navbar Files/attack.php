What we want!! !! 
- The attacks displayed here!!! 
^^^ To do this we must go into the code of the kejmin equipped currently and get the attacks from the database.
- When they click on an attack;;; they go to an updated encounter page with the attack possibly announced // 
and the opponent's health lowers.

- (xtra - any effects)
<?php include "../battlenavbar.php" ?>
<html>
    <div class ="bar">
<nav class = "bottom-right-nava">
<ul>
<li> Move 1: </li>
<li> Move 2: </li>
<li> Move 3: </li>
</ul>
</nav>
</div>
</html>
<style>
 
    .bottom-right-nava{
    position:fixed;
    bottom:100px;
    right:100px;
    z-index:1000;
    border: 1px solid black;
    background-color: black;
    padding: 2px;
  
} 

ul{
      list-style-type:none;
            margin:0;
            padding:0;
            overflow:hidden;
            background-color:#B9A5E2;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;                
}

.bottom-right-nava li{
    display:block;
            color:white;
            padding:14px 26px;
            text-decoration:none;
            font-size:20px;
            margin-top:13px;
            -webkit-text-stroke:1px black;
            
}

  .bottom-right-nava li:hover{
            background-color: #a898ce;
        }
  </style>