<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pack Solutions</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic|Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom Styles -->
    <style>
		#logo img {
			width: 100%;
			max-width: 864px;
		}
		#main {
			margin-bottom: 40px;
		}
	</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div id="main" class="container">
    	<div id="logo">
			<img src="images/logo.jpg" />
		</div>
		
		<? 
			if ( $_SESSION['error'] != "" ) {
				echo '<div id="errorMsg" class="alert alert-danger" role="alert" style="display: none;">' . $_SESSION['error'] . '</div>';
				session_unset();
				
			}
		?>
		
		<form name="contactUs" id="contactUs" action="contact.php" method="post">
		
			<div class="form-group">
				<label for="fname"><span style="color: #cc0000">*</span> First Name:</label>
				<input type="text" name="fname" lname="fname" class="form-control" placeholder="First Name" required />
			</div>
			
			<div class="form-group">
				<label for="lname"><span style="color: #cc0000">*</span> Last Name:</label>
				<input type="text" name="lname" lname="lname" class="form-control" placeholder="Last Name" required />
			</div>
			
			<div class="form-group">
				<label for="email"><span style="color: #cc0000">*</span> Email:</label>
				<input type="email" name="email" lname="email" class="form-control" placeholder="Email" required />
			</div>
			
			<div class="form-group">
				<label for="phone">Phone:</label>
				<input type="tel" name="phone" lname="phone" class="form-control" placeholder="Phone" />
			</div>
			
			<div class="form-group">
				<label for="skillSet"><span style="color: #cc0000">*</span> Skill:</label>
				<select name="skillSet" id="skillSet" class="form-control" required >
					<option value="Developer">Developer</option>
					<option value="Designer">Designer</option>
					<option value="Marketer">Marketer</option>
					<option value="Business Planner">Business Planner</option>
					<option value="Other">Other</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="comments">Comments:</label>
				<textarea name="comments" id="comments" class="form-control" rows="3"></textarea>
			</div>
			
			<button type="submit" class="btn btn-primary">Send</button> <button type="reset" class="btn btn-secondary">Reset</button>
			
		</form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
    	if ( $('#errorMsg').length > 0 ){
			$('#errorMsg').fadeIn(2000);
		}
    </script>
  </body>
</html>