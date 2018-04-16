<?php
  include('session.php')
?>

<!DOCTYPE html>
<html>
<head>
<style>
.container {
    overflow: hidden;
    background-color: #333;
    font-family: Arial;
}
.cont{
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 28px 30px;
    text-decoration: none;
}
.links{
    background-color: #f44336;
    color: white;
    padding: 6px 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}
a:hover{
    background-color: red;
}
.header {
  background: #e40046;
  padding: 1.3rem 1.3rem;
  font-size: 5.1rem;
  color: var(--light);
  box-shadow: var(--shadow);
}


</style>
</head>
<body>
    <div class="header">
      Amazon Home
    </div>
<div class="container" align="center" >

  <a class="cont" href="catalogue.html">All Books</a>
  <a class="cont" href="profile.php">Profile</a>
  <a class="cont" href="cart.php">Shopping Cart</a>
  <a class="cont" href="logout.php">Sign Out</a>
<br><br><br><br><br><br><br>
<div>
      <?php 
           echo "<center>";
           $loop2 = mysqli_query($db, "SELECT title, author, price, image, isbn FROM book");
            while ($row = mysqli_fetch_array($loop2,MYSQLI_ASSOC)){
               echo "<hr>";
                 // echo "<a href=" . $row['link'] . ".html>";
                 
                 echo "<img src=" . $row['image'] . " height='225px'></a><br>";
                 echo "<div><p>" . $row['title'] . "</br>";
                 echo $row['author'] . "</p>";
                 echo "<i>Price</i>: Rs. " . (int) $row['price'] . "</a><br>";
                 echo "<a class='links' href='addtoCart.php?num=" . $row['isbn'] . "'>Add to Cart</a><br>";
                 echo "<a class='links' href='payment.html'>Buy</a><br>";
                 echo "<br>";
              }
             echo "</center>";
      ?>
      <hr>
</div>    


</body>
</html>