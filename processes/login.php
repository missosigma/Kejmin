<?php
  session_start(); // need to run to access session data 
  $user = $_POST["username"];
  $pass = $_POST["password"];
  //load dbconfig
  require_once("dbconfig.php");
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
    $conn->close();
    header("location:../Home.php");
  }else{
    // echo "You are not logged in.";
    $_SESSION["loggedIn"] = "NO";
    $_SESSION["userName"] = "Hacker";
    $_SESSION["coins"] = 0;
    $conn->close();
    header("location:../index.php?message=LoginFaliure.");
  }

?>