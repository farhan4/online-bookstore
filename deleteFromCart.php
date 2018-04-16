<?php
	include('session.php');
	$isbn = $_GET['num'];
	$myusername = $_SESSION['login_user'];
	$sql = mysqli_query($db, "DELETE FROM cart WHERE username ='" . $myusername ."' AND isbn='" . $isbn ."' ");
	header('location: cart.php');
?>