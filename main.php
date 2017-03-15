<?php include('header.php'); // Display Header ?>

<div class="container">
<br/><br/><br/><br/> 
<div class="row">
  <div class="col-md-3" bgcolor="#FF0099">
    <div class="panel panel-primary">
        <?php include('addEditMovie.php'); // Display addMovie page ?>    
    </div>  
  </div>
  <div class="col-md-9">
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>Title</th>
          <th>Format</th>
          <th>Length</th>
          <th>Release Year</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Get list of movies from database
        $query = "SELECT * FROM movies ORDER BY title";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
            $hours = floor($row['length'] / 60);
            $minutes = $row['length'] % 60;
        ?>
        <tr>
          <td><a href="<?php echo $_SERVER['PHP_SELF']; echo '?action=edit&id=';  echo $row['id']; ?>">edit</a></td>
          <td><a href="<?php echo $_SERVER['PHP_SELF']; echo '?action=delete&id=';  echo $row['id']; ?>">delete</a></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['format']; ?></td>
          <td><?php echo $hours . " hrs " . $minutes . " min"; ?></td>
          <td><?php echo $row['releaseYear']; ?></td>
          <td><?php echo $row['rating']; ?></td>
        </tr>
        <?php
          } // end: while
        ?>

      </tbody>
    </table>
  </div>
</div>





</div>

<?php // Display Footer ?>
