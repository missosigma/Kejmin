<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Kejmin</title>
    <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
</head>

  <body>
      <?php 
          include "back_button.php";
          
      session_name('MY_GAME_SESSION');
      session_start();
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
      // print_r($row);
      $team1Name = $row[0]['kejmin_name'];
      $cleanName = trim($team1Name);
      $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
      $image1 = str_replace(' ', '', $cleanName) . '.png';
      

      // $sql = "Select * from Kejmin where kejmin_id='$team2';";
      // //send ts sql message
      // $stmt = $conn->prepare($sql);
      // $stmt->execute();
      // $result = $stmt->get_result();
      // if($result->num_rows>0){
      // $row = $result->fetch_all(MYSQLI_ASSOC);}
      // // print_r($row);
      // $team2Name = $row[0]['kejmin_name'];
      // $cleanName = trim($team2Name);
      // $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
      // $image2 = str_replace(' ', '', $cleanName) . '.png';


      // $sql = "Select * from Kejmin where kejmin_id='$team3';";
      // //send ts sql message
      // $stmt = $conn->prepare($sql);
      // $stmt->execute();
      // $result = $stmt->get_result();
      // if($result->num_rows>0){
      // $row = $result->fetch_all(MYSQLI_ASSOC);}
      // //print_r($row);
      // $team3Name = $row[0]['kejmin_name'];
      // $cleanName = trim($team3Name);
      // $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
      // $image3 = str_replace(' ', '', $cleanName) . '.png';



      // echo $team3;
      $conn->close();
      ?>
 <div class="card-container">

  <div class="card">
    <div class="card-image-box">
      <img src="K_Images/Card_Bg.png" class="card-bg" alt="Background">
      
      <div class="kejmin-wrapper">
        <?php
          $imagePath = __DIR__ . '/K_Images/' . $image1;
          if (is_file($imagePath)) {
              echo "<img src='K_Images/{$image1}' class='kejmin-img' alt='{$team1Name}'>";
          } else {
              echo "<img src='K_Images/Card_Bg.png' class='kejmin-img' alt='Fallback'>";
          } 
        ?> 
      </div>
    </div>

    <h3 class = "name"><?php echo $team1Name; ?></h3>
    <!-- <h4 class = "health"> Health: </h4> -->
  </div>

  <!-- <div class="card">
    <div class="card-image-box">
      <img src="K_Images/Card_Bg.png" class="card-bg" alt="Background">
      <div class="kejmin-wrapper">
        <?php
          $imagePath = __DIR__ . '/K_Images/' . $image2;
          if (is_file($imagePath)) {
              echo "<img src='K_Images/{$image2}' class='kejmin-img' alt='{$team2Name}'>";
          } else {
              echo "<img src='K_Images/Card_Bg.png' class='kejminr-img' alt='Fallback'>";
          } 
        ?> 
      </div>
    </div>

    <h3><?php echo $team2Name; ?></h3>
    <h4> Health: </h4>
  </div>

  <div class="card">
    <div class="card-image-box">
      <img src="K_Images/Card_Bg.png" class="card-bg" alt="Background">
      <div class="kejmin-wrapper">
        <?php
          $imagePath = __DIR__ . '/K_Images/' . $image3;
          if (is_file($imagePath)) {
              echo "<img src='K_Images/{$image3}' class='kejmin-img' alt='{$team3Name}'>";
          } else {
              echo "<img src='K_Images/Card_Bg.png' class='kejmin-img' alt='Fallback'>";
          } 
        ?> 
      </div>
    </div>

    <h3><?php echo $team3Name; ?></h3>
    <h4> Health: </h4>
  </div> -->

</div>
                                                  <style>
                                             *, *::before, *::after {
                                                              box-sizing: border-border-box;
                                                              margin: 0;
                                                              padding: 0;
                                                            }

                                                            body {
                                                              background-color: #B9A5E2;
                                                            }

                                                            h1 {
                                                              text-align: center;
                                                              color: white;
                                                              -webkit-text-stroke: 1px black;
                                                              font-family: Impact, sans-serif;
                                                              margin-top: 20px;
                                                            }

                                                        
                                                            .card-container {
                                                              display: flex;
                                                              justify-content: center;
                                                              gap: 40px;    
                                                              width: 100%;
                                                              max-width: 1060px;
                                                              margin: 20px auto;     
                                                            }

                                                          
                                                            .card {
                                                              position: relative;
                                                              width: 400px;
                                                              height: 400px;
                                                              background-color: white;
                                                              border: 2px solid black;
                                                              border-radius: 10px;
                                                              padding: 10px;
                                                              text-align: center;
                                                              box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                                                              overflow: hidden;
                                                              display: flex;
                                                              flex-direction: column;
                                                              align-items: center;
                                                            }

                                                           
                                                            .card-image-box {
                                                              position: relative;
                                                              width: 100%;
                                                              height: 260px; 
                                                              border-radius: 8px;
                                                              border: 2px solid black;
                                                              overflow: hidden;
                                                              margin-bottom: 15px;
                                                            }

                                                        
                                                            .card-bg {
                                                              position: absolute;
                                                              top: 0;
                                                              left: 0;
                                                              width: 100%;
                                                              height: 100%;
                                                              object-fit: cover; 
                                                              z-index: 1;
                                                            }

                                                         
                                                          
                                                                  .kejmin-wrapper {
                                                                    position: absolute;
                                                                    top: -130px;
                                                                    left: -100px;
                                                                    width: 150%;
                                                                    height: 150%;
                                                                    z-index: 2; 
                                                                    display: flex;
                                                                    justify-content: center;
                                                                    align-items: flex-end; 
                                                                  }


                                                                  .kejmin-img {
                                                                    width: 100%;        
                                                                    max-height: 70%;     
                                                                    object-fit: contain;
                                                                    margin-bottom: 0px;  
                                                                    filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.4));
                                                                  }

                                                            h3 {
                                                              font-family: Impact, sans-serif;
                                                              -webkit-text-stroke: 0.5px #B9A5E2;
                                                              font-size: 22px;
                                                              margin-bottom: 5px;
                                                            }

                                                            h4 {
                                                              font-family: monospace;
                                                              -webkit-text-stroke: 0.5px #B9A5E2;
                                                              font-size: 16px;
                                                            }
                                                            .name {
                                                              font-size: 70px;
                                                            }
                                                            .health {
                                                              font-size: 40px;
                                                            }

                                                      </style>
  </body>
</html>
