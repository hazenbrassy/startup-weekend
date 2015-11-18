<?
session_start();  // Start Session
$userId = $_SESSION['id'];
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CampThing Dashboard</title>

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
      <div class="row">
	  	<div id="userRow">
	        <div class="col-md-1">
				<div class="userImg"> <img src="images/camera_icon.png" /> </div>
			</div>
			<div class="col-md-11">
				<div id="userName">
					Jane Doe
				</div>
			</div>
		</div>
	  </div>
	  
	 
	  <div class="col-md-11 col-md-offset-1" id="childSection">
			
			<?
	  	/*
			$query = "SELECT * FROM children WHERE userid='$userId'";
			
			if ($result = $conn->query($query)) {
		*/
			    /* fetch associative array */
				/*
			    while ($row = $result->fetch_assoc()) {
			    */  
					?>
					<div class="row childBlock" id="child0">
							
						<div class="col-sm-2"><div class="childImg"><a class="childImgEdit"><img src="images/add_child.png" height="50" /></a></div></div>
					 	<div class="col-sm-6"><div class="childName">Janice</div></div>
						<div class="col-sm-4">
							<div class="col-xs-6"></div>
							<div class="col-xs-3" class="childCal"><a class="childCalEdit"><i class="fa fa-calendar"></i></a></div>
							<div class="col-xs-3" class="childProf"><a class="childProfEdit"><i class="fa fa-home"></i></a></div>
						</div>
						
						<div style="clear: both;"></div>
						
						<div class="col-md-12">
							<div id="buddiesRow">
							
							<hr />
							
								<div class="col-sm-2">
									<div class="buddiesTitle">BUDDIES</div>
								</div>
								<div class="col-sm-2">
									<div class="addRemoveBuddies">
										<a href="#"><i class="fa fa-plus-square"></i></a>
										<a href="#"><i class="fa fa-minus-square"></i></a>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="buddiesImages">
										<img src="images/friend1.png" height="30" title="Sarah Hunter" />
										<img src="images/friend2.png" height="30" title="Suzie Jeane" />
										<img src="images/friend3.png" height="30" title="Amanda Montroe" />
										<img src="images/friend4.png" height="30" title="Brittany Spears" />
									</div>
								</div>
							</div>
						</div>
					</div>
		
					<?

			  /*  } */

			    /* free result set */
			    // $result->free();
		//	}

			/* close connection */
		//	$conn->close();

  
		  ?>
			

			<button class="btn btn-primary" id="addChild">+ Add Child</button>
			
	
	  </div>
	  
	  
    </div>

<div id="preferences" style="display: none;">
	<div class="title">
		Preferences
	</div>
	<div class="prefGroup">
	<input type="checkbox" class="form-contro" value="Dance" /> Dance
	<input type="checkbox" class="form-contro" value="Horses" /> Horse
	<input type="checkbox" class="form-contro" value="Sports" /> Sports
	<input type="checkbox" class="form-contro" value="Swimming" /> Swimming
	</div>
	
	<div class="title">
		Birthdate
	</title>
	
	<div class="prefGroup">
		<input type="date" name="birthdate" id="birthdate" class="form-control" />
	</div>
	
	<br />
	<button type="submit" id="savePreferences" class="btn btn-warning">Save</button>
	<button id="cancel" class="btn btn-secondary">Cancel</button>
</div>
<!--
    <footer class="footer">
      <div class="container">
        <p class="text-muted"></p>
      </div>
    </footer>
-->


    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
		var childNum = $('.childBlock').length;
    	
		$('#addChild').click(function(){
			$('#addChild').before('<div class="row childBlock" id="child'+childNum+'"><div class="col-sm-2"><div class="childImg"><a class="childImgEdit"><img src="images/add_child.png" height="50" /></a></div></div><div class="col-sm-6"><div class="childName"><input type="name" placeholder="Child\'s Name" class="form-control" /></div></div><div class="col-sm-4"><div class="col-xs-6"></div><div class="col-xs-3" class="childCal"><a class="childCalEdit"><i class="fa fa-calendar"></i></a></div><div class="col-xs-3" class="childProf"><a class="childProfEdit"><i class="fa fa-home"></i></a></div></div><div class="clearfix" style="clear: both;"></div><div class="saveBlock"><div class="col-md-12"><button class="btn btn-warning" id="saveChildBtn" type="submit">Save</button> <button class="btn btn-secondary" id="cancelAdd">Cancel</button></div></div></div>');
			
			$('#child'+childNum+' #cancelAdd').click(function(){		
				$(this).parents('.childBlock').remove();
			});
		});
		
		
		$('.childProfEdit').click(function(){
			$('#preferences').fadeIn();
		});
		$('#cancel').click(function(){
			$('#preferences').fadeOut();
		});
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