<?php
	include_once 'include/db_connection.php';

	$UserName = $_POST['UserName'];
	$UserPassword = $_POST['UserPassword'];
	$UserfName = $_POST['UserfName'];
	$UserlName = $_POST['UserlName'];
	$UserEmail = $_POST['UserEmail'];

	$insert_userdata = "INSERT INTO user(UserName, UserPassword, FirstName, LastName, EmailAddress) VALUES ('$UserName', '$UserPassword','$UserfName','$UserlName','$UserEmail')";

	$result = mysqli_query($connection,$insert_userdata);
	if($result == 1)
	{
		header("LOCATION: login.php");
	}

	else
	{
		echo mysqli_error($connection);
	}

?>