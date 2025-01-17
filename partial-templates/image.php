<?php
/**
 * Partial - Button
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( isset($args['logo']) ):
	$logo = $args['logo'];
else:
	$logo = '';
endif;

$img_rev = isset($args['img_rev']) ? $args['img_rev'] : '';
$add_class = isset($args['add_class']) ? $args['add_class'] : '';
$img_style = $img_stretch = $img_radius = '';
?>

<?php $add_class = isset($args['add_class']) ? $args['add_class'] : ''; ?>

<?php if( have_rows('img') ): ?>
	<?php while( have_rows('img') ): the_row(); ?>
		<?php
		if( get_sub_field('img_radius') ){
			$img_radius = get_sub_field('img_radius');
		}
		if( get_sub_field('img_stretch') ){
			$img_stretch = 'img-stretch';
		}
		if( get_sub_field('img_style') ){
			$img_style = get_sub_field('img_style');
		}
		?>
		
		<?php if( get_sub_field('show_video') && get_sub_field('video')): ?>
			<figure class="wp-block-video <?php echo $img_style.' '.$img_rev.' '.$img_radius.' '.$img_stretch.' '.$add_class; ?>"><video autoplay loop muted src="<?php echo esc_url(get_sub_field('video'))?>" playsinline></video></figure>
		<?php else: ?>
			<?php if( get_sub_field('img') ): ?>
				<?php $img = get_sub_field('img'); ?>
				<div class="img-style-wrapper <?php echo $img_style.' '.$img_rev.' '.$img_radius.' '.$img_stretch.' '.$add_class; ?>">
					<div class="img-wrapper">
						<img src="<?php echo esc_url($img['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($img['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if( get_sub_field('caption') ): ?>
			<div class="caption mt-lg-3 mb-4 mb-lg-0 text-center small">
				<?php echo get_sub_field('caption'); ?>
			</div>
		<?php endif; ?>
		
	<?php endwhile; ?>
<?php endif; ?>
