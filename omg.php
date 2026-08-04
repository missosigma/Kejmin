<?php
include "headr.php";
require_once("wfconfig.php");

$id = $_GET["id"];
  $conn = new mysqli($servername, $username, $password, $database);
  if($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);}
  //send sql statement 
  $sql ="SELECT * FROM wf_countries where region_id={$id};";
  $stmt = $conn->prepare($sql);
  $stmt-> execute();
  $result = $stmt->get_result();
echo "<div class = 'w3-bar w3-white w3-padding w3-animate-opacity'>";

    $rows = $result->fetch_all(MYSQLI_ASSOC);
     for($i=0;$i<count($rows);$i++){
      $name = $rows[$i]["COUNTRY_NAME"];
      $id = $rows[$i]["COUNTRY_ID"];
      $ext = $rows[$i]["INTERNET_EXTENSION"];
      $ext = trim($ext,".");
      $flag = $ext.".png";
      echo "<a href='country.php?id={$id}'>";
      echo "<img src='flags/{$flag}' width='50px'> ";
      echo $name;
      echo "</a>";
      echo "<br><br>";
      
    }
  echo "<br>";
echo "</div>";
$conn->close();
include "footer.php";
?>
