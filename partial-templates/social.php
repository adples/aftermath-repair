<?php
/**
 * Partial - Social Icons
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if( have_rows('social','option') ): ?>
	<ul class="social-list">
		<?php while( have_rows('social','option') ): the_row(); ?>
			<?php if( get_sub_field('facebook') ): $facebook =  get_sub_field('facebook'); ?>
				<li>
					<a href="<?php echo esc_url($facebook); ?>">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if( get_sub_field('instagram') ): $instagram =  get_sub_field('instagram'); ?>
				<li>
					<a href="<?php echo esc_url($instagram); ?>">
						<i class="fa fa-instagram"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if( get_sub_field('pinterest') ): $pinterest =  get_sub_field('pinterest'); ?>
				<li>
					<a href="<?php echo esc_url($pinterest); ?>">
						<i class="fa fa-pinterest-p"></i>
					</a>
				</li>
			<?php endif; ?>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>
