<?php //*** Database Calls ***// 

    //assign form inputs
    $getID = $_GET['id'];
    $getAction = $_GET['action'];
    $id = $_POST['id'];
    $action = $_POST['action'];
    $title = $_POST['title'];
    $format = $_POST['format'];
    $length = $_POST['length'];
    $releaseYear = $_POST['releaseYear'];
    $rating = $_POST['rating'];


  // validate inputs
  if (isset($length) && ($length <= 0 || $length >= 500)){
    echo "<span style='color:red'>Error! Length must be greater than 0 and less than 500</span>";
  }
  elseif (isset($releaseYear) && ($releaseYear <= 1800 || $releaseYear >= 2100)){
    echo "<span style='color:red'>Error! Release Year must be greater than 1800 and less than 2100</span>";
  }
  else {
  
      // Insert new movie into database
      if ( $action == "Add Movie" ) {
          
          // add movie into database
          $query = "INSERT INTO movies (title, format, length, releaseYear, rating) 
                    VALUES ('$title', '$format', $length, $releaseYear, $rating)";
                    
          $result = $db->query($query);
          $message = "$title has been successfully added.";
          
      }
      
      // Update database with edit changes
      elseif ( $action == "Edit Movie"){
          
          // update movie 
          $query = "UPDATE movies SET title='$title', format='$format', length=$length, releaseYear=$releaseYear, rating=$rating
                    WHERE id=$id";
                    
          $result = $db->query($query);
          $message = "$title has been successfully updated.";   
          
      }
      
      // Delete movie from database
      elseif ( $getAction == "delete"){
          $query = "DELETE FROM movies WHERE id=$getID";
          $result = $db->query($query);
          $message = "Your movie has been successfully deleted.";
          
      }
      
      elseif (!isset($action)){
          
           // echo "Display All Movies";
          
      }
      
      else {
          
          $error = true; // input validation failed
          
      }
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