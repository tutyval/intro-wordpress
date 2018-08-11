<?php
/**
 * Template name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hoteli
 */

get_header(); ?>
<div class="header-image">
<?php
//header image if it's home page
if ( is_front_page() ) :
the_header_image_tag(); 
?>
<div class="header-text">
	<div class="grid-mid">
		<div class="col-6-12">
			<h1><?php echo esc_attr( get_theme_mod( 'header_welcome' ));?></h1>
			<span><?php echo esc_attr( get_theme_mod( 'header_sub_welcome' ));?></span>
		</div>
	</div>
</div>
<?php
endif;
?>
</div> <!--header image -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			

				get_template_part( 'sections/welcome');
				get_template_part( 'sections/hoteli','rooms');
				get_template_part( 'sections/hoteli','features');
				get_template_part( 'sections/blog');
				get_template_part( 'sections/contact');
				
			?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
