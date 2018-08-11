<?php
/**
 *
 * @package Onsen
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
    <section class="section section-page-title" <?php if(get_theme_mod('onsen_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('onsen_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
		<div class="overlay">
			<div class="container">
				<div class="section-title">
					<div class="gutter">
						<h4><?php echo esc_html(get_theme_mod('onsen_blog_page_title')); ?></h4>
						<p><?php echo esc_html(get_theme_mod('onsen_blog_subtitle')); ?></p>				
					</div>
				</div>
			</div> <!--  END container  -->
		</div> <!--  END overlay  -->
	</section> <!--  END section-page-title  -->
	<div class="section section-blog">
		<div class="container">
			<div class="blog-columns clearfix">					
				<div class="inner-page-container left">
					<div class="gutter">
						<article class="single-post">
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="article-image">
								<?php the_post_thumbnail('featured'); ?>
							</div>						
							<?php endif; ?>	
							<div class="article-text">
								<h2><?php the_title(); ?></h2>
								<p class="meta"><span class="meta-auth"><?php the_author(); ?></span> <span class="meta-categ"><?php the_category(', '); ?></span></p>
								<?php the_content(); ?>
								<p class="tags"><?php the_tags(); ?></p>
							</div>
							<p><?php posts_nav_link(); ?></p>
							<div class="padinate-page"><?php wp_link_pages(); ?></div> 	
							<div class="comments">
								<?php comments_template(); ?>
							</div>								
						</article>
					</div>
				</div>
				<div class="sidebar-container right">
					<div class="gutter">
						<?php  get_sidebar(); ?>
					</div>
				</div>				
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-blog  -->
<?php endwhile; ?>
<?php get_footer(); ?>