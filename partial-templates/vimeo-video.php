<?php
/**
 * Partial - Vimeo Video
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div id="vimeo" class="project-video-wrapper">
	<?php
	$x='https://player.vimeo.com/video/';
	$y='&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;autoplay=1&amp;loop=1&amp;background=1';
	$vimeo = get_field('video');
	$vimeo_url = $x.$vimeo.$y;
	?>
	
	<iframe src="<?php echo esc_url($vimeo_url) ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	
	<div class="loader">
		<img class="loader-icon" src="<?php echo wp_get_attachment_image_url( 668, '' ) ?>" />
		
		<div class="loading loading03">
			<span>L</span>
			<span>O</span>
			<span>A</span>
			<span>D</span>
			<span>I</span>
			<span>N</span>
			<span>G</span>
		</div>
		  
	</div>
</div>