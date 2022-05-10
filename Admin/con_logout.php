<?php
	session_start();
	if(isset($_SESSION['Admin_Name']))
	{
		session_destroy();
		header('Location:login.php');
	}
?>