<?php
	session_start();
	include_once 'include/db_connection.php';
	$Product_ID = $_GET['Product_ID'];
	$User_ID = $_SESSION['User_ID']; 

	$delete = "DELETE FROM cart WHERE Product_ID = $Product_ID AND User_ID = $User_ID";
	$result = mysqli_query($connection,$delete) or die(mysqli_error($connection));
	if($result == 1)
	{
		header("location:cart.php");
	}
?>