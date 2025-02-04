<?php
/**
 * Contact Block template.
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

<div <?php echo esc_attr( $anchor ); ?> class="<?php echo $add_class ?>">
	<div class="testimonial-stars">
		<?php
		for ($i = 0; $i < 5; $i++){
			echo '<i class="fa fa-star"></i>';
		}
		?>
	</div>
	
	<?php
	
	$the_query = new WP_Query( array(
		'post_type' => 'testimonial',
		'posts_per_page' => 100, 
		'orderby' => 'title', 
		'order' => 'ASC',
	) );
	
	?>
	
	<div id="carouselSimple" class="testimonial-slider carousel slide" data-bs-ride="carousel">
		
		<div class="carousel-indicators d-none">
			<?php $i = 0; ?>
			<?php while ( $the_query->have_posts() ) : ?>
				<?php $the_query->the_post(); ?>
					<?php if($i == 0): $active = 'active'; else: $active = ''; endif; ?>
					<button type="button" data-bs-target="#carouselSimple" data-bs-slide-to="<?php echo $i ?>" class="<?php echo $active ?>"></button>
				<?php $i++; ?>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
		
		<div class="carousel-inner">
			<?php $i = 0; ?>
			<?php while ( $the_query->have_posts() ) : ?>
				<?php $the_query->the_post(); ?>
				<?php if($i == 0): $active = 'active'; else: $active = ''; endif; ?>
				<?php $id = get_the_ID(); ?>
				<div class="carousel-item <?php echo $active ?>">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-10 col-xl-9 col-xxl-8">
								<div class="carousel-item-inner">
									<?php if( get_field('testimonial', $id) ): ?>
										<em><?php echo get_field('testimonial', $id); ?></em>
									<?php endif; ?>
									<div class="pt-lg-3 text-secondary">
										<?php if( get_field('name', $id) ): ?>
											<strong><?php echo get_field('name', $id); ?></strong>
										<?php endif; ?>
										<?php if( get_field('name', $id) && get_field('location', $id) ){ echo '|';} ?>
										<?php if( get_field('location', $id) ): ?>
											<strong><?php echo get_field('location', $id); ?></strong>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $i++; ?>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
		
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselSimple" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselSimple" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		  </button>
	</div>
	
</div>