<?php
include 'db.php';
include 'password.php';

// Define post fields into simple variables

if (isset($_POST['email'])) {

	$error = NULL;
	
	// FIRST NAME - Check & Set 
	if ($_POST['fname'] != '' && $_POST['fname'] != NULL) {		
		if (filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING) != '') {
			$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
		} 
		else {
			$error = '<strong>ERROR: </strong>You have entered an invalid First Name<br />';
			echo $error;
		}
	} 
	else {
		$error = '<strong>ERROR: </strong>First Name is a required field.<br />';
		echo $error;
	}
	
	// LAST NAME - Check & Set 
	if ($_POST['lname'] != '' && $_POST['lname'] != NULL) {		
		if (filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING) != '') {
			$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
		} 
		else {
			$error = '<strong>ERROR: </strong>You have entered an invalid Last Name<br />';
			echo $error;
		}
	} 
	else {
		$error = '<strong>ERROR: </strong>Last Name is a required field.<br />';
		echo $error;
	}
	
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
	// LAST NAME - Check & Set 
	if ($_POST['zip'] != '' && $_POST['zip'] != NULL) {		
		if (filter_input(INPUT_POST,'zip',FILTER_SANITIZE_STRING) != '') {
			$zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);
		} 
		else {
			$error = '<strong>ERROR: </strong>You have entered an invalid Zip Code<br />';
			echo $error;
		}
	} 
	else {
		$error = '<strong>ERROR: </strong>Zip Code is a required field.<br />';
		echo $error;
	}
	
	
	// PASSWORD - Check & Set 
	if (($_POST['password'] != "") && ($_POST['password'] != NULL)){											// if Password Field is not empty or NULL then...
		if (($_POST['passwordConfirm'] != "") && ($_POST['passwordConfirm'] != NULL)){										// if Confirm Password field is not empty or NULL then...
			if ($_POST['password'] == $_POST['passwordConfirm']){													// if Password and Confirm Password fields match...
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);							// hash the password and set the Password variable
			} else {
				$error = '<strong>ERROR: </strong>Your passwords to not match.<br />';			
				echo $error;
			}
		} else {
			$error = '<strong>ERROR: </strong>Confirm Password is a required field.<br />';
			echo $error;
		}
	} else {
		$error = '<strong>ERROR: </strong>Password is a required field.<br />';
		echo $error;
	}
	
	
	// ERROR CHECKING
	if ($error == NULL){
		
		
		
		$sql = "INSERT INTO users (fname, lname, email, password, zip)
				VALUES ('$fname', '$lname', '$email', '$password', '$zip')";

				if ($conn->query($sql) === TRUE) {
					header('Location: thankyou.php');
				    echo "New record created successfully";
					
				
					
					
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}	

		$conn->close();

	} else {

		include 'index.php'; // Show the form again!
		/* End the error checking and if everything is ok, we'll move on to
		 creating the user account */
		exit(); // if the error checking has failed, we'll exit the script!
	}

}

?>

