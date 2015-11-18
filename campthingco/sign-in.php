<?php
/* Check User Script */
session_start();  // Start Session

include 'db.php';
include 'password.php';

if (isset($_POST['email'])) {
	
	// EMAIL - Check & Set 
	if ($_POST['email'] != '' && $_POST['email'] != NULL) {	 
		if (filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)) {
			$email = $_POST['email'];
		} 
		else {
			$error = '<strong>ERROR: </strong>You have entered an invalid Email Address<br />';
			echo $error;
		}
	} 
	else {
		$error = '<strong>ERROR: </strong>Email is a required field.<br />';
		echo $error;
	}
	
	
	
	// PASSWORD - Set
	$password = $_POST['password'];

	
	
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$encryptedPassword = $row["password"];
			if(password_verify($password, $encryptedPassword)){
		
				// Register some session variables!

				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
	
				//echo $_SESSION['fname'];
				header('Location: dashboard.php');
				
				exit(); // Quit the script.
				
			}
		}
	} else {
		echo 'No User Found';
	}
	
	
	
	

}
?>