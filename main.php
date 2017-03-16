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
          <th><a href="main.php?sort=title">Title</a></th>
          <th><a href="main.php?sort=format">Format</a></th>
          <th><a href="main.php?sort=length">Length</a></th>
          <th><a href="main.php?sort=releaseYear">Release Year</a></th>
          <th><a href="main.php?sort=rating">Rating</a></th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Get list of movies from database
        if (!isset($sortBy)){
          $query = "SELECT * FROM movies ORDER BY title";
        }
        else{
          $query = "SELECT * FROM movies ORDER BY $sortBy";
        }
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

<div class="container">
  <?php if(!$auth->isLoggedIn()): ?>
      <a class="btn btn-md btn-primary" href="<?php echo $auth->getAuthUrl(); ?>">Sign in with Google</a>
  <?php else: ?>
      You are signed in. <a class="btn btn-md btn-primary" href="logout.php">Sign out</a>
  <?php endif; ?>
</div>

<?php include('footer.php'); ?>
