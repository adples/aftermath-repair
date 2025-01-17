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

<?php if( get_field('map','option') ): ?>
<div style="position: relative;padding-bottom: 32.5%;overflow: hidden;">
	<iframe src="<?php echo get_field('map','option'); ?>" style="border:0;position: absolute;top: 0;left: 0;width: 100%;height: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php endif; ?>
 
