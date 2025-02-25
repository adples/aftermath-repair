<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title text-secondary">', '</h1>' ); ?>

		<div class="entry-meta">
			<div class="date mb-3">
				<i class="fa fa-clock-o text-primary"></i>&nbsp;&nbsp;<?php echo get_the_date( 'l F j, Y' ).' - <i class="fa fa-user text-primary"></i>&nbsp;&nbsp;'.get_the_author_firstname().' '. get_the_author_lastname(); ?>
			</div>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" style="width:100%" />
	
	<?php 
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div class="breadcrumb-wrapper mb-4"><div id="breadcrumbs" class="breadcrumbs">','</div></div>' );
	}
	?>

	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
