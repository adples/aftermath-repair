<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div id="index-wrapper" class="post-query-wrapper inner-bottom">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		
		<div class="banner banner-interior">
				
				<div class="banner-img resize">
				</div>
				
				<?php 
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div class="breadcrumb-wrapper"><div id="breadcrumbs" class="breadcrumbs">','</div></div>' );
				}
				?>
		</div>
		
		<div>

			<?php
			// Do the left sidebar check and open div#primary.
			//get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main row gx-xxl-5" id="main">
				
				<h1 class="accent-title h1 text-center text-secondary"><span>Foundation Repair Blog</span></h1>
				<div class="row justify-content-center mb-4 mb-x-5">
					<div class="col-lg-9">
						<p class="font-up text-center">Welcome to the Aftermath Structural Repair blog. We specialize in strengthening the foundation of your home or business with long-lasting solutions that ensure structural stability and your peace of mind. Explore our tips, industry insights, and success stories to keep your property safe and sound.</p>
					</div>
				</div>

				<?php
				if ( have_posts() ) {
					// Start the Loop.
					while ( have_posts() ) { ?>
						<div class="col-lg-4">
							<? 
							the_post();
							get_template_part( 'loop-templates/content', get_post_format() );
							?>
						</div>
					<? }
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main>
			
			<div class="text-center">
			<?php
			// Display the pagination component.
			understrap_pagination();

			// Do the right sidebar check and close div#primary.
			//get_template_part( 'global-templates/right-sidebar-check' );
			?>
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
