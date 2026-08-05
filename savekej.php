<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_name('MY_GAME_SESSION'); 
session_start();
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'processes/dbconfig.php';


$jsonInput = file_get_contents('php://input');
$data = json_decode($jsonInput, true);

if( isset($data['firstTeam']) && isset($data['secondTeam']) && isset($data['thirdTeam'])) {
    $team1 = intval($data['firstTeam']);
    $team2 = intval($data['secondTeam']);
    $team3 = intval($data['thirdTeam']);

    try {
        $sql = "update users set team1 = {$team1}, team2 = {$team2}, team3 = {$team3} where id = {$_SESSION['id']}";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (\PDOException $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
} 
?>