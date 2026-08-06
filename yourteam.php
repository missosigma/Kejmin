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
      

      $sql = "Select * from Kejmin where kejmin_id='$team2';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      // print_r($row);
      $team2Name = $row[0]['kejmin_name'];

      $sql = "Select * from Kejmin where kejmin_id='$team3';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      //print_r($row);
      $team3Name = $row[0]['kejmin_name'];


      // echo $team3;
      $conn->close();
      ?>
      <h1> Your Team </h1> 
  <div class="card-container">
    <div class="card">
      <div class="img-wrapper">
        <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
      </div>
      
      <h3><?php echo $team1Name; ?></h3>
      <h4> Health: </h4>
    </div>
    
    <div class="card">
      <div class="img-wrapper">
        <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
      </div>
      <h3><?php echo $team2Name; ?></h3>
      <h4> Health: </h4>
    </div>

    <div class="card">
      <div class="img-wrapper">
        <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
      </div>
      <h3><?php echo $team3Name; ?></h3>
      <h4> Health: </h4>
    </div>
  </div>
                                                  <style>
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

                                                  .card {
                                                    width: calc(70% - 20px);    
                                                    flex-basis: calc(70% - 20px); 
                                                    aspect-ratio: 1 / 1; 
                                                    background-color: white;
                                                    border-radius:10px;
                                                      padding:10px;
                                                      text-align:center;    
                                                      border: 2px solid black;  
                                                  }      
                                                  
                                                  .card img {
                                                        width:100%;
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
