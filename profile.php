<?php
  include('session.php')
?>

<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
​
.title {
  color: grey;
  font-size: 18px;
}

input{
  display:block;
  box-sizing:border-box;
  width:20%;
  outline:none;
}
input{
  padding:15px 20px;
  width:20%;
  background:#e6e6e6;
  border:#fff;
}

button{
  width:20%;
  padding:20px 10px;
  border:none;
  background: #FFA07A;
  color:#fff;
  font-weight:bolder;
  cursor:pointer;
}

​</style>

</head>
<body>
​
<h2 style="text-align:center">User Profile Card</h2>
​
<div class="card">
  <img src="profile.png" alt="John" style="width:100%">
  <h1>XYZ</h1>
  <p class="title">xyz@gmail.com</p>
  <p>9876543210</p>
  <p>Address: B/098,ABC,Mumbai</p>
</div>
<center>
<div class="title" style="font-size:20px">
WishList :<br>
1.Elements of Statistical Learning Trevor<br>
2.Compiler Principles Techniques and Tools Ullman<br>

Your Previous Purchases :<br>
1.Cryptography and Network Security Forouzan<br>
2.Machine Learning Tom M. Mitchell<br>

</div>
<p><input type="button" onclick="location.href='home.php';" value="Home"></p>
</center>
</body>
</html>
​

