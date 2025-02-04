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

<?php if( have_rows('accordion') ): $i=1;?>
	<div class="accordion <?php echo $add_class; ?>" id="accordion">
		<?php while( have_rows('accordion') ): the_row(); ?>
		<?php
		if($i==1):
			$collapsed = '';
			$show = 'show';
			$icon = 'fa-minus';
			$active = 'active-panel';
		else:
			$collapsed ='collapsed';
			$show = '';
			$icon = 'fa-plus';
			$active = '';
		endif;
		?>
		<div class="card card-accordion <?php echo $active ?>">
			<div class="card-header">
				<button class="btn-block <?php echo $collapsed; ?>" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo '#collapse'.$i; ?>" aria-expanded="true" >
					<?php the_sub_field('title') ?>
					<i class="fa <?php echo $icon; ?>"></i>
				</button>
			</div>
			<div id="<?php echo 'collapse'.$i; ?>" class="collapse <?php echo $show; ?>" data-bs-parent="#accordion">
				<div class="card-body">
					<?php the_sub_field('content') ?>
				</div>
			</div>
		</div>
		<?php $i++; endwhile; ?>
	</div>
<?php endif; ?>