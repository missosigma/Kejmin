<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_name('MY_GAME_SESSION'); 
session_start();
require_once 'processes/dbconfig.php';


$team1 = intval($_POST['firstTeam'] ?? 0);
$team2 = 0;
$team3 = 0;

$inputData = [];
$contentType = $_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '';
if (stripos($contentType, 'application/json') !== false) {
    $rawBody = file_get_contents('php://input');
    $json = json_decode($rawBody, true);
    if (is_array($json)) {
        $inputData = $json;
    }
}

if (!$team1 && isset($inputData['firstTeam'])) {
    $team1 = intval($inputData['firstTeam']);
}

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if ($team1) {
    try {
        $sql = "UPDATE users SET team1 = ?, team2 = 0, team3 = 0 WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$team1, $_SESSION['id']]);

        $_SESSION['team1'] = $team1;
        $_SESSION['team2'] = 0;
        $_SESSION['team3'] = 0;

        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Kejmin saved.', 'team1' => $team1]);
            exit;
        }

        header("Location: Home.php");
        exit;
    } catch (\PDOException $e) {
        if ($isAjax) {
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Database error.']);
            exit;
        }

        http_response_code(500);
        echo 'Database error.';
        exit;
    }
}

if ($isAjax) {
    header('Content-Type: application/json');
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Please choose a Kejmin.']);
    exit;
}

header('Location: chooseyourkejmin.php');
exit;
?>