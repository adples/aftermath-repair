<?php
/**
 * Partial - Address
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$add_class = isset($args['class']) ? $args['class'] : '';
$anchor = isset($args['anchor']) ? $args['anchor'] : '';

?>

<?php if( have_rows('bubble_list') ): ?>
	
<ul <?php echo esc_attr( $anchor ); ?> class="bubble-list <?php echo $add_class ?>">
	<?php while( have_rows('bubble_list') ): the_row(); ?>
		<?php if( get_sub_field('text') ): ?>
			<li class="d-flex">
				<?php if( get_sub_field('icon') ): ?>
					<span><?php echo get_sub_field('icon') ?></span>
				<?php endif ?>
				
				<?php echo get_sub_field('text') ?>
			</li>
		<?php endif ?>
	<?php endwhile ?>
</ul>

<?php endif ?>