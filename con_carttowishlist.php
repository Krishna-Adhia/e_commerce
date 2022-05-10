<?php
	session_start();
	include_once 'include/db_connection.php';
	$User_ID = $_SESSION['User_ID'];
	$Product_ID = $_GET['Product_ID'];

	$select = "SELECT * FROM cart WHERE Product_ID = $Product_ID";
	$select_result = mysqli_query($connection,$select) or die(mysqli_error($connection));
	$row = mysqli_fetch_assoc($select_result);
	foreach($select_result as $row)
	{
		$Product = $row['Product'];
		$Product_Name = $row['Product_Name'];
		$Product_Price = $row['Product_Price'];
	}

	$insert = "INSERT INTO wishlist(User_ID,Product_ID,Product,Product_Name,Product_Price) VALUES ($User_ID, $Product_ID, '$Product', '$Product_Name', $Product_Price)";

	$insert_result = mysqli_query($connection,$insert) or die(mysqli_error($connection));
	if($insert_result == 1)
	{
		header("location:wishlist.php");
	}
	else
	{
		header("location:product.php");
	}


?>