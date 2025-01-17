<?php
/**
 * Partial - Banner
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php

if ( is_front_page() ) :
	$class = "banner-home";
else :
	$class = "banner-interior";
endif;

?>

<?php if( have_rows('banner') ): ?>
<?php while( have_rows('banner') ): the_row(); ?>
	
<?php if ( is_front_page() ) : ?>
	
	<div class="banner <?php echo $class; ?>">
		<div class="banner-inner">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12">
						<?php if( get_sub_field('banner_title') ): ?>
							<h1 class="banner-title mb-0"><?php the_sub_field('banner_title') ?></h1>
						<?php endif; ?>
						
						<?php if( get_sub_field('banner_subtitle') ): ?>
							<h2 class="banner-subtitle"><?php the_sub_field('banner_subtitle') ?></h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php else: ?>
	
	<?php
	$banner_img = get_sub_field('banner_image');
	$banner_img_md = wp_get_attachment_image_src($banner_img['id'], 'medium_large');
	$banner_img_full = wp_get_attachment_image_src($banner_img['id'], 'full');
	?>
	
	<div class="banner <?php echo $class; ?>" style="background-image:url(<?php echo $banner_img_full[0]; ?>)" data-img-md="<?php echo $banner_img_md[0]; ?>" data-img-full="<?php echo $banner_img_full[0]; ?>">
	
	<div class="banner-inner">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12">
						<?php if( get_sub_field('banner_title') ): ?>
							<h1 class="banner-title mb-0"><?php the_sub_field('banner_title') ?></h1>
						<?php endif; ?>
						
						<?php if( get_sub_field('banner_subtitle') ): ?>
							<h2 class="banner-subtitle"><?php the_sub_field('banner_subtitle') ?></h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php endwhile; ?>
<?php endif; ?>