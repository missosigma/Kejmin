<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Team</title>
    <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
</head>

  <body>
      <?php 
          include "back_button.php";
          
      session_name('MY_GAME_SESSION');
      session_start();
      require_once("processes/dbconfig.php");

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
      // print_r($row);
      $team1Name = $row[0]['kejmin_name'];
      $cleanName = trim($team1Name);
      $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
      $image1 = str_replace(' ', '', $cleanName) . '.png';
      

      $sql = "Select * from Kejmin where kejmin_id='$team2';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      // print_r($row);
      $team2Name = $row[0]['kejmin_name'];
      $cleanName = trim($team2Name);
      $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
      $image2 = str_replace(' ', '', $cleanName) . '.png';


      $sql = "Select * from Kejmin where kejmin_id='$team3';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      //print_r($row);
      $team3Name = $row[0]['kejmin_name'];
      $cleanName = trim($team3Name);
      $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
      $image3 = str_replace(' ', '', $cleanName) . '.png';



      // echo $team3;
      $conn->close();
      ?>
      <h1> Your Team </h1> 
  <div class="card-container">
    <div class="card">
      <img src="K_Images/Card_Bg.png" alt="Kejmin">
      <div class="img-wrapper">
    <?php
    $imagePath = __DIR__ . '/K_Images/' . $image1;
    if (is_file($imagePath)) {
        echo "<img src='K_Images/{$image1}'> ";
    } else {
        // fallback placeholder if image missing
        echo "<img src='K_Images/Card_Bg.png' alt='Kejmin'> ";} 
    ?> 
      </div>
      
      <h3><?php echo $team1Name; ?></h3>
      <h4> Health: </h4>
    </div>
    
    <div class="card">
      <img src="K_Images/Card_Bg.png" alt="Kejmin">
      <div class="img-wrapper">
        <?php
    $imagePath = __DIR__ . '/K_Images/' . $image2;
    if (is_file($imagePath)) {
        echo "<img src='K_Images/{$image2}'> ";
    } else {
        // fallback placeholder if image missing
        echo "<img src='K_Images/Card_Bg.png' alt='Kejmin'> ";} 
    ?> 
      </div>
      <h3><?php echo $team2Name; ?></h3>
      <h4> Health: </h4>
    </div>

    <div class="card">
      <img src="K_Images/Card_Bg.png" alt="Kejmin">
      <div class="img-wrapper">
        <?php
    $imagePath = __DIR__ . '/K_Images/' . $image3;
    if (is_file($imagePath)) {
        echo "<img src='K_Images/{$image3}'> ";
    } else {
        // fallback placeholder if image missing
        echo "<img src='K_Images/Card_Bg.png' alt='Kejmin'> ";} 
    ?> 
      </div>
      <h3><?php echo $team3Name; ?></h3>
      <h4> Health: </h4>
    </div>
  </div>
                                                  <style>
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
                                                  *, *::before, *::after {
                                                    box-sizing: border-box;
                                                    margin: 0;
                                                    padding: 0;
                                                  }

                                                  h1{
                                                      text-align:center;
                                                      color: white;
                                                      -webkit-text-stroke: 1px black;
                                                      font-family:Impact;
                                                  }
                                                  body{
                                                      background-color: #B9A5E2;
                                                  }
                                                  .card-container {
                                                  display:flex;
                                                  /* flex-wrap:; */
                                                  justify-content: center;
                                                  gap:40px;    
                                                  width: 100%;
                                                    max-width: 1060px;
                                                      margin: 20px auto;     
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
                                                  .card img {
                                                        width:100%;
                                                        height: auto;
                                                        display: block;
                                                      border-radius: 8px;
                                                      border: 2px solid black;
                                                  } 
                                                  h3{
                                                      font-family:Impact;
                                                      -webkit-text-stroke: 0.5px #B9A5E2;
                                                      font-size:18px;
                                                  }
                                                  h4{
                                                      font-family: monospace;
                                                      -webkit-text-stroke: 0.5px #B9A5E2;
                                                      font-size: 14px;
                                                  }


                                                      </style>
  </body>
</html>
