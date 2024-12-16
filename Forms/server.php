<?php 
	session_start();
	$name = "";
	$company = "";
	$address = "";
	$errors = array();
	$db = mysqli_connect('localhost', 'root', '', 'tables');

	if(isset($_POST['register'])){
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$company = mysqli_real_escape_string($db, $_POST['company']);
		$address = mysqli_real_escape_string($db, $_POST['address']);


		if(empty($name)){
			array_push($errors, "Enter Your name ");
		}
		if(empty($company)){
			array_push($errors, "Enter Your Company Name ");
		}
		if(empty($address)){
			array_push($errors, "Enter Your Address ");
		}
		if(count($errors) == 0){
		$sql = "INSERT INTO form(name, company, address) VALUES('$name', '$company', '$address')";
		$result = mysqli_query($db , $sql);

		
			$_SESSION['success'] = "Successfully Saved";
			header('location:index.php');			
		}
	}






?>