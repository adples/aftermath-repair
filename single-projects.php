<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="single-wrapper">

	<div id="content" tabindex="-1">

		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'loop-templates/content', 'single-projects' );
			//understrap_post_nav();
		}
		?>

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
