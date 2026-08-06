<?php
session_name('MY_GAME_SESSION');
session_start();
require_once "processes/dbconfig.php";

if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== "YES") {
    header("location:index.php");
    exit;
}

$userId = $_SESSION['userName'] ?? null;

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$user = null;
$team1 = null;
$team2 = null;
$team3 = null;
$kejmin1 = '';
$kejmin2 = '';
$team1Image = '';
$team2Image = '';
$enemyTeam = [
    $_SESSION["enemyKejmin1"] ?? '',
    $_SESSION["enemyKejmin2"] ?? '',
    $_SESSION["enemyKejmin3"] ?? '',
];
$enemyImage = '';
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
        $team2 = $user['team2'] ?? null;
        $team3 = $user['team3'] ?? null;

        $teamIds = [];
        foreach ([$team1, $team2, $team3] as $teamId) {
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejmin</title>
    <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
    <script src = "audio.js" defer></script>
  <audio id="battle-music" src = "K_Audio/battle.mp3" loop></audio> 

</head>

<body style="margin: 0; min-height: 100vh; background: url('K_Images/battleBackground.png') no-repeat center center fixed; background-size: cover;">
    <?php
        include "battlenavbar.php";
    ?>
    <div style="position: relative; width: 1200px; max-width: 100%; margin: 0 auto; padding: 40px 0;">
      <?php if ($team1Image): ?>
      <img src="K_Images/<?php echo htmlspecialchars($team1Image); ?>" alt="<?php echo htmlspecialchars($kejmin1); ?>" style="position: absolute; left: 200px; top: 140px; width: 420px; height: auto; z-index: 1; transform: scaleX(-1);" />
      <?php endif; ?>
      <?php if ($enemyImage): ?>
      <img src="K_Images/<?php echo htmlspecialchars($enemyImage); ?>" alt="Enemy" style="position: absolute; left: 900px; top: 60px; width: 180px; height: auto; z-index: 1;" />
      <?php elseif ($team2Image): ?>
      <img src="K_Images/<?php echo htmlspecialchars($team2Image); ?>" alt="<?php echo htmlspecialchars($kejmin2); ?>" style="position: absolute; left: 900px; top: 60px; width: 180px; height: auto; z-index: 1;" />
      <?php endif; ?>
      <canvas width="800" height="600" style="background: transparent; display: block; margin: 0 auto; position: relative; z-index: 0;"></canvas>
    </div>
    <script src="encounter.js"></script>
</body>
</html>