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
		
		<?php 
		if( get_field('blog_banner','option') ): 
			if( get_field('bg','option') ):
				$banner_img = get_field('bg','option');
				$banner_img_md = wp_get_attachment_image_src($banner_img['id'], 'medium_large');
				$banner_img_full = wp_get_attachment_image_src($banner_img['id'], 'full');
				
				$attributes = 'class="banner-img resize"';
				$attributes .= 'style="background-image: url('.$banner_img_md[0].')" ';
				$attributes .= 'data-img-md="'.$banner_img_md[0].'" ';
				$attributes .= 'data-img-full="'.$banner_img_full[0].'"';
			?>
				<div class="banner banner-interior">
					<div class="container">
						<div <?php echo $attributes ?> >
						</div>
						
						<?php 
						if (get_field('breadcrumb','option')){
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb( '<div class="breadcrumb-wrapper"><div id="breadcrumbs" class="breadcrumbs">','</div></div>' );
							}
						}
						?>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<div>

			<?php
			// Do the left sidebar check and open div#primary.
			//get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main row gx-xxl-5" id="main">
				
				<?php if( get_field('blog_title','option') ): ?>
					<h1 class="accent-title h1 text-center text-secondary"><span><?php echo get_field('blog_title','option') ?></span></h1>
				<?php endif; ?>
				
				<?php if( get_field('blog_lead','option') ): ?>
					<div class="row justify-content-center mb-4 mb-x-5">
						<div class="col-lg-9">
							<p class="font-up text-center"><?php echo get_field('blog_lead','option') ?></p>
						</div>
					</div>
				<?php endif; ?>

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
