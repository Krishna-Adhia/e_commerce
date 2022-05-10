<?php
	include_once '../include/db_connection.php';

    $select = "SELECT * FROM user";
    $result = mysqli_query($connection,$select) or die(mysqli_error($connection)); 	
    $total_user = mysqli_num_rows($result);

?>