<?php
  $error = false;

  // Connect to the database
  include('dbconnect.php');

  // Database call logic
  include('dbcalls.php');
  
?>



<html>
    <header>
        <title>Adam Movie Manager</title>
    </header>
    <body>
        
<?php

  if ( !empty($message) ) {

    echo '<span style="color:green">',$message,'</span><br><br>',"\n";

    }

?>

<?php

  if ( $error && empty($title) ) {

    echo '<span style="color:red">Error! Please enter a Title.</span><br>',"\n";

  }

?>