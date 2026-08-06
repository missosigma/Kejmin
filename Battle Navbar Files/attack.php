
<!-- <?php include "../battlenavbar.php" ?> -->
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
// kejmin 1 help me ... ahhhhhhrhrhrhrh///////////////////////////////////////////////////////////////////////////////////////
// create function that only pulls the selected kejmin. // will also have to make a button to choose another kejmin / or just add a function that removes kejmin one after it dies// 
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
//
      $sql = "Select * from attack_table where attack_id='$move1';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      $attackname11 = $row[0]['attack_name'];
//
    $sql = "Select * from attack_table where attack_id='$move2';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      $attackname12 = $row[0]['attack_name'];
//
    $sql = "Select * from attack_table where attack_id='$move3';";
      //send ts sql message
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows>0){
      $row = $result->fetch_all(MYSQLI_ASSOC);}
      $attackname13 = $row[0]['attack_name'];
///////////////////////////////this is where kejmin 2 on users team vvvvvv /// 




//////////////////////////////////////////this is where kejmin 3 vvv on users team ///



?>



<script>
function move1 {
  document.getElementById("hi").innerHTML = "Hello World";
  console.log("Yo")
}

function move2 {
  document.getElementById("hi").innerHTML = "Hello";
  console.log("Yo2")
}

function move3 {
  document.getElementById("hi").innerHTML = "World";
  console.log("Yo3")
}

</script>


<!DOCTYPE html>
<html>
<head>
  <style>
    .bottom-right-nava {
      position: fixed;
      bottom: 140px;
      right: 5px;
      display: flex !important;
      flex-direction: row !important;
      flex-wrap: nowrap !important;
      gap: 10px;
      border: 2px solid black;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #B9A5E2;
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }
    .bottom-right-nava button {
      white-space: nowrap !important;
      width: auto !important;
      margin: 0 !important;
    }
    button {
      background-color: #B9A5E2;
      color: white;
      font-family: Impact;
      -webkit-text-stroke: 0.5px black;
      font-size: 16px;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    .bottom-right-nava button:hover {
      background-color: #8265c6;
    }
    .hidden {
  display: none !important;
}
  </style>
</head>
<body>

   
  <nav id="movebar" class="bottom-right-nava">
    <ul>
       <p id = "hi"></p>
      <li><button onclick="move1()" class="move" data-id="1"> <?php echo $attackname11; ?> </button></li>
      <li><button onclick="move2()" class="move" data-id="2"> <?php echo $attackname12; ?> </button></li>
      <li><button onclick="move3()" class="move" data-id="3"> <?php echo $attackname13; ?> </button></li>
    </ul>
  </nav>
  <script src="attackbar.js"></script>
</body>
</html>


