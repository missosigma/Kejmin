<style>
.bottom-right-nav{
    position:fixed;
    bottom:20px;
    right:20px;
    z-index:1000;
    border: 1px solid black;
    background-color: black;
    padding: 2px;
  
} 

.bottom-right-nav a{
    font-size: 20px;
    color: white;
    -webkit-text-stroke: 1px black;
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

</style>
<footer>
    <nav class = "bottom-right-nav">
    <ul>
        <li><a onclick="history.back()">Run</a></li>
        <!-- Not just back to main page// back to where they went // lol -->
        <li><a href="Battle Navbar Files/capture.php">Capture</a></li>
        <li><a href="Battle Navbar Files/chart.php">Element Chart</a></li>
        <li class="attack"><a href="Battle Navbar Files/attack.php">Attack</a></li>
    </ul>
   </nav>
</footer>
<script src="Battle Navbar Files/attackbar.js"></script>