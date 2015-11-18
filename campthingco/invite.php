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
            <a class="navbar-brand" href="index.php"><img src="images/campthing_logo_white.png" height="30" /></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="dashboard.php">Dashboard</a></li>
              	<li class=""><a href="search.php">Search For Camps</a></li> 
					<li class=""><a href="invite.php">Invite Buddies</a></li>
					<li class=""><a href="#">Map It</a></li>
					<li class=""><a href="logout.php">Log Out</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="fa fa-commenting"></i></a></li>
					<li id="alerts" class="activeAlerts"><a href="#"><i class="fa fa-flag"></i></a>
						<ul id="alertMenu">
							<li class="activeAlert"><i class="fa fa-smile-o"></i> Carole Brady accepted your invitation!</li>
							<li class="activeAlert"><i class="fa fa-smile-o"></i> John Smith accepted your invitation!</li>
							<li class="activeAlert"><i class="fa fa-smile-o"></i> Janice Lane would like to connect!</li>
							<li class="activeAlert"><i class="fa fa-smile-o"></i> Brittany Spears signed up for horse camp!</li>
						</ul> 
					</li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div>

    <div id="main" class="container">
		
		<? if ( $_SESSION['error'] != "" ){
			echo '<div class="row"><div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div></div>';
		}
		?>
		
		<div class="row">
			<div class="col-md-12">					
				<div id="inviteBuddies">
					<form name="invite" id="invite" method="post" action="sendInvites.php">
						
						<p>You can invite your kid's buddies by sending parents an email.  Separate multiple email addresses with commas.  Example: joe@yahoo.com, angie@gmail.com.</p>
						
						<textarea id="emailList" class="form-control" name="emailList" rows="3" placeholder="email@example.com, email2@example.com"></textarea>
						<br />
						<textarea id="message" class="form-control" name="message" rows="4" value="I joined CampThing.co and you should too!  Then our kids can go to camps together.  Just go to: http://www.campthing.co/ to register!">I joined CampThing.co and you should too!  Then our kids can go to camps together.  Just go to: http://www.campthing.co/ to register!</textarea>		
						<br />
						<button type="submit" id="inviteSubmit" class="btn btn-primary">Send</button>
					</form>
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
	
	$('#alerts a').click(function(){
		$('#alertMenu').toggle();
		$('#alertMenu').removeClass('activeAlerts');
	});	
    </script>
  </body>
</html>