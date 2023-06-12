<?php
	$fullName = $_POST['fullName'];
	$username = $_POST['username'];
	$email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
	$password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
	$gender = $_POST['gender'];

	// Database connection
	$conn = new mysqli('localhost','root','','test1');
	if($conn->connect_error)
	{
		// echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} 
	else 
	{
		$stmt = $conn->prepare("insert into register(fullName, username,  email, phoneNumber, password, confirmPassword , gender) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $fullName, $username, $email, $phoneNumber, $password, $confirmPassword, $gender);
		$stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>