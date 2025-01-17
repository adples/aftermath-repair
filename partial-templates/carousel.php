<?php
/**
 * Partial - Carousel
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$id = isset($args['pid']) ? $args['pid'] : '';

if( $id != '' && get_field('gallery', $id) ){
	$gallery = get_field('gallery', $id);
} else{
	$gallery = get_field('gallery');
}
?>

<?php if( $gallery != '' ): ?>
<div id="carouselSimple" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-indicators">
		<?php $i = 0; ?>
		<?php foreach( $gallery as $img ): ?>
			<?php if($i == 0): $active = 'active'; else: $active = ''; endif; ?>
			<button type="button" data-bs-target="#carouselSimple" data-bs-slide-to="<?php echo $i ?>" class="<?php echo $active ?>"></button>
		<?php $i++; endforeach; ?>
	</div>
	<div class="carousel-inner">
		<?php $i = 0; ?>
		<?php foreach( $gallery as $img ): ?>
			<?php $img_url = $img['url']; ?>
			<?php $img_alt = $img['alt']; ?>
			<?php if($i == 0): $active = 'active'; else: $active = ''; endif; ?>
			<div class="carousel-item <?php echo $active ?>">
				<img src="<?php echo $img_url ?>" class="d-block w-100" alt="<?php echo $img_alt ?>">
			</div>
		<?php $i++; endforeach; ?>
	</div>
</div>
<?php endif; ?>
