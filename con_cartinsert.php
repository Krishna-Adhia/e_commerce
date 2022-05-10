<?php
	session_start();
	$User_ID = $_SESSION['User_ID'];
	include_once 'include/db_connection.php';
	$Product_ID = $_GET['Product_id'];
	$count = 0;

	$select = "SELECT Product_ID from cart WHERE User_ID = $User_ID";
	$result = mysqli_query($connection,$select);
	while($row = mysqli_fetch_assoc($result))
	{	
		if($Product_ID == $row['Product_ID'])
		{
			$count ++;
		}
	}

	if($count !=0)
	{
		header("location:product.php");
	}

	else
	{
		$select = "SELECT * FROM product WHERE Product_ID = $Product_ID";
		$select_result = mysqli_query($connection,$select) or die(mysqli_error($connection));
		while($row = mysqli_fetch_assoc($select_result))
		{
			$ProductID = $row['Product_ID'];
			$Product = $row['Product'];
			$Product_Name = $row['Product_Name'];
			$Product_Price = $row['Product_Price'];
		}

		$insert = "INSERT INTO cart(User_ID,Product_ID,Product,Product_Name,Product_Price) VALUES ($User_ID, $ProductID, '$Product', '$Product_Name','$Product_Price')";

		$insert_result = mysqli_query($connection,$insert) or die(mysqli_error($connection));
		if($insert_result == 1)
		{
			header("location:cart.php");
		}
		else
		{
			header("location:product.php");
		}
	}


	

?>