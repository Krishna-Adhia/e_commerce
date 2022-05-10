<!--check whether user is logged in or not-->
<?php
	session_start();
	if(!isset($_SESSION['User_ID']))
	{
		header("location:login.php");
	}
?>
<!--log in over-->