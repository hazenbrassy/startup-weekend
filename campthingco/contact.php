<?php
// Start the session
session_start();


if( isset($_POST['email']) && $_POST['subject'] == '' ) {

	$error = False;
	
	// ==========
	// Set MailTo
	// ==========

	$mailTo = 'dustin@thepacksolution.com,sarah@thepacksolution.com';
	
	// ================
	// Set Subject Line
	// ================

	$subject = 'Pack Solutions - Join The Pack';
	
	// ==================
	// Set Lead Variables
	// ==================

	$fname 		= $_POST['fname'];
	$lname 		= $_POST['lname'];
	$email 		= $_POST['email'];
	$phone 		= $_POST['phone'];
	$skillSet 	= $_POST['skillSet'];
	$comments	= $_POST['comments'];
	
	// ====================================
	// Validate and Sanitize Lead Variables
	// ====================================

	// First Name - Check & Set
	if ( $fname != "" ) {
		if ( filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING) != "" ) {
			$fname = filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING);	
		} else {
			$fname = NULL;
			$error = True;
		}
	} else {
		$fname = NULL;
		$error = True;		
	}

	// Last Name - Check & Set
	if ( $lname != "" ) {
		if ( filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING) != "" ) {
			$lname = filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING);	
		} else {
			$lname = NULL;
			$error = True;
		}
	} else {
		$lname = NULL;
		$error = True;		
	}
	
	// Email - Check & Set
	if ( $email != "" ) {
		if ( filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING) != "" ) {
			$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
			if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
				$email = NULL;
				$error = True;
			}
		} else {
			$email = NULL;
			$error = True;
		}
	} else {
		$email = NULL;
		$error = True;		
	}

	// Phone - Check & Set
	if ( $phone != "" ) {
		if ( filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT) != "" ) {
			$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
		} else {
			$phone = NULL;
		}
	} else {
		$phone = NULL;
	}

	// Skill - Check & Set
	if ( $skillSet != "" && $skillSet != NULL ) {
		if ( filter_input(INPUT_POST, 'skillSet', FILTER_SANITIZE_STRING) != "" ) {
			$skillSet = filter_input(INPUT_POST, 'skillSet', FILTER_SANITIZE_STRING);
		} else {
			$skillSet = NULL;
			$error = True;
		}
	} else {
		$skillSet = NULL;
		$error = True;
	}
	
	// Comments - Check & Set
	if ( $comments != "" ) {
		if ( filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING) != "" ) {
			$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
		} else {
			$comments = NULL;
		}
	} else {
		$comments = NULL;
	}

	// ====================================
	// Check For Errors and Redirect
	// ====================================

	if( $error == True ){
		$_SESSION["error"] = "Please enter all required fields.";
		header("location: contactus.php");
		
		exit();
	}
	
	// ====================================
	// No Errors: Continue
	// ====================================	
	
	// Create Message
	$message = "New Pack Member: \n\n";
	$message .= "First Name: ".$fname."\n";
	$message .= "Last Name: ".$lname."\n";
	$message .= "Email: ".$email."\n";
	$message .= "Phone: ".$phone."\n";
	$message .= "Skill: ".$skillSet."\n";
	$message .= "Comments: ".$comments."\n";
	
	// Add Headers
	$headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n".'X-Mailer: PHP/'.phpversion();

	// Send
	mail($mailTo, $subject, $message, $headers);	

} else {
	
	$_SESSION["error"] = "There were errors processing your form.  Please try again.";
	header("location: contactus.php");

	exit();	
	
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pack Solutions | Thank You</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	
	<style>
		body {padding-top: 10px;}
		#message {text-align: center; display: none;}
	</style>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="/"><img src="/images/logo.jpg" alt="Pack Solutions Logo" width="100%" /></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2" id="message">
				<div class="alert alert-success"><h2>Welcome To The Pack!</h2></div>
			</div>
		</div>
	</div>
  
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
	
	<script>
		$(document).ready(function(){
			$('#message').fadeIn(2500);
		});
	</script>
	
  </body>
</html>
