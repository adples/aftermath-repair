<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<ul class="topbar-list-contact">
						<?php if( get_field('phone','option') ): ?>
							<?php $phone = str_replace(array('.'), '' , get_field('phone','option')) ?>
							<li>
								<a href="<?php echo 'tel:'.$phone ?>">
								<span class="d-inline-block me-2"><i class="fa fa-phone"></i></span>
								<?php echo get_field('phone','option') ?>
								</a>
							</li>
						<?php endif ?>
						
						<?php if( get_field('email','option') ): ?>
							<?php $email = get_field('email','option') ?>
							<li>
								<a href="<?php echo 'mailto:'.$email ?>">
									<span class="d-inline-block me-2"><i class="fa fa-envelope"></i></span>
									<?php echo get_field('email','option') ?>
								</a>
							</li>
						<?php endif ?>
					</ul>
				</div>
				<div class="col-md-4">
					<?php if( have_rows('social','option') ): ?>
						<ul class="topbar-list-social">
							<?php while( have_rows('social','option') ): the_row(); ?>
								<?php if( get_sub_field('icon') && get_sub_field('url') ): ?>
									<li>
										<a href="<?php echo esc_url(get_sub_field('url')) ?>"><?php echo get_sub_field('icon') ?></a>
									</li>
								<?php endif; ?>
							<?php endwhile ?>	
						</ul>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">

		<a class="skip-link <?php echo understrap_get_screen_reader_class( true ); ?>" href="#content">
			<?php esc_html_e( 'Skip to content', 'understrap' ); ?>
		</a>

		<?php get_template_part( 'global-templates/navbar', $navbar_type . '-' . $bootstrap_version ); ?>

	</header><!-- #wrapper-navbar -->
