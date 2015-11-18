<?
session_start();
session_destroy(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CampThing Log Out Success</title>

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
              <li class=""><a class="logInModal">Login</a>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div>


    <div id="logIn">
      <div id="logInClose">X</div>
       <div class="">
          <div class="logo">
            <img src="images/logo.png" />
          </div>
          <form name="signUpForm" method="post" id="signUpForm" action="dashboard.php">
        
          <div class="form-group">
            <input id="email" class="form-control" type="email" name="email" placeholder="* Email" required />
          </div>
          
          <div class="br">&nbsp;</div>
          
          <div class="form-group">
            <input name="password" type="password" id="password" class="form-control" placeholder="* Password" required />
          </div>
          
          <button id="submit" type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </form>

      </div>
    </div>

    <div id="main" class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div id="logo">
            <img src="images/logo.png" alt="CampThing Logo" />
          </div>

          <div id="logOutText" style="display: none;">
            <div class="alert alert-success" role="alert">You are now logged out!</div>
          </div>

        </div>
      </div>

      
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
   	
	$('.logInModal').click(function(){
      $('#logIn').fadeIn();
    });
	
	$('#logInClose').click(function(){
      $('#logIn').fadeOut();
    });
	
	$('#logOutText').fadeIn(2000);
    </script>
  </body>
</html>