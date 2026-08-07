
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


<!DOCTYPE html>
<html>
<head> 
  <style> 
.bottom-right-nava { 
  position: fixed !important; 
  bottom: 140px !important; 
  right: 0 !important; 
  display: flex !important; 
  flex-direction: row !important; 
  flex-wrap: nowrap !important; 
  gap: 0px; 
  border: 2px solid black; 
  border-bottom: none; 
  border-right: none; 
  z-index: 999999 !important; 
  background-color: #B9A5E2; 
  margin: 0 !important; 
  padding: 0 !important; 
} 

.bottom-right-nava ul { 
  display: flex; 
  flex-direction: row; 
  list-style: none !important; 
  list-style-type: none !important; 
  margin: 0 !important; 
  padding: 0 !important; 
  overflow: hidden; 
  background-color: #B9A5E2; 
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; 
} 

.bottom-right-nava li { 
  margin: 0 !important; 
  padding: 0 !important; 
  list-style: none !important; 
} 

button { 
  background-color: #B9A5E2; 
  color: white; 
  font-family: Impact, sans-serif; 
  -webkit-text-stroke: 0.5px black; 
  font-size: 18px; 
  padding: 16px 24px; 
  margin: 0 !important;
  border: none; 
  cursor: pointer; 
  white-space: nowrap !important; 
  width: auto !important; 
  position: relative; 
  z-index: 1000000; 
  border-left: 1px solid rgba(0, 0, 0, 0.2); 
} 

button:hover { 
  background-color: #8265c6 !important; 
}
</style>
</head>
<body>

   
  <nav id="movebar" class="bottom-right-nava">
    <ul id = "moveSelect">
       
      <li><button  class="move" data-id="1"> <?php echo $attackname11; ?> </button></li>
      <li><button class="move" data-id="2"> <?php echo $attackname12; ?> </button></li>
      <li><button class="move" data-id="3"> <?php echo $attackname13; ?> </button></li>
    </ul>
  </nav>
  </body>
  </html>
  <script src="healthtoencounter.js" defer></script>
  <script src="encounter.js" defer></script>





