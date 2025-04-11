<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content afters
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
			<div class="row gx-xxl-5">
				<div class="col-xxl-4">
					<div class="row gx-xl-5 align-items-center">
						<div class="col-12 col-lg-4 order-lg-1 col-xxl-12 order-xxl-0">
							<div class="footer-logo mb-4">
								<?php the_custom_logo(); ?>
							</div>
						</div>
						<div class="col-12 col-lg-8 col-xxl-12">
							<?php if( get_field('desc','option') ): ?>
								<div class="footer-description">
									<?php echo get_field('desc','option') ?>
								</div>
							<?php endif ?>
							<div class="footer-copyright">
								<span>&copy; <?php echo date("Y").' '.get_bloginfo().' All Rights Reserved.'; ?></span>
							</div>
						</div>
					</div>
					<hr class="footer-hr d-xxl-none">
				</div>
				<div class="col-xxl-8">
					<div class="row gx-xxl-5">
						<div class="col-lg-5">
							
							<?php if( have_rows('areas','option') ): ?>
								<h6 class="h5 mb-3">Areas We Serve in Texas</h6>
								<ul class="footer-list-inline">
									<?php while( have_rows('areas','option') ): the_row(); ?>
										<?php if( get_sub_field('area') ): ?>
											<li><?php echo get_sub_field('area'); ?></li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							
							<?php if( have_rows('states','option') ): ?>
								<h6 class="mb-3">We also serve several areas within <a href="<?php echo esc_url(get_permalink(550)); ?>">Louisiana</a> including:</h6>
								<ul class="footer-list-inline">
									<?php while( have_rows('states','option') ): the_row(); ?>
										<?php if( get_sub_field('state') ): ?>
											<li><?php echo get_sub_field('state'); ?></li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<hr class="footer-hr d-lg-none">
						</div>
						<div class="col-lg-4">
							<h6 class="h5 mb-3">Foundation Repair Services</h6>
							
							<?php
							wp_nav_menu( array(
								'menu' => '4',
								'menu_class' => 'footer-list service-list'
							));
							?>
							
							<h6 class="h5 mb-3 mt-3">Resources</h6>
							<ul class="footer-list">
								<li><a href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) )); ?>">Foundation Repair Blog</a></li>
							</ul>							
							<hr class="footer-hr d-lg-none">
						</div>
						<div class="col-lg-3">
							<h6 class="h5 mb-3">Get In Touch</h6>
							
							<ul class="footer-list-icon fa-ul">
								<?php if( get_field('phone','option') ): ?>
									<?php $phone = str_replace(array('.'), '' , get_field('phone','option')) ?>
									<li>
										<a href="<?php echo 'tel:'.$phone ?>">
										<span><i class="fa fa-phone"></i></span>
										
											<?php echo get_field('phone','option') ?>
										</a>
									</li>
								<?php endif ?>
								
								<?php if( get_field('email','option') ): ?>
									<?php $email = get_field('email','option') ?>
									<li>
										<a href="<?php echo 'mailto:'.$email ?>">
										<span><i class="fa fa-envelope"></i></span>
										
											<?php echo get_field('email','option') ?>
										</a>
									</li>
								<?php endif ?>
								
								<?php if( have_rows('social','option') ): ?>
									<?php while( have_rows('social','option') ): the_row(); ?>
										<?php if( get_sub_field('icon') && get_sub_field('url') ): ?>
											<li>
												<a href="<?php echo esc_url(get_sub_field('url')) ?>">
												<span><?php echo get_sub_field('icon') ?></span>
												
													<?php echo get_sub_field('platform') ?>
												</a>
											</li>
										<?php endif; ?>
									<?php endwhile ?>	
								<?php endif ?>
							</ul>
						</div>
					</div>
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
</div><!-- #wrapper-footer. -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

