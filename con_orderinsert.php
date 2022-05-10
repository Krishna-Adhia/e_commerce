<?php
	
	include_once 'include/db_connection.php';
	session_start();
	$User_ID = $_SESSION['User_ID'];
	$Cart_Total = $_POST['cart_total_input'];
	$Country = $_POST['country'];
	$State = $_POST['state'];
	$Postcode = $_POST['postcode'];
	$Payment_Status = 'Paid';

	$insert = "INSERT INTO order_details(User_ID, Cart_Total, Ship_Country, Ship_State, Ship_ZipCode) VALUES ($User_ID, $Cart_Total, '$Country', '$State', $Postcode)";

	$result = mysqli_query($connection,$insert) or die(mysqli_error($connection));
	if(isset($result))
	{
		header("location:checkout.php?total=".$Cart_Total);
	}

	
?>