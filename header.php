<?php
  $error = false;

  // Connect to the database
  include('dbconnect.php');
  
  // Database call logic
  include('dbcalls.php');

  // Initialize Session 
  require_once 'app/init.php';

  // Google Sign in setup    
  $db = new DB;
  $googleClient = new Google_Client;
  $auth = new GoogleAuth($db, $googleClient);

  if($auth->checkRedirectCode())
  {
      header('Location: main.php');
  }

  
?>

<html>
    <header>
        <title>Adam's Movie Manager</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles -->
        <link href="home.css" rel="stylesheet">
        
    </header>
    <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Adam's Movie Manager</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($_SERVER['PHP_SELF'] == "/home.php"){echo 'class="active"';} ?> ><a href="home.php">Home</a></li>
            <li <?php if($_SERVER['PHP_SELF'] == "/main.php"){echo 'class="active"';} ?> ><a href="main.php">Movies</a></li>
          </ul>
        </div>
      </div>
    </nav>
    


        
<?php

  if ( !empty($message) ) {

    echo '<br/><br/><br/><div class="alert alert-success" role="alert">',$message,'</div>';

    }

?>

<?php

  if ( $error && empty($title) ) {

    echo '<br/><br/><br/><div class="alert alert-danger" role="alert">Error! Please enter a Title.</div>';

  }

?>