<?php
/**
 * Process step template.
 *
 * @param array $block The block settings and attributes.
 */
 
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
}
  
$add_class = '';
if ( ! empty( $block['className'] ) ) {
	$add_class = $block['className'];
}

get_template_part( 'partial-templates/bubble-list', null, array( 'class' => $add_class, 'anchor' => $anchor  ) );

?>