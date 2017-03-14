<?php // *** Add/Edit Movie *** // ?>

<?php 
    

    if ($getID > 0){
        echo "<h3>Edit Movie</h3>";
    }
    else{
        echo "<h3>Add a Movie</h3>";
    }
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="hidden" name="id" value="<?php echo $editID; ?>" />
<p>Title: <input type="text" name="title" value="<?php echo $editTitle; ?>"/></p>
<p>Format: <select name="format">
        <option value="DVD" <?php if($editFormat == "DVD"){echo "SELECTED";} ?>>DVD</option>
        <option value="VHS" <?php if($editFormat == "VHS"){echo "SELECTED";} ?>>VHS</option>
        <option value="Streaming" <?php if($editFormat == "Streaming"){echo "SELECTED";} ?>>Streaming</option>
</select> </p>
<p>Length: <input type="number" name="length" value="<?php echo $editLength; ?>"/></p>
<p>Release Year: <input type="number" name="releaseYear" value="<?php echo $editReleaseYear; ?>"/></p>
<p>Rating: <input type="radio" name="rating" value="1" <?php if($editRating == "1"){echo "Checked";} ?>/> 1
           <input type="radio" name="rating" value="2" <?php if($editRating == "2"){echo "Checked";} ?>/> 2
           <input type="radio" name="rating" value="3" <?php if($editRating == "3"){echo "Checked";} ?>/> 3
           <input type="radio" name="rating" value="4" <?php if($editRating == "4"){echo "Checked";} ?>/> 4           
           <input type="radio" name="rating" value="5" <?php if($editRating == "5"){echo "Checked";} ?>/> 5
           </p>

<?php 
    if ($getID > 0){
        echo '<input type="submit" name="action" value="Edit Movie"/>';
    }
    else{
        echo '<input type="submit" name="action" value="Add Movie"/>';
    }
?>
           
</form>