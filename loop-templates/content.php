<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class("post-item mb-4 mb-xl-5"); ?> id="post-<?php the_ID(); ?>">
	<a href="<?php echo esc_url( get_permalink() ) ?>">
		
		<?php if(get_the_post_thumbnail()): ?>
			<div class="img-wrapper img-standard ratio img-cover mb-3">
				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
			</div>
		<?php endif ?>
		
		<h3 class="entry-title h5"><?php echo get_the_title( )?></h3>
		<span class="btn btn-secondary btn-accent">Read the Post&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></span>
	
		<div class="entry-content">
			<?php understrap_link_pages(); ?>
		</div><!-- .entry-content -->
	</a>


</article><!-- #post-<?php the_ID(); ?> -->
