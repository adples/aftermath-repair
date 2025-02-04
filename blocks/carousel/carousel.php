<?php
/**
 * Custom Block template.
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

?>

<?php get_template_part( 'partial-templates/carousel', null, array( 'class' => $add_class ) ); ?>
 
