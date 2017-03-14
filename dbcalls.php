<?php //*** Database Calls ***// 

    //assign form inputs
    $getID = $_GET['id'];
    $id = $_POST['id'];
    $action = $_POST['action'];
    $title = $_POST['title'];
    $format = $_POST['format'];
    $length = $_POST['length'];
    $releaseYear = $_POST['releaseYear'];
    $rating = $_POST['rating'];


  // validate inputs
  
  // Insert new movie into database
  if ( $action == "Add Movie" ) {
      
      // add movie into database
      $query = "INSERT INTO movies (title, format, length, releaseYear, rating) 
                VALUES ('$title', '$format', $length, $releaseYear, $rating)";
                
      $result = $db->query($query);
      //$db->disconnect();
      $message = "$title has been successfully added.";
      
  }
  
  // Update database with edit changes
  elseif ( $action == "Edit Movie"){
      
      // update movie 
      $query = "UPDATE movies SET title='$title', format='$format', length=$length, releaseYear=$releaseYear, rating=$rating
                WHERE id=$id";
                
      $result = $db->query($query);
      //$db->disconnect();
      $message = "$title has been successfully updated.";   
      
  }
  
  elseif (!isset($action)){
      
       echo "nothing happened";
      
  }
  
  else {
      
      $error = true; // input validation failed
      
  }
      
      
  // Get info from database and display in edit fields
  
  if ($getID > 0){
    $editQuery = "SELECT * FROM movies WHERE id=$getID";
    $editResult = $db->query($editQuery);
    while ($editRow = $editResult->fetch_assoc()) {
        $editID = $editRow['id'];
        $editTitle = $editRow['title'];
        $editFormat = $editRow['format'];
        $editLength = $editRow['length'];
        $editReleaseYear = $editRow['releaseYear'];
        $editRating = $editRow['rating'];
    }
  }
  
  
?>