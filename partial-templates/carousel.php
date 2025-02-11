<?php
/**
 * Partial - Carousel
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
}
 
$add_class = '';
if (!empty($block['className'])) {
	$add_class = $block['className'];
} elseif (! empty($args['class'] )){
	$add_class = $args['class'];
}

?>

<?php if( have_rows('carousel') ): ?>
	<?php while( have_rows('carousel') ): the_row(); ?>
		
		<?php
		$gallery = get_sub_field('gallery');
		$id = substr(str_shuffle("0123456789"), 0, 5);
		?>
		
		<?php if( $gallery != '' ): ?>
			<div  <?php echo esc_attr( $anchor ); ?> class="carousel-wrapper <?= $add_class; ?>">
				<div id="carousel_<?php echo $id; ?>" class="carousel slide carousel-fade" data-bs-ride="carousel">
					<div class="carousel-indicators">
						<?php $i = 0; ?>
						<?php foreach( $gallery as $img ): ?>
							<?php if($i == 0): $active = 'active'; else: $active = ''; endif; ?>
							<button type="button" data-bs-target="#carousel_<?php echo $id; ?>" data-bs-slide-to="<?php echo $i ?>" class="<?php echo $active ?>"></button>
						<?php $i++; endforeach; ?>
					</div>
					<div class="carousel-inner">
						<?php $i = 0; ?>
						<?php foreach( $gallery as $img ): ?>
							<?php $img_url = $img['url']; ?>
							<?php $md_lg =  wp_get_attachment_image_url($img['id'], 'medium_large'); ?>
							<?php $lg =  wp_get_attachment_image_url($img['id'], 'large'); ?>
							<?php $img_alt = $img['alt']; ?>
							<?php if($i == 0): $active = 'active'; else: $active = ''; endif; ?>
							<div class="carousel-item <?php echo $active ?>">
								<img src="<?php echo esc_url($lg) ?>" class="d-block w-100" alt="<?php echo $img_alt ?>">
							</div>
						<?php $i++; endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	
	<?php endwhile; ?>
<?php endif; ?>
