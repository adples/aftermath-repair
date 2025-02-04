<?php
/**
 * Team Block template.
 *
 * @param array $block The block settings and attributes.
 */
 
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
}
 
$add_class = '';
if ( ! empty( $block['className'] ) ) {
	$add_class = $block['className'];
}

?>
 


<section <?php echo esc_attr( $anchor ); ?> class="<?php echo $add_class; ?>">
		
	<?php if( have_rows('team') ): ?>	
		<div class="row gx-sm-1 gx-md-3 gx-xl-4 justify-content-center team-members">
			<?php while( have_rows('team') ): the_row();?>
				<?php
				if( get_sub_field('bio') && get_sub_field('name') ){
					$id = cleanit( get_sub_field('name') );
					$attributes = 'data-bs-toggle=modal ';
					$attributes .= 'data-bs-target=#'.$id.'_modal';
					$has_bio = 'has-bio';
				} else {
					$attributes = '';
					$has_bio = '';
				}
				?>
				
				<div class="col-sm-6 col-xl-3 col-xxl-3 team-member <?php echo $has_bio ?>">
					<div <?php echo esc_attr( $attributes ); ?> class="animated o-anim-ready fadeIn">
						<?php if( get_sub_field('img') ): ?>
							<?php $img = get_sub_field('img'); ?>
							<div class="img-team">
								<img src="<?php echo esc_url($img['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($img['alt']); ?>" />
								
								<?php if( get_sub_field('bio')): ?>
									<span>Read Bio&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></span>
								<?php endif ?>
							</div>
						<?php endif; ?>
						
						<?php if( get_sub_field('name') ): ?>
							<?php $id = cleanit( get_sub_field('name') ); ?>
							<h3 class="h4 text-secondary text-center mt-3"><?php echo get_sub_field('name') ?></h3>
							
							<?php if( get_sub_field('position') ): ?>
								<h4 class="h5 text-center"><?php echo get_sub_field('position') ?></h4>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>	
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</section>

<?php if( have_rows('team') ): ?>
	<?php while( have_rows('team') ): the_row(); ?>
		<?php if( get_sub_field('bio') && get_sub_field('name') ): ?>
			
			<?php $id = cleanit( get_sub_field('name') ); ?>
			
			<div id="<?php echo $id.'_modal'; ?>" class="modal modal-xl modal-team fade" tabindex="-1" aria-labelledby="<?php echo $id.'_modal'; ?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">close&nbsp;&nbsp;<i class="fa fa-close"></i></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-4">
									<?php if( get_sub_field('img') ): ?>
										<div class="img-team">
											<?php $img = get_sub_field('img'); ?>
											<img src="<?php echo $img['url'] ?>" class="img-fluid" alt="<?php echo $img['alt'] ?>" />
										</div>
									<?php endif; ?>
								</div>
								<div class="col-lg-8">
									<div class="px-lg-4">
										<h3 class="h3 text-secondary"><?php echo get_sub_field('name') ?></h3>
										<h4 class="h4"><?php echo get_sub_field('position') ?></h4>
										<?php echo get_sub_field('bio'); ?>
										<?php if( get_sub_field('email') ): ?>
											<a href="mailto:<?php echo get_sub_field('email') ?>" class="btn btn-secondary">
												Contact <?php echo the_sub_field('name') ?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>