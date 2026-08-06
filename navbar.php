<link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
<?php 
session_name('MY_GAME_SESSION'); 
session_start();

if($_SESSION["loggedIn"]=="YES"){

}else{
    // echo "You are a scammer.";
    header("location:index.php");
    exit;
}

?>
<style>
        body {
        margin: 0;
        padding: 0;
    }
    header{
       height:10px;
        
        
        width: 100%;
    }
.navbar a{
    font-size: 20px;
    color: rgb(255, 253, 224);
    -webkit-text-stroke: 1px rgb(82, 50, 13);
}
.navcontainer {
  display: flex;
  justify-content: center;
  align-items: center;     
  gap: 15px;               
}
.navbar{
    position: sticky; 
    top: 0;
    left:0;
    z-index: 1000;
    border: 1px solid rgb(164, 15, 184);
    background-color: rgb(11, 19, 105);
    padding: 2px;
    width: 100%;
    margin: 0px;
    border-radius: 10px;
}



ul{
      list-style-type:none;
            margin:0px;
            padding:0;
            overflow:hidden;
            background-color:#B9A5E2;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            border-radius: 5px;
            display: flex;             
  justify-content: center;    
  align-items: center; 
            
            
}
li{
  
}

li a{
    display:block;
            color:rgb(246, 249, 151);
            padding:14px 26px;
            text-decoration:none;
            font-size:20px;
            margin-top:13px;
            
}

   li a:hover{
            background-color: #a898ce;
        }

</style>
<header>
    <div class="navcontainer">
    <nav class = "navbar">
        <ul> 
            <li><a href ="#">Hello, <?php echo $_SESSION["userName"];?>!</a></li>
            <li><a href = "Home.php"> Home </a></li>
            <li><a href = "kejmain.php"> Resume </a></li>
            <li><a href = "yourteam.php">Your Kejmin </a></li>
            <li><a href = "chooseyourkejmin"> Change Your Kejmin </a></li>
            <li><a href = "kejmindex.php">Kejmin Dex</a></li>
            <li><a href = "map.php"> Map </a></li>
            <li><a href = "tutorial.php"> Tutorial </a></li>
            <li><a href = "processes/logout.php"> Logout </a></li>
        </ul>
    </nav> 
</div> 
</header>
<br><br><br>