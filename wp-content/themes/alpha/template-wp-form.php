<?php 

/**
 * Template Name: WP Form
 * 
 **/
?>

<?php get_header(); 

if ( have_posts() ) {
	/* Start the Loop */
	while ( have_posts() ) {
		the_post();
		?>
		<div class="main_wrapper wrapper" id="content-wrapper">
		<?php 
		the_content(); ?>
		</div>
	<?php
  }
};
  ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Podio Form</title>
</head>
<body>
<form action="" method="post">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br>
  <label for="last_name">Last Name:</label>
  <input type="text" id="last_name" name="last_name" required><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br>
  <button type="submit">Submit</button>
</form>
</body>
</html> -->


<?php get_footer(); ?>