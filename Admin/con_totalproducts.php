<?php
	include_once '../include/db_connection.php';

    $select = "SELECT * FROM product";
    $result = mysqli_query($connection,$select) or die(mysqli_error($connection)); 	
    $total_products = mysqli_num_rows($result);

?>