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

$text_align = '';
if( ! empty( $block['alignText'] ) ) {
	$text_align = ' text-' . $block['alignText'];
}

?>

<div class="<?php echo $text_align; ?>">
<?php get_template_part( 'partial-templates/btn', null, array('add_class' => $add_class) ); ?>
</div>