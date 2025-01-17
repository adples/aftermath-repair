<?php
/**
 * Partial - Address
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<address>
	<?php while( have_rows('address','option') ): the_row(); ?>
		
		<?php
		$street = get_sub_field('street');
		$city = get_sub_field('city');
		$state = get_sub_field('state');
		$zip = get_sub_field('zip');
		?>
			<?php echo $street.'<br>'; ?>
			<?php if( get_sub_field('po') ){ echo get_sub_field('po').'<br>';} ?>
			<?php echo $city.', '.$state.' '.$zip; ?>
			
	<?php endwhile; ?>
</address>