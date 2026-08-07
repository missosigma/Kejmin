<?php
session_name('MY_GAME_SESSION'); 
if(isset($_GET["message"])){
$message = $_GET["message"]."<br>";
}else{
  $message = "";
}
?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
  <link rel = "stylesheet" href = "loginstyle.css">
  <style>
  </style> 
</head>
  <body>
    <h1> Welcome to Kejmin! </h1>
    <div class = "container">
    <form method = "post" name = "login" id = "login" action = "processes/login.php">
        <font color = "red">
        <?php echo $message;?>
        </font>
        <label for = "username">Username</label>
        <input type = "text" name = "username" id = "username">
        <br>
        <label for = "password">Password</label>
        <input type = "password" name = "password" id = "password">
        <br>
        <!-- <input type="submit" value = "Login"> -->
         <button onclick="loginUser(event)">Login</button>
         <br>
         <a class = "register" href = "register.php">Not a member yet?  Register here.</a>
    </form>
    </div>
    <script>
      function loginUser(event){
          event.preventDefault();
          var loginForm = document.getElementById("login");
          if(loginForm.elements["username"].value == "" || loginForm.elements["password"].value ==""){
            alert("Enter a username and password.")
          }else{
            loginForm.submit();
          }
      }
    </script> 
  </body>
</html>