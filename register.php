<?php
include('config.php');
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array();
$err = ''; 
// REGISTER USER
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['pwd']);
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      $err = "Username already exists";
    }
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
      $err = "Email already exists";
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    //$password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO users VALUES('$username', '$password', '$email')";
    mysqli_query($db, $query);
    $_SESSION['login_user'] = $username;
    header('location: profile.php');
  }
}
?>
<html>
<head><title>Register</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
 body{
  background: #FFA07A;
}
form{
  background:#fff;
  padding:2em;
  max-width:400px;
  margin:100px auto 0;
}

input{
  display:block;
  box-sizing:border-box;
  width:100%;
  outline:none;
}
input{
  padding:15px 20px;
  width:100%;
  background:#e6e6e6;
  border:#fff;
}
input:focus{
  background:#fff;
  border-bottom:1px solid #222;
}
input::-webkit-input-placeholder{
  text-align:center;
  text-transform:uppercase;
}
p{
  position:relative;
}

button{
  width:100%;
  padding:20px 10px;
  border:none;
  background: #FFA07A;
  color:#fff;
  font-weight:bolder;
  cursor:pointer;
}

</style>


</head>
<body>
<script>
function validateRegister(){
var flag = 1;
var vuname = document.myform.username.value;
var vpwd = document.myform.pwd.value;
var vemail = document.myform.email.value;
var vcpwd = document.myform.cpwd.value;
var vname = document.myform.names.value;
var vdob = document.myform.dob.value;
var vphno = document.myform.phno.value;
var vaddr = document.myform.address.value;
var atpos = vemail.indexOf("@");
var dotpos = vemail.lastIndexOf(".");

if(vuname == "" || vpwd == "" || vemail == "" || vcpwd == "" || vname == "" || vdob == "" || vphno == "" || vaddr == ""){
  alert("Details cannot be empty");
  flag = 0;
  }
 else if(vphno.length != 10){
   alert("Enter 10 digit phone number");
   flag = 0;
 }
else if(!vphno.match(/^[0-9]{10}$/)){
   alert("Enter correct format of phone number");
   flag = 0;
}
else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=vemail.length) {
  alert("Enter valid e-mail address");
  flag = 0;
}

if(flag == 0){
 document.myform.focus();
}else{
  return true;
}
}
</script>
    <center>
    <font color="white"><h1>Registration Page</h1></font> 
    <form name = "myform" method="post" onsubmit="return validateRegister()">
    <p><input type="text"  name="username" placeholder="Username"></p>
    <p><input type="email" name="email" placeholder="Email"></p>
    <p><input type="password"  name="pwd" placeholder="Password"></p>
    <p><input type="password"  name="cpwd" placeholder="Confirm Password"></p>    
    <p><input type="text"  name="names" placeholder="Name"></p> 
    <p><input type="text"  name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" onblur="(this.type='text')"></p> 
    <p><input type="text"  name="phno" placeholder="Phone Number"></p> 
    <p><input type="text"  name="address" placeholder="Address"></p> 
    <p><input type="submit" value="Register"></p>
    <p><input type="button" onclick="location.href='home.html';" value="Home"></p>
    </form>
    <div style = "font-size:16px; color:#cc0000; margin-top:10px"><?php echo $err; ?></div>
 </center>
</body>
</html>
