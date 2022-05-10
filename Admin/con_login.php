<?php
	session_start();
	include_once '../include/db_connection.php';

	$Admin_UserName = $_POST['UserName'];
	$Admin_Password = $_POST['Password'];

	$select = "SELECT * FROM admin WHERE Admin_UserName = '$Admin_UserName' AND Admin_Password = '$Admin_Password'";

	$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{
		$Admin_ID = $row['Admin_ID'];
		$Admin_Name = $row['Admin_UserName'];
		$_SESSION['Admin_ID'] = $Admin_ID;
		$_SESSION['Admin_Name'] = $Admin_Name;

		header("location:index.php");
	}
	else
	{
		header("location:login.php");	
	}
?>