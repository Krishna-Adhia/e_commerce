<?php
	include_once 'include/db_connection.php';
	session_start();
	$User_ID = $_SESSION['User_ID'];
	$status = 'Paid';

	$update = "UPDATE order_details SET Payment_Status = \"$status\" WHERE
	 ORDER_ID = (SELECT Order_ID FROM order_details ORDER BY Order_ID DESC LIMIT 1)";

	 $update_result = mysqli_query($connection,$update) or die(mysqli_error($connection));


	$select = "SELECT * FROM order_details WHERE User_ID = $User_ID AND ORDER_ID = (SELECT Order_ID FROM order_details ORDER BY Order_ID DESC LIMIT 1)";

	$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
	$value = mysqli_fetch_assoc($result);
	
	
		$order_id = $value['Order_ID'];
		$User_Name = $_SESSION['User_Name'];
		$user_id = $value['User_ID'];
		$cart_total = $value['Cart_Total'];
		$country = $value['Ship_Country'];
		$state = $value['Ship_State'];
		$zipcode = $value['Ship_ZipCode'];
		$payment = $value['Payment_Status'];
	

	include_once 'generatepdf.php';
	
?>