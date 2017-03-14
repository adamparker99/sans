<?php include('header.php'); // Display Header ?>
        
<?php
// Simple Movie Collection

echo '<h2>Simple Movie Collection</h2>';
echo '<p>';
echo '<h3>All Movies</h3>'

?>

<table>
  <tr>
    <th></th>
    <th></th>
    <th>Title</th>
    <th>Format</th>
    <th>Length</th>
    <th>Release Year</th>
    <th>Rating</th>
  </tr>
<?php 
  $query = "SELECT * FROM movies ORDER BY title";
  $result = $db->query($query);
  while ($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><a href="<?php echo $_SERVER['PHP_SELF']; echo '?id=';  echo $row['id']; ?>">EDIT</a></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF']; echo '?action=delete&id=';  echo $row['id']; ?>">DELETE</a></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['format']; ?></td>
    <td><?php echo $row['length']; ?></td>
    <td><?php echo $row['releaseYear']; ?></td>
    <td><?php echo $row['rating']; ?></td>
  </tr>
<?php
  } // end: while
?>
</table>

<?php include('addEditMovie.php'); // Display addMovie page ?>

<?php // Display Footer ?>
