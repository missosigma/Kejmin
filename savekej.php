<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_name('MY_GAME_SESSION'); 
session_start();
require_once 'processes/dbconfig.php';


$team1 = intval($_POST['firstTeam'] ?? 0);
$team2 = intval($_POST['secondTeam'] ?? 0);
$team3 = intval($_POST['thirdTeam'] ?? 0);

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
if (!$team2 && isset($inputData['secondTeam'])) {
    $team2 = intval($inputData['secondTeam']);
}
if (!$team3 && isset($inputData['thirdTeam'])) {
    $team3 = intval($inputData['thirdTeam']);
}

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if ($team1 && $team2 && $team3) {

    try {
        $sql = "update users set team1 = {$team1}, team2 = {$team2}, team3 = {$team3} where id = {$_SESSION['id']}";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Update the session immediately so Home sees the selected team without extra refresh.
        $_SESSION['team1'] = $team1;
        $_SESSION['team2'] = $team2;
        $_SESSION['team3'] = $team3;

        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Team saved.', 'team1' => $team1, 'team2' => $team2, 'team3' => $team3]);
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
?>