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
			<div class="row gx-xxl-5 justify-content-between">
				<div class="col-md-4 col-lg-4 order-md-2 col-xl-3 mb-4 mb-lg-0">
					<h6 class="h5">Contact Us</h6>
					<ul class="footer-list fa-ul">
						<?php if( get_field('address','option') ): ?>
							<li>
								<span class="fa-li">
									<i class="fa fa-map-marker"></i>
								</span>
								<?php get_template_part( 'partial-templates/address' ); ?>
							</li>
						<?php endif ?>
						
						<?php if( get_field('phone','option') ): ?>
							<?php $phone = str_replace(array('.'), '' , get_field('phone','option')) ?>
							<li>
								<span class="fa-li">
									<i class="fa fa-phone"></i>
								</span>
								<a href="<?php echo 'tel:'.$phone ?>">
									<?php echo get_field('phone','option') ?>
								</a>
							</li>
						<?php endif ?>
						
						<?php if( get_field('email_estimating','option') || get_field('email_office','option') ): ?>
							<?php 
							$email_e = get_field('email_estimating','option');
							$email_o = get_field('email_office','option')  
							?>
							<li>
								<span class="fa-li">
									<i class="fa fa-envelope"></i>
								</span>
								Estimating:
								<a href="<?php echo 'mailto:'.$email?>">
									<?php echo $email_e; ?>
								</a>
								<br>
								Office:
								<a href="<?php echo 'mailto:'.$email?>">
									<?php echo $email_o ?>
								</a>
							</li>
						<?php endif ?>
					</ul>
				</div>
				<div class="col-md-8 col-lg-4 order-md-1 mb-4 mb-lg-0">
					<h6 class="h5"><?php echo get_bloginfo(); ?></h6>
					<p><em><?php echo get_bloginfo('description'); ?></em></p>
					<?php if( get_field('desc','option') ): ?>
						<?php echo get_field('desc','option') ?>
					<?php endif ?>
					<?php if( get_field('license','option') ): ?>
						<strong>License #:</strong> <?php echo get_field('license','option') ?>
					<?php endif ?>
				</div>
				<div class="col-md-12 col-lg-4 order-md-4 order-lg-0 col-xxl-3 align-self-center">
					<div class="footer-logo mx-auto mx-lg-0">
						<?php the_custom_logo(); ?>
					</div>
					<div class="copyright text-center text-lg-start mt-4">
						<span>&copy; <?php echo date("Y").' '.get_bloginfo().' All Rights Reserved.'; ?></span>
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
</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

