<h3>Add a Movie</h3>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p>Title: <input type="text" name="title"/></p>
<p>Format: <select name="format">
        <option value="DVD">DVD</option>
        <option value="VHS">VHS</option>
        <option value="Streaming">Streaming</option>
</select> </p>
<p>Length: <input type="number" name="length"/></p>
<p>Release Year: <input type="number" name="releaseYear"/></p>
<p>Rating: <input type="radio" name="rating" value="1"/> 1
           <input type="radio" name="rating" value="2"/> 2
           <input type="radio" name="rating" value="3"/> 3
           <input type="radio" name="rating" value="4"/> 4           
           <input type="radio" name="rating" value="5"/> 5
           </p>
           
    <input type="submit" name="addMovie" value="Add Movie"/>       
</form>