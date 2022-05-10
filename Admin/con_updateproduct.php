<?php
	include_once '../include/db_connection.php';

	$Product_Name = $_POST['ProductName'];
	$Product_Gender = $_POST['ProductGender'];
	$Product_Price = $_POST['ProductPrice'];
	$Product_ID = $_POST['ProductID'];

	//update image
	if($_FILES['product']['size'] != 0 && $_FILES['product']['error'] == 0)
	{
		$allowed_format = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
		$filename = time() . '_' . $_FILES['product']['name'];

		$filetype = $_FILES['product']['type'];
		$filesize = $_FILES['product']['size'];

		//verify file extension
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!array_key_exists($ext, $allowed_format)) die("Error: Please select a valid file format");

		// Verify file size - 5MB maximum
		$maxsize = 5 * 1024 * 1024;
		if($filesize > $maxsize)
		{
			die("Error: File size is larger than the allowed limit.");
		} 

		if(in_array($filetype, $allowed_format))
		{
			// Check whether file exists before uploading it
			if(file_exists("C:\\xampp\\htdocs\\e_commerce\\Admin\\product\\" . $filename))
			{
				echo $filename . " is already exists.";
			} 

			else
			{
				move_uploaded_file($_FILES["product"]["tmp_name"], "C:\\xampp\\htdocs\\e_commerce\\Admin\\product\\" . $filename);
				//echo "Your file was uploaded successfully.";
			}

			$update = "UPDATE product SET Product = '$filename', Product_Name = '$Product_Name', Product_Gender = '$Product_Gender', Product_Price = '$Product_Price' WHERE Product_ID = $Product_ID ";

			$result = mysqli_query($connection,$update) or die(mysqli_error($connection));
			header("location:product.php");
		}
	}

	else
	{
		$update = "UPDATE product SET Product_Name = '$Product_Name', Product_Gender = '$Product_Gender', Product_Price = '$Product_Price' WHERE Product_ID = $Product_ID  ";

		$result = mysqli_query($connection,$update) or die(mysqli_error($connection));
		header("location:product.php");
	}
?>