<?php
include 'db.php';

// Define post fields into simple variables

if (isset($_POST['fname'])) {

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
	
	
	// User ID - Check & Set 
	if ($_POST['userid'] != '' && $_POST['userid'] != NULL) {		
		if (filter_input(INPUT_POST,'userid',FILTER_SANITIZE_STRING) != '') {
			$userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_STRING);
		} 
		else {
			$error = '<strong>ERROR: </strong>You have entered an invalid User ID<br />';
			echo $error;
		}
	} 
	else {
		$error = '<strong>ERROR: </strong>User ID is a required field.<br />';
		echo $error;
	}
	
	
	
	// ERROR CHECKING
	if ($error == NULL){
		
		
		
		$sql = "INSERT INTO children (fname, userid)
				VALUES ('$fname', '$userid')";

				if ($conn->query($sql) === TRUE) {
					header('Location: dashboard.php');
				    
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}	

		$conn->close();

	}

}

?>

