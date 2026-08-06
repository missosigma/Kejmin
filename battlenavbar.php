<?php


 require_once("dbconfig.php");

      if($_SESSION["loggedIn"]=="YES"){

      }else{
          // echo "You are a scammer.";
          header("location:index.php");
          exit;
      }

      $userId = $_SESSION['userName'];
      $_SESSION["team1"];
      $conn = new mysqli($servername, $username, $password, $database);
      if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
      }
      //Prepare sql message 
      $sql = "Select * from users where username='$userId';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      // print_r($row);
      $team1 = $row[0]['team1'];
      $team2 = $row[0]['team2'];
      $team3 = $row[0]['team3'];

      $sql = "Select * from Kejmin where kejmin_id='$team1';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      $move1 = $row[0]['move1'];
      $move2 = $row[0]['move2'];
      $move3 = $row[0]['move3'];

?>
<?PHP
include "Battle Navbar Files/attack.php"
?>
<script src="Battle Navbar Files/attackbar.js"></script>


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
            background-color: #8f6cdf;
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
    transition: width 0.3s ease;
}
.health h3{
    -webkit-text-stroke:0.5px #B9A5E2;
    font-family:Comic Sans MS;
}
</style>

<footer> 
  <nav class="bottom-right-nav"> 
    <ul> 
      <li><a onclick="history.back()">Run</a></li> 
      <!-- <li><a href="../Battle Navbar Files/capture.php">Capture</a></li>  -->
      <li><a href="Battle Navbar Files/chart.php">Element Chart</a></li> 
      <!-- <li><a href="../Battle Navbar Files/attack.php">Attack</a></li>  -->
    </ul> 
    <div class="health">
    <h3>Your Health:</h3> 
</div>
    <div class="health-container">
    <div id="player-bar" class="health-bar"></div> 
</div>
  </nav> 
</footer> 
<script src="Battle Navbar Files/attackbar.js"></script>
<script src="healthbar.js"></script>
<?PHP
include "Battle Navbar Files/attack.php"
?>