<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>


<div class="footer" id="wrapper-footer">
	<div class="footer-inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-8 col-xxl-3">
					<div class="footer-logo mx-auto mx-lg-0">
						<?php the_custom_logo(); ?>
					</div>
					
					<?php if( get_field('desc','option') ): ?>
						<div class="company-description">
							<?php echo get_field('desc.','option') ?>
						</div>
					<?php endif ?>
					
					<div class="copyright">
						<span>&copy; <?php echo date("Y").' '.get_bloginfo().' All Rights Reserved.'; ?></span>
					</div>
				</div>
				<div class="col-lg-4 col-xxl-3">
					<h6>Areas We Serve</h6>
					
					<?php
					
					$the_query = new WP_Query( array(
						'post_type' => 'cities',
						'posts_per_page' => 100, 
						'order' => 'ASC'
					  )
					);
					?>
					
					<ul>
						<?php
						while ( $the_query->have_posts() ) :
							$the_query->the_post();
							$id = get_the_ID();
						?>
							<li id="<?php echo $id ?>"><?php echo get_the_title() ?></li>	
					
						<?php endwhile; wp_reset_postdata(); ?>
					</ul>
					
					<?php if( have_rows('states','option') ): ?>
						<h6>We also serve several other states outside of Texas including:</h6>
						<ul>
							<?php while( have_rows('states','option') ): the_row(); ?>
								<?php if( get_sub_field('state') ): ?>
									<li><?php echo get_sub_field('state'); ?></li>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="col-lg-4 col-xxl-3">
				</div>
				<div class="col-lg-4 col-xxl-3">
				</div>
			</div>
		</div>
	</div>
	<div class="subfooter text-center">
		<div class="container">
			<a href="https://www.construction.marketing/" target="_blank" class="d-block mx-auto text-center" style="max-width:400px;opacity:.33;">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cm-lg.png" class="img-fluid d-none d-lg-inline-block" alt="Construction Marketing Inc." />
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cm-sm.png" style="max-width:125px;" class="img-fluid d-lg-none" alt="Construction Marketing Inc." />
			</a>
		</div>
	</div>
</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

