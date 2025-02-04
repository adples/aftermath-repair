<?php
/**
 * Contact Block template.
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

$align = '';
if ( ! empty( $block['align'] ) ) {
	$align = 'justify-content-lg-'.$block['align'];
}

$container = $width = $col = '';

if( have_rows('content_row') ):
	while( have_rows('content_row') ): the_row(); 
		
		$width = get_sub_field('width');
		$col = 'col-lg-'.$width;
		
	endwhile; 
endif;
?>
 
<div <?php echo esc_attr( $anchor ); ?> class="row <?php echo $align  ?>">
	<div class="<?php echo $col.' '.$add_class ?>">
		<InnerBlocks />
	</div>
</div>