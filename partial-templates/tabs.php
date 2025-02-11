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
	
	<?php
	$parent_id = substr(str_shuffle("0123456789"), 0, 5); 
	//$tab_id = 'tabs'.$id;
	//$tab_id = 'tabs';
	$x=1;
	
	?>
	
	<div class="row">
		<div class="col-lg-4 col-xl-3">
			<ul class="nav nav-pills flex-column nav-pills" id="myTab<?php echo '-'.$parent_id;?>" role="tablist">
				<?php while( have_rows('tabs') ): the_row(); ?>
					<?php
					$id = str_replace(' ', '', get_sub_field('tab_title'));
					$tab_id = 'tabs'.$id;
					?>
					<li class="nav-item" role="presentation">
						<button class="nav-link <?php if($x==1){echo 'active';} ?>" id="<?php echo $tab_id; ?>" data-bs-toggle="tab" data-bs-target="<?php echo '#'.$tab_id.'-pane'; ?>" type="button" role="tab" aria-controls="<?php echo $tab_id.'-pane'; ?>" aria-selected="<?php if($x==1):echo 'true';else: echo'false'; endif; ?>">
							<?php if( get_sub_field('tab_title') ): echo get_sub_field('tab_title'); endif; ?>
							<i class="fa fa-angle-double-right"></i>
						</button>
					</li>
				<?php $x++; endwhile; ?>
			</ul>
		</div>
		
		<div class="col-lg-8 col-xl-9">
			<?php $x=1;?>
			<div class="tab-content" id="myTabContent<?php echo '-'.$parent_id;?>">
				<?php while( have_rows('tabs') ): the_row(); ?>
					<?php
					$id = str_replace(' ', '', get_sub_field('tab_title'));
					$tab_id = 'tabs'.$id;
					?>
					<div class="tab-pane fade <?php if($x==1){echo 'show active';} ?>" id="<?php echo $tab_id.'-pane'; ?>" role="tabpanel" aria-labelledby="<?php echo $tab_id; ?>" tabindex="0">
						<div class="row gx-xl-5">
							<div class="col-xl-4 order-xl-1">
								<div class="mb-3">
									<?php  get_template_part( 'partial-templates/image', null, array( 'tab' => true ) ); ?>
								</div>
							</div>
							<div class="col-xl-8">
								<div class="ps-xl-4">
									
									<?php  get_template_part( 'partial-templates/heading' ); ?>
									
									<?php if (get_sub_field('text')){
										echo get_sub_field('text');
									} ?>
									
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
		</div>
	</div>
	
<?php endif; ?>