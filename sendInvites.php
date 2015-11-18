<?php
include 'db.php';

// Define post fields into simple variables

if (isset($_POST['emailList'])) {
	
	$error = NULL;
	
	// Email List - Check & Set 
	if ($_POST['emailList'] != '' && $_POST['emailList'] != NULL) {		
		if (filter_input(INPUT_POST,'emailList',FILTER_SANITIZE_STRING) != '') {
			$emailList = filter_input(INPUT_POST, 'emailList', FILTER_SANITIZE_STRING);
		} 
		else {
			$error = '<strong>ERROR: </strong>Please Retry List1<br />';
			echo $error;
		}
	} 
	else {
		$error = '<strong>ERROR: </strong>Please Retry List2<br />';
		echo $error;
	}
	

	// Message - Check & Set 
	if ($_POST['message'] != '' && $_POST['message'] != NULL) {	
		
		if (filter_input(INPUT_POST,'message',FILTER_SANITIZE_STRING) != '') {
			$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
		} 
		else {
			$error = '<strong>ERROR: </strong>Please Retry Message1<br />';
			echo $error;
		}
	} 
	else {
		$error = '<strong>ERROR: </strong>Please Retry Message2<br />';
		echo $error;
	}
	
	
	// ERROR CHECKING
	if ($error == NULL){
		
		$mailTo = $emailList;
		$subject = 'You have been invited to join CampThing!';
		// Add Headers
		$headers = 'From: '.$_SESSION['email']."\r\n".'Reply-To: '.$_SESSION['email']."\r\n".'X-Mailer: PHP/'.phpversion();

		// Send
		mail($mailTo, $subject, $message, $headers);
		
		
	} else {
		
		$_SESSION['error']="There were errors in your form. Please try again.";
		header('Location: invite.php'); // Show the form again!
		
		/* End the error checking and if everything is ok, we'll move on to
		 creating the user account */
		exit(); // if the error checking has failed, we'll exit the script!
	}

}

?>


<?
session_start();  // Start Session
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CampThing Invite Buddies</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic|Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom Styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    

    <div id="header">
      <nav id="topNav" class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" height="30" /></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="dashboard.php">Dashboard</a></li>
              <li class=""><a href="search.php">Search For Camps</a></li>
			  <li class="active"><a href="invite.php">Invite Buddies</a></li>
			  <li class=""><a href="#">Map It</a></li>
			  <li class=""><a href="">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div>

    <div id="main" class="container">
		
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div id="logo">
					<img src="images/logo.png" alt="CampThing Logo" />
				</div>
				
				<div id="inviteBuddiesSuccess" style="display: none;">
					<div class="alert alert-success" role="alert">Your Email Has Been Sent!</div>
				</div>
			</div>					
		</div>
		
    </div>





    </div>
	
	

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
		$('#inviteBuddiesSuccess').fadeIn(2500);
		
		$('.signUpModal').click(function(){
      $('#signUp').fadeIn();
    });
	$('.logInModal').click(function(){
      $('#logIn').fadeIn();
    });
	
    $('#signUpClose').click(function(){
      $('#signUp').fadeOut();
    });
	$('#logInClose').click(function(){
      $('#logIn').fadeOut();
    });
    </script>
  </body>
</html>