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

?>
 
<div <?php echo esc_attr( $anchor ); ?> class="step d-flex align-items-md-center <?php echo $add_class ?>">
	<?php if(get_field('num')): ?>
		<div class="number">
			<span><?php echo get_field('num') ?></span>
		</div>
	<?php endif ?>
	
	<div>
		<InnerBlocks />
	</div>
</div>