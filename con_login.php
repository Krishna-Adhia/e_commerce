<?php
	session_start();
	include_once 'include/db_connection.php';

	$UserName = $_POST['UserName'];
	$UserPassword = $_POST['UserPassword'];

	$select_userdata = "SELECT User_ID,UserName,UserPassword FROM user WHERE UserName = '$UserName' && UserPassword ='$UserPassword'";

	$result = mysqli_query($connection,$select_userdata) or mysqli_error($connection);
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{
		$User_ID = $row['User_ID'];
		$User_Name = $row['UserName'];
		$_SESSION['User_ID'] = $User_ID;
		$_SESSION['User_Name'] = $User_Name;

		header("location:index.php");
	}

	else
	{
		header("location:login.php");	
	}
?>