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
    <title>CampThing Search</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- jQuery UI -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	
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
						</ul>
					</li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div>

    <div id="main" class="container">

		<div class="col-sm-3">
			<div id="campFilters">
				
				<button id="showFilters" class="btn btn-secondary">Show Filters</button>
				
				<div id="filters">
				<h3>Filters</h3>
				
				<div id="priceFilter">
					<label for="amount">Price:</label>
					<input type="text" id="amount"name="age" readonly style="border:0; color:#f6931f; font-weight:bold;">
					<div id="slider-range"></div>
				</div>
				
				<hr />
				
				<div id="ageFilter">
					<label for="age">Age:</label>
					<input type="text" id="age" name="age" readonly style="border:0; color:#f6931f; font-weight:bold;">
					<div id="slider-range2"></div>
				</div>
				
				<hr />
				
				<div id="dateFilter1">
					<label for="dateRangeFrom">Date From:</label>
					<input type="date" name="dateRangeFrom" id="dateRangeFrom" class="form-control" />
				</div>
				
				<div id="dateFilter2">
					<label for="dateRangeTo">Date To:</label>
					<input type="date" name="dateRangeTo" id="dateRangeTo" class="form-control" />
				</div>
				
				<hr />
				
				<div id="timeFrameFilter">
					<label for="timeFrame">TimeFrame:</label>
					<select name="timeFrame" id="timeFrame" class="form-control">
						<option>All-Day</option>
						<option>Half-Day</option>
						<option>Morning</option>
						<option>Evening</option>
					</select>
				</div>
				
				<hr />

				<div id="distanceFilter">
					<label for="distance">Distance:</label>
					<select name="distance" id="distance" class="form-control">
						<option>25 miles</option>
						<option>50 miles</option>
						<option>75 miles</option>
						<option>100 miles</option>
						<option>Any Distance</option>
					</select>
					
					<label for="zip">From:</label>
					<input type="text" name="zip" id="zip" class="form-control" />
				</div>
				
				<hr />
				
				<div id="categoryFilter">
					<label for="categories">Filter Categories</label>
					<div id="categories">
						<input type="checkbox" /> Crochet <br />
						<input type="checkbox" /> Dance <br />
						<input type="checkbox" /> Horse <br />
						<input type="checkbox" /> Sports <br />
					</div>
				</div>
				
				<br />
				
				<button id="applyFilters" class="btn btn-secondary">Apply Filters</button>
				
				</div>
				
			</div>
		</div>
		
		<div class="col-sm-9">
			<div id="campResults">
				
				<h1>SEARCH FOR CAMPS</h1>
				
				<div class="row">
					<div class="col-md-12">
						<div class="input-group">
		  					<input name="search" id="search" type="text" class="form-control" placeholder="Search..." aria-describedby="basic-addon2">
							<span class="input-group-addon" id="basic-addon2">Search</span>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<div id="sortBy">
							<select name="sort" id="sort" class="form-control">
								<option>Sort By</option>
								<option>Date</option>
								<option>Distance</option>
								<option>Friends</option>
								<option>Name</option>
								<option>Price</option> 
							</select>
						</div>
					</div>
				</div>
			<?
		  	
				$query = "SELECT * FROM camps";
				
				if ($result = $conn->query($query)) { 
				
				    /* fetch associative array */
				    while ($row = $result->fetch_assoc()) {
				        
						?>
							<div class="campBlock row">
								<div >
								<div class="col-sm-2">
									<div class="campImg">
										<img src="images/<?=$row['image']?>" />
									</div>
								</div>
								
								<div class="col-sm-10">
								
									<div class="col-md-12">
										<div class="title"><a href="#"><?=$row['name']?>, <?=$row['location']?></a></div>
									</div>
									
									<div class="col-md-10">
										<div class="col-md-12">
											<div class="description">
												<?=$row['description']?>
											</div>
										</div>
										<div class="col-md-4">
											<div class="dateRange">
												<?=$row['date_range']?>
											</div>
										</div>
										<div class="col-md-4">
											<div class="price">
												<?=$row['price']?>
											</div>
										</div>
										<div class="col-md-4">&nbsp;</div>
										
										<div class="col-sm-6">
											<div class="stars">
												<img src="images/<?=$row['stars']?>.png" height="15" />
											</div>
										</div>
										<div class="col-sm-6">
											<a href="#">Reviews...</a>
										</div>
										
									</div>
									
									<div class="col-md-2">
										<div class="addThis">
											<a href="#"><i class="fa fa-plus-square"></i></a>
											<? if ( $row['friends'] == "1"){ ?>
												<div class="friends">
													<img src="images/friend1.png" height="20" title="Sarah Hunter" />
													<img src="images/friend2.png" height="20" title="Suzie Jeane" />
													<img src="images/friend3.png" height="20" title="Amanda Montroe" />
													<img src="images/friend4.png" height="20" title="Brittany Spears" />
												</div>
											<?	} ?>
												
										</div>
									</div>
									
									
								</div>
								
								</div>
							</div>
						<?
	
				    }
	
				    /* free result set */
				    $result->free();
				}
	
				/* close connection */
				$conn->close();
	
	  
			?>
			</div>
			
    	</div>
	</div>
	
	

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
  		$(function() {
		    $( "#slider-range" ).slider({
		      	range: true,
			    min: 0,
			    max: 500,
			    values: [ 75, 300 ],
		      	slide: function( event, ui ) {
			        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			    }
		    });

		    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
			
			$( "#slider-range2" ).slider({
		      	range: true,
			    min: 0,
			    max: 18,
			    values: [ 5, 8 ],
		      	slide: function( event, ui ) {
			        $( "#age" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			    }
		    });

		    $( "#age" ).val( $( "#slider-range2" ).slider( "values", 0 ) + " - " + $( "#slider-range2" ).slider( "values", 1 ) );
		});
		
		$('#showFilters').click(function(){
			$('#filters').toggle('slow');
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