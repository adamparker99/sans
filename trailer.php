<?php //*** Display Trailer ***// ?>

<?php include('header.php'); // Display Header ?>

<?php 
	$trailer = $_GET['trailer'];
?>

<br/><br/><br/>

<div class="container">
  <?php if(!$auth->isLoggedIn()): ?>
      <a class="btn btn-md btn-primary" href="<?php echo $auth->getAuthUrl(); ?>">Sign in with Google</a>
  <?php else: ?>
      You are signed in. <a class="btn btn-md btn-primary" href="logout.php">Sign out</a>
  <?php endif; ?>
</div>

<div class="container">

	<script src="ytembed.js"></script>
	<div id="ytThumbs"></div>
	
	<script>
		ytEmbed.init({'block':'ytThumbs','key':'AIzaSyA5ZZvBKfiSALNlrV0iArNpSmEPRoGJBwI','q':'<?php echo $trailer ?>','type':'search','results':5,'meta':true,'player':'embed','layout':'full'});
	</script>

</div>

<?php include('footer.php'); ?>
