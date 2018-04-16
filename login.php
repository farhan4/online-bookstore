<?php
   include('config.php');
   session_start();
   $error = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: profile.php");
      }else {
         $error =  "Your Login Name or Password is invalid.";
      }
   }
?>

<html>
<head>
<title>Login</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input,button {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="text"]
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="text"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login button,input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login button:hover {
  background: #17c;
}
.login input[type="submit"]:hover {
  background: grey;
}

/* Buttons' focus effect */
.login button:focus {
  border-color: #05a;
}
.login input[type="button"]:focus {
  border-color: #05a;
}
</style>
</head>
<body>

<script>
function validateLogin(){
var flag =1;
var uname = document.myform.username.value;
var pwd = document.myform.password.value;
if(uname == "" || pwd == ""){
  alert("Username and Password cannot be empty");
  flag = 0;
  }
 else if(pwd.length <= 6){
  alert("Password length should more than 6 characters");
  flag = 0; 
 }
 else if(pwd.search(/[!@#\$%\&~*+=-]/) == -1){
  alert("Password should contain special characters");
  flag = 0;
 }
  else if(pwd.search(/[0-9]/) == -1){
  alert("Password should contain atleast one digit");
  flag = 0;
 }  
if(flag == 0){
 document.myform.focus();
}
else{
  return true;
}
}
</script>

<div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Log in</h2>
<form name="myform" method="post" class="login-container" onsubmit="return validateLogin()">
    <p><input type="text" placeholder="Username" name="username"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" value="Login"></p>
    <p><input type="button" onclick="location.href='register.php';" value="Sign Up" /></p>
 </form>
</div>    
<center><div style = "font-size:16px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div></center>
</body>
</html>
