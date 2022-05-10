<?php
	include_once '../include/db_connection.php';

	$Product_Name = $_FILES['product']['name'];
	$Product_Gender = $_POST['ProductGender'];
	$Product_Price = $_POST['ProductPrice'];

	//insert image
	if(isset($_FILES['product']))
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
				echo "Your file was uploaded successfully.";
			}

			$insert = "INSERT INTO product (Product, Product_Name, Product_Gender, Product_Price) VALUES ('$filename', '$Product_Name', '$Product_Gender', '$Product_Price')";

			$result = mysqli_query($connection,$insert) or die(mysqli_error($connection));
			header("location:index.php");

		}

		else
		{
			echo "Error: There was a problem uploading your file. Please try again."; 
		}
	}

	else
	{
		//echo $_FILES['product']['error'];
		print_r($_FILES);
	}
?>