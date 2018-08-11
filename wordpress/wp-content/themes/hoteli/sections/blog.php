
<?php if ( true == get_theme_mod( 'blog_switch', true ) ) : 

$postsno = get_theme_mod('posts_number');
//check if number of posts is set, if not, set it to 3
if(!empty($postsno)) { 
	$pn = get_theme_mod('posts_number');
 } else {
	$pn = 3;
}

?>

	<div class="entry-content">

	<div class="section even">
	<div class="grid-mid">
		<div class="section_title">
		<span><?php echo esc_attr( get_theme_mod( 'blog_subheading' ));?></span>
		<h1><?php echo esc_attr( get_theme_mod( 'blog_heading' ));?></h1>
		
		</div>

		<?php 
	
		// The Query
		$args = array(
			'post_type' => 'post',
			'posts_per_page'  => $pn,
			);
		$feature = new WP_Query( $args );

	// The Loop
		if ( $feature->have_posts() ) {
			
				while ( $feature->have_posts() ) { ?>
					<div class="col-4-12">
					<div class="blog-item">
					<?php $feature->the_post();
	if ( has_post_thumbnail() ) { ?>
		<div class='post-thumb'>
				<a href="<?php the_permalink();?>" >
				<?php the_post_thumbnail('hoteli-feature-thumbnail'); ?>
				</a>
		</div>

		<?php } ?>
		<div class="contents">
		<?php hoteli_posted_on(); ?>
		<?php the_title('<h2 class="entry-title">', '</h2>'); ?>

		<a class="cont" href="<?php esc_url(the_permalink()); ?>"> <?php echo esc_attr('Continue &#8594;', 'hoteli');?></a>
		</div>
				
 
 	  <?php 
 	  echo "</div></div>";
 	  } } else { }  
		
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
		


	</div><!-- End Grid -->
	</div><!-- End Section -->
	
	</div><!-- .entry-content -->
<?php else: endif; ?>