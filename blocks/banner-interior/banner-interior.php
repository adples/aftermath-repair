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

if( get_field('bg') ):
	$banner_img = get_field('bg');
	$banner_img_md = wp_get_attachment_image_src($banner_img['id'], 'medium_large');
	$banner_img_full = wp_get_attachment_image_src($banner_img['id'], 'full');
	
	$attributes = 'class="banner-img resize '.$add_class.'"';
	$attributes .= 'style="background-image: url('.$banner_img_md[0].')" ';
	$attributes .= 'data-img-md="'.$banner_img_md[0].'" ';
	$attributes .= 'data-img-full="'.$banner_img_full[0].'"';
?>
	<div <?php echo esc_attr( $anchor ); ?> class="banner banner-interior">
		<div class="container">
			<div <?php echo $attributes ?> >
			</div>
			
			<?php 
			if (get_field('breadcrumb')){
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div class="breadcrumb-wrapper"><div id="breadcrumbs" class="breadcrumbs">','</div></div>' );
				}
			}
			?>
		</div>
	</div>
	
<?php else: ?>
	
<?php endif; ?>