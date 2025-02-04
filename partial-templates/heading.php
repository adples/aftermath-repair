<?php
/**
 * Partial - Heading
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$text_color = isset($args['text_color']) ? $args['text_color'] : '';

if( have_rows('heading') ):
	while( have_rows('heading') ): the_row();
		$level = get_sub_field('level');
		$style = get_sub_field('style');
		$color = get_sub_field('color');
		$accent = '';
		
		if( get_sub_field('accent') ){
			$accent = 'accent-title';
		}
			
		if( get_sub_field('heading') ):
			echo '<'.$level.' class="'.$style.' '.$accent.' '.$color.'"><span>'.get_sub_field('heading').'</span></'.$level.'>';
		endif; 
	endwhile; 
endif;

?>
