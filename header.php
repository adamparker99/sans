<?php
  include('dbconnect.php');
  
  $error = false;
  
  // this runs only when a user hits "Add Movie"
  if (isset($_POST['addMovie'])){
      
      //assign form inputs
      $id = $_POST['id'];
      $title = $_POST['title'];
      $format = $_POST['format'];
      $length = $_POST['length'];
      $releaseYear = $_POST['releaseYear'];
      $rating = $_POST['rating'];
      
  // validate inputs
  
  if ( !empty($title) ) {
      
      // add movie into database
      $query = "INSERT INTO movies (title, format, length, releaseYear, rating) 
                VALUES ('$title', '$format', $length, $releaseYear, $rating)";
                
      $result = $db->query($query);
      //$db->disconnect();
      $message = "$title has been successfully added.";
      
  }
  
  else {
      
      $error = true; // input validation failed
      
  }
      
      
  }
  
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