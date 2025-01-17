<?php
/**
 * Banner Block template.
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
 
<?php if( have_rows('banner') ): ?>
	<?php while( have_rows('banner') ): the_row(); ?>
		
		<?php
		if( get_sub_field('bg') ):
			$banner_img = get_sub_field('bg');
			$banner_img_md = wp_get_attachment_image_src($banner_img['id'], 'medium_large');
			$banner_img_full = wp_get_attachment_image_src($banner_img['id'], 'full');
		endif;
		
		if( get_sub_field('interior') ):
			$col = 'col-11 col-lg-7 col-lg-6 col-xxl-5';
			$interior = 'banner-interior';
		else:
			$col = 'col-11 col-lg-7 col-xxl-5';
			$interior = '';
		endif;
		?>
		
		<div <?php echo esc_attr( $anchor ); ?> class="banner resize <?php echo $interior.' '.$add_class; ?>" style="background-image: url('<?php echo $banner_img_md[0]; ?>');" data-img-md="<?php echo $banner_img_md[0]; ?>" data-img-full="<?php echo $banner_img_full[0]; ?>">
			
			<div class="container">
				<div class="row">
					<div class="<?php echo $col ?>">
						<div class="banner-inner">
							<div class="banner-content">
								<InnerBlocks />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<?php endwhile; ?>
<?php endif; ?>