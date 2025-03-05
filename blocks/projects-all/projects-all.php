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

$the_query = new WP_Query( array(
	'post_type' => 'projects',
	'posts_per_page' => 100, 
	'orderby' => 'title', 
	'order' => 'ASC',
	"facetwp" => true 
) );

$z =  1;
$fb = 'project-gallery-';


$project_types = get_terms( array(
	'taxonomy'   => 'project-type',
	'hide_empty' => false,
) );

$project_locations = get_terms( array(
	'taxonomy'   => 'project-location',
	'hide_empty' => false,
) );

/*
foreach ($project_types as $project_type) :
	$project_type->name;
	$project_type->slug;
endforeach;
*/
?>

<div class="row mt-4">
	
	<div class="col-lg-4 order-lg-1 col-xl-3">
		<button class="facetwp-flyout-open d-block w-100 d-lg-none btn btn-secondary">Show Filtering Options&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></button>
		<div class="facetwp-flyout-tpl">
		  {content}
		  <button onclick="FWP.reset()" class="btn clear-facets">Clear Filters&nbsp;&nbsp;<i class="fa fa-times"></i></button>
		</div>
		
		<div class="d-none d-lg-block">
			<h4 class="h5 text-secondary">Project Search:</h4>
			<?php echo facetwp_display( 'facet', 'project_name' ); ?>
			
			<h4 class="h5 text-secondary">Project Type:</h4>
			<?php echo facetwp_display( 'facet', 'project_types' ); ?>
			
			<!-- <h4 class="h5 text-secondary">Project Location:</h4> -->
			<?php // echo facetwp_display( 'facet', 'project_location' ); ?>
			
			<button onclick="FWP.reset()" class="btn clear-facets">Clear Filters&nbsp;&nbsp;<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="col-lg-8 col-xl-9">
		<div class="pe-lg-4 pe-xl-5 facet-results-wrapper">
			<hr class="hr mt-0 mb-5">
			<div class="row project-row facetwp-template">
				
				<?php while ( $the_query->have_posts() ) : ?>
					<?php $the_query->the_post(); ?>
					<?php $id = get_the_ID(); ?>
					
						<div id="projectID-<?php echo $id ?>"class="col-md-6 col-xxl-4 project-item xxx">
							<a href="<?php echo esc_url(get_the_permalink()) ?>" class="project-item-inner mb-4">
								
								<?php if( get_field('img', $id) ): ?>
									<?php
									$img = get_field('img', $id);
									$md_lg =  wp_get_attachment_image_url($img['id'], 'medium_large');
									?>
									<div class="img-wrapper img-standard ratio img-cover mb-3">
										<img src="<?php echo esc_url($md_lg); ?>" class="img-fluid" alt="<?php echo esc_attr($img['alt']); ?>" />
									</div>
								<?php endif; ?>
								
								<div class="project-item-body text-center">
									<?php if( get_field('title', $id) ): ?>
										<h4 class="project-item-title text-secondary">
											<?php echo get_field('title', $id); ?>
										</h4>
										<span class="btn btn-secondary btn-accent">View Details&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></span>
										<?php
										// $project_type = get_the_terms( $id, 'project-type' );
										// foreach ($project_type as $type) :
										// 	echo $type->name.'<br>';
										// endforeach;
										?>
										<?php
										// $project_location = get_the_terms( $id, 'project-location' );
										// foreach ($project_location as $location) :
										// 	echo $location->name.'<br>';
										// endforeach;
										?>
										
									<?php endif; ?>
								</div>
							</a>
						</div>
					
					<?php $z++; ?>
				<?php endwhile; ?>
				
			</div>
		</div>
	</div>
</div>

<?php wp_reset_postdata(); ?>