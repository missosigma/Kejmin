
<?php
require_once("dbconfig.php");

$id = $_GET["id"];
  $conn = new mysqli($servername, $username, $password, $database);
  if($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);}
  //send sql statement 
  $sql ="SELECT * FROM users where id={$id};";
  $stmt = $conn->prepare($sql);
  $stmt-> execute();
  $result = $stmt->get_result();
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $fields = $result->fetch_fields();
    
      $user = $rows[0]["username"];
      $map = $rows[0]["mapId"];
      $t1 = $rows[0]["team1"];
      $t2 = $rows[0]["team2"];
      $t3 = $rows[0]["team3"];
      $l1 = $rows[0]["level1"];
      $l2 = $rows[0]["level2"];
      $l3 = $rows[0]["level3"];
      // $t3 = trim($ext,".");
  //     $flag = $ext.".png";
  // echo "<div class = 'w3-bar w3-white w3-padding w3-animate-zoom'>";
  //     if(is_file("flags/{$flag}")){
  //       echo "<img src='flags/{$flag}' width='100px'> ";
      // }
      echo "<h1>";
      echo $user;
      echo "</h1>";
      echo "<br>";
      // foreach($fields as $index => $field){
      //   $fieldName = $field->name;
      //    if(strstr($fieldName,"ID")){ //skip these fields
      //       continue;
      //   }
      //   if($fieldName == "FIPS_ID"){   //stop when you see this field
      //       break;
      //   }
        echo "<b>";
        echo ucwords(strtolower(str_replace("_"," ",$fieldName)));
        echo ":</b> ";
        echo $rows[0][$fieldName];
        echo "<br>";
      }
echo "</div>";
echo "<br>";

//currency
echo "<div class = 'w3-bar w3-white w3-padding w3-animate-zoom'>";
echo "<h5>Currency: </h4>"; 
  //prep some sql 
   //send sql & get results

  $sql ="SELECT * FROM currencies where currency_code='{$ccode}';";
  $stmtc = $conn->prepare($sql);
  $stmtc-> execute();
  $resultc = $stmtc->get_result();

    $rowsc = $resultc->fetch_all(MYSQLI_ASSOC);
    $fieldc = $resultc->fetch_fields();

      $currenc = $rowsc[0]["CURRENCY_CODE"];
      $currenn = $rowsc[0]["CURRENCY_NAME"];
      echo $currenc;
      echo " : ";
      echo $currenn;
      echo "<br>";
      

      // $currenn = $rowsc[0]["CURRENCY_NAME"];
    
  // print_r($currenc,$currenn);


//Languages 
echo "<h4>Spoken Languages: </h4>";
  //prep some sql 
  $sql ="SELECT * FROM languages where country_id = '{$cid}';";
  $stml = $conn->prepare($sql);
  $stml-> execute();
  $resul = $stml->get_result();

  $rowl = $resul->fetch_all(MYSQLI_ASSOC);
  $fiel = $resul->fetch_fields();
    for($i=0;$i<count($rowl);$i++){
    $langn = $rowl[$i]["LANGUAGE_NAME"];
    echo $langn;
    echo "<BR>";
    }
    echo "<br><br>";

  //send sql & get results

  //print result


echo "<Br></div>";
$conn->close();

?>
