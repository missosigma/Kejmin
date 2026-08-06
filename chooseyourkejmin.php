<?php
session_name('MY_GAME_SESSION');
session_start();
require_once "processes/dbconfig.php";

if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== "YES") {
    header("location:index.php");
    exit;
}

$selected1 = $_SESSION["team1"] ?? '';
$selected2 = $_SESSION["team2"] ?? '';
$selected3 = $_SESSION["team3"] ?? '';

$kejminList = [];
try {
    $stmt = $pdo->query("SELECT kejmin_id, kejmin_name FROM Kejmin ORDER BY kejmin_id>0");
    $kejminList = $stmt->fetchAll();
} catch (Exception $e) {
    $kejminList = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Kejmin</title>
    <link rel="icon" type="image/x-icon" href="K_Images/KJMN.png">
    <link rel="stylesheet" href="loginstyle.css">
    
</head>
<body>
    <div class="chooser">
        <h1>Choose Your Three Kejmin</h1>
        <form id="chooseForm" method="post" action="savekej.php">
            <div class="row">
                <div class="field">
                    <label for="firstTeam">First Kejmin</label>
                    <select id="firstTeam" name="firstTeam">
                        <option value="">-- Select First Kejmin --</option>
                        <?php foreach ($kejminList as $kejmin): ?>
                            <option value="<?php echo htmlspecialchars($kejmin['kejmin_id']); ?>" <?php echo ($selected1 == $kejmin['kejmin_id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($kejmin['kejmin_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label for="secondTeam">Second Kejmin</label>
                    <select id="secondTeam" name="secondTeam">
                        <option value="">-- Select Second Kejmin --</option>
                        <?php foreach ($kejminList as $kejmin): ?>
                            <option value="<?php echo htmlspecialchars($kejmin['kejmin_id']); ?>" <?php echo ($selected2 == $kejmin['kejmin_id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($kejmin['kejmin_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label for="thirdTeam">Third Kejmin</label>
                    <select id="thirdTeam" name="thirdTeam">
                        <option value="">-- Select Third Kejmin --</option>
                        <?php foreach ($kejminList as $kejmin): ?>
                            <option value="<?php echo htmlspecialchars($kejmin['kejmin_id']); ?>" <?php echo ($selected3 == $kejmin['kejmin_id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($kejmin['kejmin_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="actions">
                <button id="saveTeam" type="submit">Save Team</button>
                <button id="cancel" type="button" onclick="history.back()">Cancel</button>
            </div>
            <div class="note">After saving, you will be redirected to Home.</div>
        </form>
    </div>
    <script>
        async function checkTeamSave(event) {
            event.preventDefault();

            const firstTeam = document.getElementById('firstTeam').value;
            const secondTeam = document.getElementById('secondTeam').value;
            const thirdTeam = document.getElementById('thirdTeam').value;

            if (!firstTeam || !secondTeam || !thirdTeam) {
                alert('Please choose three Kejmin.');
                return;
            }


            try {
                const response = await fetch('savekej.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ firstTeam, secondTeam, thirdTeam })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                if (data.status === 'success') {
                    window.location.href = 'Home.php';
                } else {
                    alert(data.message || 'Unable to save your team.');
                }
            } catch (error) {
                console.error(error);
                alert('Unable to save your team.');
            }
        }

        document.getElementById('chooseForm').addEventListener('submit', checkTeamSave);
    </script>
</body>
</html>


<style>
        body {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            background-image: url('https://img.magnific.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902621.jpg?semt=ais_test_b&w=740&q=80');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: black;
        }
        .chooser {
            width: 100%;
            max-width: 720px;
            background-color: rgba(255, 255, 255, 0.96);
            border: 3px solid #B9A5E2;
            
            padding: 32px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
        }
        h1 {
            margin: 0 0 24px;
            font-size: 2.2rem;
            text-align: center;
            -webkit-text-stroke: 0.5px #B9A5E2;
            color: #111;
        }
        .row {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .field {
            flex: 1 1 220px;
            min-width: 220px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            color: #111;
        }
        select {
            width: 100%;
            padding: 12px 16px;
            font-size: 1rem;
          
            border: 1px solid #B9A5E2;
            background: white;
            color: black;
            box-sizing: border-box;
        }
        select:hover {
            background-color: #f5f2ff;
        }
        .actions {
            margin-top: 28px;
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        button {
            border: none;
          
            background: #B9A5E2;
            color: black;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 1rem;
            padding: 14px 28px;
            cursor: pointer;
            width: 180px;
            transition: opacity 0.2s ease, background 0.2s ease;
        }
        button:hover {
            opacity: 0.85;
        }
        .note {
            margin-top: 18px;
            font-size: 0.95rem;
            color: #333;
            text-align: center;
        }
    </style>
