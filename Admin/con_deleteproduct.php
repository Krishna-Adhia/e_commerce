<?php
	include_once '../include/db_connection.php';
	$Product_ID = $_GET['Product_ID'];
	
	$delete = "DELETE FROM Product WHERE Product_ID = $Product_ID";
	$result = mysqli_query($connection,$delete) or die(mysqli_error($connection));
	if($result == 1)
	{
		header("location:product.php");
	}
?>