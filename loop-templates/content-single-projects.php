<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$project_location = get_the_terms( $id, 'project-location' );
$project_type = get_the_terms( $id, 'project-type' );

$post_type_object = get_post_type_object( get_post_type() );

$i = 0;
$the_location = '';
$locations = array();

if ( isset($project_location) && $project_location !== false) {
	 
	foreach ($project_location as $location) :
		if ($location->parent === 0){
			$parent_id = $location->term_id;
			$locations[$i] = array('state' => $location->name);
			
			foreach ($project_location as $child) :
				if ($child->parent === $parent_id){
					$locations[$i]['city'] = $child->name; 
					$locations[$i]['display'] = true;
				}
			endforeach; 
			$i++;
		}
	endforeach;
 	
	if ( count( $locations) === 1 ){
		$show_location = true;
		if ( array_key_exists('display', $locations[0]) ) {
			$the_location = $locations[0]['city'].', '.$locations[0]['state'];
		} elseif( array_key_exists('city', $locations[0]) ){
			$the_location = $locations[0]['city'];
		} elseif( array_key_exists('state', $locations[0]) ){
			$the_location = $locations[0]['state'];
		}
	} elseif( count( $locations) > 1 ){
		$show_location = true;
		foreach ($locations as $loc) :
			if (array_key_exists('display', $loc)) {
				$the_location = $loc['city'].', '.$loc['state'];
			} elseif( array_key_exists('city', $loc) ){
				$the_location = $loc['city'];
			} elseif( array_key_exists('state', $loc) ){
				$the_location = $loc['state'];
			}
		endforeach;
	}
}

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<div class="container inner-bottom">
	<div class="row">
		<div class="col-lg-9 col-xl-8 content-area">
			<div class="entry-content pe-lg-4 pe-xl-5">
				<h1 class="h2 text-secondary">
					<?php echo get_field('title'); ?>
				</h1>
				
				<div class="entry-meta">
					<ul class="list-unstyled fs-6 mb-3 text-secondary">
						<li class="d-inline-block pe-4">
							<i class="fa fa-clock-o text-primary"></i>&nbsp;&nbsp;
							<strong>Project Completed:</strong> <?php echo get_the_date( 'F, Y' ); ?>
						</li>
						<?php if ( isset($show_location) ):?>
							<li class="d-inline-block">
								<i class="fa fa-map-marker text-primary"></i>&nbsp;&nbsp;
								<strong>Location:</strong> <?php echo $the_location; ?> 
							</li>
						<?php endif; ?>
					</ul>
				
				</div><!-- .entry-meta -->
				
				<?php 
				if( get_field('show_video') && get_field('video') ):
					get_template_part( 'partial-templates/vimeo-video' );
				else:
					get_template_part( 'partial-templates/carousel', null, array( 'class' => 'project-carousel' ) );
				endif;
				?>
				
				
				<div class="breadcrumb-wrapper">
					<div id="breadcrumbs" class="breadcrumbs">
						<span>
							<span>
								<a href="<?php echo esc_url(get_home_url()) ?>">Home</a>
							</span>
							»
							<span>
								<a href="<?php echo esc_url(get_home_url().'/'.get_post_type().'/') ?>"><?php echo $post_type_object->label?></a>
							</span>
							»
							<span class="breadcrumb_last" aria-current="page">
								<?php echo get_field('title'); ?>
							</span>
						</span>
					</div>
				</div>
				
				<footer class="entry-footer">
				
					<?php understrap_entry_footer(); ?>
				
				</footer><!-- .entry-footer -->
				
			</div>
		</div>
		<div class="col-lg-3 col-xl-4">
			<div class="widget-area">
				<h3 class="h3 text-secondary mb-3">Project Details</h3>
				<?php if ( isset($project_type) && $project_type !== false) : ?>
					<?php foreach ($project_type as $type) : ?>
						<span class="badge bg-primary badge-default"><?php echo $type->name; ?></span>
					<?php endforeach; ?>
				<?php endif; ?>
				
				
				<div class="mt-3 mt-xl-4">
					<?php echo get_field('desc') ?>
				</div>
				
				<?php if( have_rows('carousel') ): ?>
					<?php while( have_rows('carousel') ): the_row(); ?>
						<?php if (get_sub_field('gallery')): ?>
							<?php $lightbox = get_sub_field('gallery'); ?>
							<a class="btn btn-secondary" href="<?php echo $lightbox[0]['url'] ?>" data-fancybox="project-gallery">Project Gallery&nbsp;&nbsp;<i class="fa fa-picture-o"></i></a>
							
							<div class="d-none">
								<?php $x = 0;?>
								<?php foreach( $lightbox as $img ): ?>
									<?php if ( $x > 0 ): ?>
										<a href="<?php echo $img['url']; ?>" data-fancybox="project-gallery"></a>
									<?php endif; $x++; ?>
								<?php endforeach; ?>
							</div>
						<?php endif ?>
					<?php endwhile; ?>
				<?php endif; ?>
				
				<pre><?php //echo var_dump($project_location)?></pre>
			</div>
		</div>
	</div>
	
	<?php
	$prev_post = get_adjacent_post(false, '', true);
	$next_post = get_adjacent_post(false, '', false);
	?>
	
	<pre><?php //echo var_dump($prev_post)?></pre>
	
	<div class="row justify-content-center">
		<div class="col-md-7 col-lg-6 col-xl-5 col-xxl-4">
			<div class="d-flex justify-content-between">
				<?php if ($prev_post): ?>
					<a href="<?php echo esc_url(get_permalink( $prev_post->ID ))?>" class="adjacent-project prev text-end px-4">
						<span>Prev Project</span>
						<h5 class="h4"><i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;<?php echo $prev_post->post_title ?></h5>
					</a>
				<?php endif; ?>
				<?php if ($next_post): ?>
					<a href="<?php echo esc_url(get_permalink( $next_post->ID ))?>" class="adjacent-project text-start px-4">
						<span>Next Project</span>
						<h5 class="h4"><?php echo $next_post->post_title ?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></h5>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

</div>

</article><!-- #post-<?php the_ID(); ?> -->
