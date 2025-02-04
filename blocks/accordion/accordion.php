<?php
/**
 * Button Block template.
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

<div <?php echo esc_attr( $anchor ); ?>>
	<?php get_template_part( 'partial-templates/accordion', null, array('add_class' => $add_class) ); ?>
</div>
 
