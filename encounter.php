<!-- <script>
const randomNumber = Math.floor(Math.random() * 5) + 6;
console.log(randomNumber);

console.log(randomNumber, randomImage)

</script> -->
<?php


session_name('MY_GAME_SESSION');
session_start();
require_once "dbconfig.php";

if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== "YES") {
    header("location:index.php");
    exit;
}

$userId = $_SESSION['userName'] ?? null;

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$enemyTeam = '10';
$enemyImage = 'getzy.gif';
$randomNumber = random_int(6, 10);
if ($randomNumber === 6){
    $enemyImage = "Aerk.gif";
} 
if ($randomNumber === 7){
    $enemyImage = "Sleaf.gif";
} 
if ($randomNumber === 8){
    $enemyImage = "Sweeterie.gif";
} 
if ($randomNumber === 9){
    $enemyImage = "Fanzo.gif";
} 
if ($randomNumber === 10){
    $enemyImage = "Getzy.gif";
} 
?>
<script>
    const enemyKejId = <?php echo json_encode($randomNumber); ?>
</script>
<?php
$user = null;
$team1 = null;
$team2 = null;
$team3 = null;
$kejmin1 = '';
$kejmin2 = '';
$team1Image = '';
$team2Image = '';

$imageDir = __DIR__ . '/K_Images';

function formatKejminImageName($name) {
    $cleanName = trim($name);
    $cleanName = preg_replace('/[^A-Za-z0-9 _-]/', '', $cleanName);
    return str_replace(' ', '', $cleanName) . '.gif';
}

if ($userId) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user) {
        $team1 = $user['team1'] ?? null;
       

        $teamIds = [];
        foreach ([$team1] as $teamId) {
            $teamId = intval($teamId);
            if ($teamId > 0) {
                $teamIds[] = $teamId;
            }
        }

        for ($slot = 1; $slot <= 2; $slot++) {
            if (!isset($teamIds[$slot - 1])) {
                break;
            }

            $selectedId = $teamIds[$slot - 1];
            $sql = "SELECT * FROM Kejmin WHERE kejmin_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $selectedId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();

            if ($row) {
                ${"kejmin{$slot}"} = $row['kejmin_name'];
                ${"team{$slot}Image"} = formatKejminImageName($row['kejmin_name']);
                if (!is_file($imageDir . '/' . ${"team{$slot}Image"})) {
                    ${"team{$slot}Image"} = '';
                }
            }
        }
    }
}

$conn->close();
?>
<?php
        include "battlenavbar.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejmin</title>
    <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
    <script src = "audio.js" defer></script>
  <audio id="battle-music" src = "K_Audio/battle.mp3" loop></audio> 
  <link rel= "icon" type = "image/x-icon" href = "K_Images/Sword.png">

</head>

<body style="margin: 0; min-height: 100vh; background: url('K_Images/battleBackground.png') no-repeat center center fixed; background-size: cover;">
    
    <div style="position: relative; width: 1200px; max-width: 100%; margin: 0 auto; padding: 40px 0;">
      <?php if ($team1Image): ?>
      <img src="K_Images/<?php echo htmlspecialchars($team1Image); ?>" alt="<?php echo htmlspecialchars($kejmin1); ?>" style="position: absolute; left: 150px; top: 120px; width: 420px; height: auto; z-index: 1; transform: scaleX(-1);" />
      <?php endif; ?>
      <?php if ($enemyImage): ?>
      <img src="K_Images/<?php echo htmlspecialchars($enemyImage); ?>" alt="Enemy" style="position: absolute; left: 900px; top: 40px; width: 180px; height: auto; z-index: 1;" />
      <?php elseif ($team2Image): ?>
      <img src="K_Images/<?php echo htmlspecialchars($team2Image); ?>" alt="<?php echo htmlspecialchars($kejmin2); ?>" style="position: absolute; left: 1000px; top: 40px; width: 180px; height: auto; z-index: 1;" />
      <?php endif; ?>
      <canvas width="800" height="620" style="background: transparent; display: block; margin: 0 auto; position: relative; z-index: 0;"></canvas>
    </div>
    <div id="team1" data-db="<?php echo htmlspecialchars($team1, ENT_QUOTES, 'UTF-8'); ?>"></div>
    <div id="team2" data-db="<?php echo htmlspecialchars($team2, ENT_QUOTES, 'UTF-8'); ?>"></div>
    <div id="team3" data-db="<?php echo htmlspecialchars($team3, ENT_QUOTES, 'UTF-8'); ?>"></div>
<div class="enemy-health-box">
  <h3>Enemy Health:</h3>
  <div class="health-container">
    <div id="enemy-bar" class="health-bar"></div>
  </div>
</div>
    <!-- <script src="encounter.js"></script> -->
    <!-- <script src="healthbar.js"></script> -->
</body>
</html>
<style>
 .enemy-health-box {
  position: fixed;
  top: 15px;      
  left: 20px;         
  z-index: 999;       
  background: black; 
  padding: 10px 15px;
  border-radius: 8px;
  width: 250px;       
  box-sizing: border-box;
}

.enemy-health-box h3 {
  margin: 0 0 8px 0;  
  font-family: Comic Sans MS;
  font-size: 16px;
  -webkit-text-stroke: 0.5px #B9A5E2;
  letter-spacing: 1px;
  color:white;
}

.health-container {
  background-color: black; 
  width: 100%;
  height: 16px;          
  border: 2px solid #B9A5E2;
  border-radius: 4px;
  overflow: hidden;     
  box-sizing: border-box;
}


.health-bar {
  width: 100%;         
  height: 100%;
  background-color: #88E788;
  transition: width 0.3s ease; 

}

    </style>