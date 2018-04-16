<?php
  include('session.php');
?>


<html>
<head>
<title>Shopping Cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.flat-table {	
  font-family: sans-serif;
  -webkit-font-smoothing: antialiased;
  font-size: 115%;
  overflow: auto;
  width: auto;
  }
  th {
    background-color: red;
    color: white;
    font-weight: normal;
    padding: 20px 30px;
    text-align: center;
  }

  td {
    background-color: rgb(238, 238, 238);
    color: rgb(111, 111, 111);
    padding: 20px 30px;
  }

input{
  display:block;
  box-sizing:border-box;
  width:40%;
  outline:none;
}
input{
  padding:15px 20px;
  width:40%;
  background:#e6e6e6;
  border:#fff;
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

</style>

</head>
<body>

<center>
<h1>Shopping Cart</h1>

<table border="2" class="flat-table">
<th>No.</th>
<th> Book Title</th>
<th> Quantity</th>
<th> Price</th>
<th>Remove</th>	
<?php 
      $loop1 = mysqli_query($db, "SELECT isbn, quantity FROM cart WHERE username='" .$_SESSION['login_user'] ."'");
      $i = 1;
        while ($row1 = mysqli_fetch_array($loop1,MYSQLI_ASSOC)){
            echo '<tr><td>'. $i . "</td>";
            $loop2 = mysqli_query($db, "SELECT title, author, price, image, isbn FROM book where isbn = '" . $row1['isbn'] ."'");
            $row = mysqli_fetch_array($loop2, MYSQLI_ASSOC);
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row1['quantity'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td> <a  class = 'links' href='deleteFromCart.php?num=" . $row['isbn'] . "'>Delete</a></td>";
            echo "</tr>";
            $i = $i + 1;
          }
           ?>


</table>
<big>
<b>Total : 1050</b>
<big>
<br>
  <p><input type="button" onclick="location.href='payment.html';" value="CHECKOUT"></p>
  <p><input type="button" onclick="location.href='home.php';" value="HOME"></p>
</form>
</center>
</body>
</html>
