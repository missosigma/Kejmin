<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel= "icon" type = "image/x-icon" href = "Images/KJMN.png">
  <link rel = "stylesheet" href = "loginstyle.css">
  <style>


  </style> 
</head>
  <body>
    <div class = "container">
    <form method = "post" name = "register" id = "register" action = "processes/signup.php">

        <h1>Register</h1>
        <label for = "username">Username</label>
        <input type = "text" name = "username" id = "username">
        <br>
        <label for = "password">New Password</label>
        <input type = "password" name = "password" id = "password">
        <br>
        <label for = "cpassword">Confirm Password</label>
        <input type = "password" name = "cpassword" id = "cpassword">
        <br>
        <!-- <input type="submit" value = "Register"> -->
         <button onclick="registerUser(event)">Register</button>
    </form>
    </div>
    <script>
      function registerUser(event){
          event.preventDefault();
          var registerForm = document.getElementById("register");
          if(registerForm.elements["username"].value == "" || registerForm.elements["password"].value ==""){
            alert("Enter a username and password.")
          }else if(registerForm.elements["cpassword"].value != registerForm.elements["password"].value){
            alert("Your passwords do not match.")
          }else{
            registerForm.submit();
          }
      }
    </script> 
  </body>
</html>