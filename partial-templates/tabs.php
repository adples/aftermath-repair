<?php
/**
 * Partial - Tabs
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $add_class = isset($args['add_class']) ? $args['add_class'] : ''; ?>

<?php if( have_rows('tabs') ):?>
	
	<?php $id = substr(str_shuffle("0123456789"), 0, 5); $tab_id = 'tabs'.$id; $x=1;?>
	<ul class="nav nav-pills justify-content-evenly" id="myTab<?php echo '-'.$id;?>" role="tablist">
		<?php while( have_rows('tabs') ): the_row(); ?>
			<li class="nav-item" role="presentation">
				<button class="nav-link <?php if($x==1){echo 'active';} ?>" id="<?php echo $tab_id.'-'.$x; ?>" data-bs-toggle="tab" data-bs-target="<?php echo '#'.$tab_id.'-'.$x.'-pane'; ?>" type="button" role="tab" aria-controls="<?php echo $tab_id.'-'.$x.'-pane'; ?>" aria-selected="<?php if($x==1):echo 'true';else: echo'false'; endif; ?>">
					<?php if( get_sub_field('tab_title') ): the_sub_field('tab_title'); endif; ?>
				</button>
			</li>
		<?php $x++; endwhile; ?>
	</ul>
	
	<?php $x=1;?>
	<div class="tab-content" id="myTabContent<?php echo '-'.$id;?>">
		<?php while( have_rows('tabs') ): the_row(); ?>
			<div class="tab-pane fade <?php if($x==1){echo 'show active';} ?>" id="<?php echo $tab_id.'-'.$x.'-pane'; ?>" role="tabpanel" aria-labelledby="<?php echo $tab_id.'-'.$x; ?>" tabindex="0">
				<div class="row align-items-center">
					<div class="col-lg-5 mb-4 mb-lg-0">
						<?php  get_template_part( 'partial-templates/image' ); ?>
					</div>
					<div class="col-lg-7">
						<div class="px-xl-4 ps-xxl-5">
							<?php  get_template_part( 'partial-templates/heading' ); ?>
							
							<?php  get_template_part( 'blocks/paragraph/paragraph'); ?>
							
							<?php get_template_part( 'partial-templates/tab-list', null, array( 'class' => 'tab-list' ) ); ?>
							
							<?php if( get_sub_field('add_content') || get_sub_field('content') ): ?>
								<div><?php echo get_sub_field('content'); ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php $x++; endwhile; ?>
	</div>
	
<?php endif; ?>