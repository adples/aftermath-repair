<?php
/**
 * Custom Block template.
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
<?php if( have_rows('content_cards') ): ?>
		
	<?php
	
	$img_style = $container = $padding = $color = '';
	$layout = 'col-sm-6 col-lg-4 col-xl-3';
	$style = 'card-default';
	
	if( get_field('container') ){
		$container = get_field('container');
	}
	
	if( get_field('padding') ){
		$padding = get_field('padding');
	}
	
	if( get_field('style') ){
		$style = get_field('style');
	}
	
	if( get_field('layout') == 6 ){
		$layout = 'col-md-6 col-lg-4 col-xl-2';
	} elseif( get_field('layout') == 4 ){
		$layout = 'col-md-6 col-lg-4 col-xl-3';
	} elseif( get_field('layout') == 3 ){
		$layout = 'col-md-6 col-lg-4';	
	} elseif( get_field('layout') == 2 ){
		$layout = 'col-md-6';
	}
	
	?>
		
	<section <?php echo esc_attr( $anchor ); ?> class="content-cards <?php echo 'section-'.$style.' '.$add_class; ?>">
		<div class="<?php echo $container.' '.$padding ?>">
		
			<div class="row gx-xxl-5 justify-content-center">
				
				<?php while( have_rows('content_cards') ): the_row(); ?>
					<?php
					if( get_sub_field('color') ){
						$color = get_sub_field('color');
					}
					?>
					
					<div class="<?php echo $layout ?>">
						
						<div class="card <?php echo $style ?>">
							<?php if( get_sub_field('img') ): ?>
								<?php $img = get_sub_field('img'); ?>
								<img class="card-img-top" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
							<?php endif; ?>
							<div class="card-body <?php echo $color ?>">
								
								<?php get_template_part( 'partial-templates/heading' ); ?>
								
								<?php if( get_sub_field('text') ): ?>
									<div>
										<?php echo get_sub_field('text') ?>
									</div>
								<?php endif; ?>
								
								<?php get_template_part( 'partial-templates/list', null, array('list' => 'icon-list' ) ); ?>
								
								<?php get_template_part( 'partial-templates/btn' ); ?>
							</div>
						</div>
						
					</div>
				<?php endwhile; ?>
				
			</div>
						
		</div>
	</section>
		
<?php endif; ?>