<?php
  session_name('MY_GAME_SESSION'); 
  session_start(); // need to run to access session data 
  $user = $_POST["username"];
  $pass = $_POST["password"];
  //load dbconfig
  require_once("../dbconfig.php");
  //connect to database
  $conn = new mysqli($servername, $username, $password, $database);
  if($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }
  //send sql statement 
  //BEst pass
  $sql = "SELECT * FROM users where username=? and bestpassword=SHA2(CONCAT('flower', ?,'pepper'),0);";
  $stmt = $conn->prepare($sql);
  $stmt-> execute([$user, $pass]);
  $result = $stmt->get_result();
  // print_r($result);
  // exit;

  if($result->num_rows>0){
    $row = $result->fetch_all(MYSQLI_ASSOC);
    // print_r($row);
    // exit();
    $_SESSION["loggedIn"] = "YES";
    $_SESSION["userName"] = $row[0]["username"];
    $_SESSION["coins"] = $row[0]["coins"];
    $_SESSION["team1"] = $row[0]["team1"];
    $_SESSION["team2"] = $row[0]["team2"];
    $_SESSION["team3"] = $row[0]["team3"];
    $_SESSION["id"] = $row[0]["id"];
    $_SESSION["health1"] = $row[0]["health1"];
    $_SESSION["health2"] = $row[0]["health2"];
    $_SESSION["health3"] = $row[0]["health3"];
    $_SESSION["level1"] = $row[0]["level1"];  
    $_SESSION["level2"] = $row[0]["level2"];
    $_SESSION["level3"] = $row[0]["level3"];

    $conn->close();

    $team1 = intval($_SESSION["team1"] ?? 0);
    $team2 = intval($_SESSION["team2"] ?? 0);
    $team3 = intval($_SESSION["team3"] ?? 0);
    if ($team1 === 0 || $team2 === 0 || $team3 === 0) {
      header("location:../chooseyourkejmin.php");
    } else {
      header("location:../Home.php");
    }
  }else{
    // echo "You are not logged in.";
    $_SESSION["loggedIn"] = "NO";
    $_SESSION["userName"] = "Hacker";
    $_SESSION["coins"] = 0;
    $_SESSION["team1"] = 0;
    $_SESSION["team2"] = 0;
    $_SESSION["team3"] = 0;
    $_SESSION["id"] = 0;
    $_SESSION["health1"] = 0;
    $_SESSION["health2"] = 0;
    $_SESSION["health3"] = 0;
    $_SESSION["level1"] = 0;
    $_SESSION["level2"] = 0;
    $_SESSION["level3"] = 0;
    $conn->close();
    header("location:../index.php?message=LoginFaliure.");
  }

?>