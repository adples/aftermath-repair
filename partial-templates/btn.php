<?php
/**
 * Partial - Button
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $add_class = isset($args['add_class']) ? $args['add_class'] : ''; ?>

<?php if( have_rows('btn') ): ?>
	<?php while( have_rows('btn') ): the_row(); ?>
		<?php 
		$class = get_sub_field('btn_color');
		$style = get_sub_field('btn_style');
		$text = get_sub_field('btn_text');
		$size = get_sub_field('btn_size');
		$use_icon = '';
		$icon = '';
		
		if( get_sub_field('use_icon') ){
			$use_icon = true;
		}
		
		if( get_sub_field('icon') ){
			$icon = get_sub_field('icon');
		}
		
		if( get_sub_field('custom') && get_sub_field('btn_link_custom') ){
			$url = get_sub_field('btn_link_custom');
		} elseif ( get_sub_field('btn_link') ){
			$url = get_sub_field('btn_link');
		}
		?>
		
		<?php if( ( get_sub_field('custom') && get_sub_field('btn_link_custom') ) ||  get_sub_field('btn_link') ): ?>
			<a href="<?php echo esc_url($url); ?>" class="btn <?php echo $class.' '.$style.' '.$size.' '.$add_class; ?>">
			<?php if( $use_icon == true && get_sub_field('icon') && get_sub_field('icon_before')){ echo $icon.'&nbsp;&nbsp;'; } ?>
			<span><?php echo $text; ?></span>
			<?php if( $use_icon == true && get_sub_field('icon') && !get_sub_field('icon_before')){ echo '&nbsp;&nbsp;'.$icon; } ?>
			</a>
		<?php endif; ?>
		
	<?php endwhile; ?>
<?php endif; ?>
