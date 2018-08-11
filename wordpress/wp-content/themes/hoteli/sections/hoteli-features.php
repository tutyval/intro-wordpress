
<?php if ( true == get_theme_mod( 'features_switch', true ) ) : ?>

	<div class="entry-content">

	<div class="section">
	<div class="grid-mid">
		<div class="section_title">
		<span><?php echo esc_attr( get_theme_mod( 'sub_heading' ));?></span>
		<h1><?php echo esc_attr( get_theme_mod( 'heading' ));?></h1>
		
		</div>

		<?php
		$one = esc_attr( get_theme_mod( 'feature-1' )); 
		$two = esc_attr( get_theme_mod( 'feature-2' ));
		$three = esc_attr( get_theme_mod( 'feature-3' ));
		?>

		<?php 
	
		// The Query
		$args = array(
			'post_type' => 'page',
			'post__in' => array($one,$two,$three),
			'orderby' => 'post__in',
			);
		$feature = new WP_Query( $args );

	// The Loop
		if ( $feature->have_posts() ) {
			
				while ( $feature->have_posts() ) { ?>
					<div class="col-4-12">
					<?php $feature->the_post();
	if ( has_post_thumbnail() ) { ?>
		<div class='post-thumb'>
				<a href="<?php the_permalink();?>" >
				<?php the_post_thumbnail('hoteli-feature-thumbnail'); ?>
				</a>
		</div>
		<?php } ?>
		<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
		<p><?php  echo hoteli_excerpt(21); ?></p>

		<a class="read_more" href="<?php esc_url(the_permalink()); ?>"> <?php echo esc_html('Read More', 'kickstart-business');?></a>
				
 
 	  <?php 
 	  echo "</div>";
 	  } } else { }  
		
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
		


	</div><!-- End Grid -->
	</div><!-- End Section -->
	
	</div><!-- .entry-content -->
<?php else: endif; ?>