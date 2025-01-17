<?php
/**
 * Partial - Cards
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php 
$class = isset($args['class']) ? $args['class'] : ''; 

if($class == 'card-icon'):
	$col = 'col-lg-3 col-6';
else:
	$col = 'col-lg-4';
endif;
?>

<?php if( have_rows('cards') ): ?>
	<div class="row card-row">
		<?php while( have_rows('cards') ): the_row(); ?>
			<div class="<?php echo $col; ?>">
				<div class="card <?php echo $class; ?>">
					<?php if( get_sub_field('card_img') ): ?>
						<?php $img = get_sub_field('card_img') ?>
						
						<?php if( $class == 'card-icon'): ?>
							<img src="<?php echo $img['url'] ?>" class="card-img-icon" alt="<?php echo $img['alt'] ?>" />
						<?php else: ?>
							<div class="card-img-wrapper">
								<img src="<?php echo $img['url'] ?>" class="card-img-top" alt="<?php echo $img['alt'] ?>" />
							</div>
						<?php endif; ?>
						
					<?php endif; ?>
					<div class="card-body">
						<?php if( get_sub_field('card_title') ): ?>
							<h4 class="card-title"><?php echo get_sub_field('card_title'); ?></h4>
						<?php endif; ?>
						
						<?php if( get_sub_field('card_text') ): ?>
							<?php echo the_sub_field('card_text'); ?>
						<?php endif; ?>
						
						<?php get_template_part( 'partial-templates/btn', null, array('class' => 'btn-sm') ); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>