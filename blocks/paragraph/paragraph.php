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

<?php if( have_rows('paragraph') ): ?>
	<?php while( have_rows('paragraph') ): the_row(); ?>
		
		<?php
			$up = $color = '';
			if(get_sub_field('up')){
				$up = 'font-up';
			}
			if(get_sub_field('color')){
				$color = get_sub_field('color');
			}
		?>
		
		<?php if( get_sub_field('text') ): ?>
			<div class="<?php echo $up.' '.$color.' '.$text_align.' '.$add_class; ?>">
				<?php echo get_sub_field('text') ?>
			</div>
		<?php endif; ?>
		
	<?php endwhile; ?>
<?php endif; ?>