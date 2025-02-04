<?php
/**
 * Partial - Section Icon
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$icon_bg = isset($args['icon_bg']) ? $args['icon_bg'] : '';

?>

<div class="text-center" style="position: relative;top: 1px;">
	<style type="text/css">
		svg{width: 200px;}
		.st0{fill: <?php echo $icon_bg ?> }
	</style>
	
<svg 
	version="1.1"
	id="Layer_2"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:xlink="http://www.w3.org/1999/xlink"
	x="0px"
	y="0px"
	viewBox="0 0 127.4 57.5"
	style="enable-background:new 0 0 127.4 57.5;"
	xml:space="preserve"
>
	<path class="st0" d="M0,57.5L47.1,7C56-2.5,74-2.3,82.7,7.3l44.8,50.2H0z"/>
</svg>

</div>