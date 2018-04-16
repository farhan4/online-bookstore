<?php
	include('session.php');
	$isbn = $_GET['num'];
	$login_user = $_SESSION['login_user'];
	$result = mysqli_query($db, "SELECT * from cart where username = '$login_user' and isbn = '$isbn'");
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	if($count == 1){
		$qty = $row['quantity'];
		$qty = $qty + 1;
		mysqli_query($db, "DELETE FROM cart WHERE username='$login_user' and isbn = '$isbn'");
		mysqli_query($db, "INSERT INTO cart VALUES ('$login_user', '$isbn','$qty')");
	}
	else{
	$sql = mysqli_query($db, "INSERT INTO cart VALUES ('$login_user', '$isbn', 1)");
}
	header('location: cart.php');
?>