<?php
	session_start();
	include_once '../include/db_connection.php';
	$Admin_ID = $_SESSION['Admin_ID'];
	$Oldpassword = $_POST['OldPassword'];
	$Newpassword = $_POST['NewPassword'];

	$select = "SELECT * FROM admin";
	$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
	$row = mysqli_fetch_assoc($result);
	if($row['Admin_Password'] == $Oldpassword)
	{
		$update = "UPDATE admin set Admin_Password = '$Newpassword' where Admin_ID = '$Admin_ID'";
		$update_result = mysqli_query($connection,$update) or die(mysqli_error($connection));
		header("Location: index.php");
	}

	else
		{
			header("Location: settings.php");
        }
?>