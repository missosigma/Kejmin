<style>
.bottom-right-nav{
    position:fixed;
    bottom:0px;
    right:20px;
    z-index:1000;
    border: 1px solid black;
    background-color: black;
    padding: 10px;
  
} 

.bottom-right-nav a{
    font-size: 20px;
    color: white;
    -webkit-text-stroke: 1px black;
}
.bottom-right-nav h3 {
  color: white;
  margin: 10px 0 5px 0; 
  font-family: sans-serif;
}


ul{
      list-style-type:none;
            margin:0;
            padding:0;
            overflow:hidden;
            background-color:#B9A5E2;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            
            
}
li{
    float: right;
}

li a{
    display:block;
            color:white;
            padding:14px 26px;
            text-decoration:none;
            font-size:20px;
            margin-top:13px;
            
}

   li a:hover{
            background-color: #a898ce;
        }
.hidden {
  display: none !important;
}
.heatlh-container{
    margin top:15px;
    clear:both;
}
.health-container h3 {
  color: white;
  margin: 0 0 5px 0;
} 

.health-bar{
    width: 100%;
  height: 10px;
  background-color: #88E788;
  margin:0;
  padding:0;
  border: 2px solid #B9A5E2;
}
h3{
    -webkit-text-stroke:0.5px #B9A5E2;
    font-family:Impact;
}
</style>
<<<<<<< HEAD
<footer>
    <nav class = "bottom-right-nav">
    <ul>
        <li><a onclick="history.back()">Run</a></li>
        <!-- Not just back to main page// back to where they went // lol -->
        <li><a href="Battle Navbar Files/chart.php">Element Chart</a></li>
        <li class="attack"><a href="Battle Navbar Files/attack.php">Attack</a></li>
    </ul>
   </nav>
</footer>
=======
<footer> 
  <nav class="bottom-right-nav"> 
    <ul> 
      <li><a onclick="history.back()">Run</a></li> 
      <li><a href="../Battle Navbar Files/capture.php">Capture</a></li> 
      <li><a href="../Battle Navbar Files/chart.php">Element Chart</a></li> 
      <li><a href="../Battle Navbar Files/attack.php">Attack</a></li> 
    </ul> 
    
    <h3>Your Health:</h3> 
    <div class="health-container">
    <div class="health-bar"></div> 
</div>
  </nav> 
</footer> 
>>>>>>> 23ad01a (Added a Health bar to battle navbar)
<script src="Battle Navbar Files/attackbar.js"></script>