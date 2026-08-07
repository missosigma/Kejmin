<?php 
require_once("../dbconfig.php");
$user = $_POST["username"];
$pass = $_POST["password"];
$cpass = $_POST["cpassword"];
//connect to database
$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error){
  die("Connection Failed: " . $conn->connect_error);
}
//Prepare sql message 
$sql = "INSERT INTO users(username,bestpassword,approved,createdOn) 
VALUES ('{$user}',SHA2(CONCAT('flower','{$pass}','pepper'),0),1,NOW());";

//send ts sql message
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn->close();
header("location:../index.php?message=Register Success. Login to continue.");
?>
