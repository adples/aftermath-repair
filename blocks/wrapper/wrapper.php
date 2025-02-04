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

$container = '';
if( get_field('container') ) {
	$container = get_field('container');
}

$padding = '';
if( get_field('padding') ) {
	$padding = get_field('padding');
}

$rand = rand ( 10000 , 99999 );
$bg = $filter = '';
if( get_field('filter') ){
	$filter = 'bg-filter filter-'.$rand;
}

if( get_field('bg') ){
	$bg = get_field('bg');
	$bg_md = wp_get_attachment_image_src($bg['id'], 'medium_large');
	$bg_full = wp_get_attachment_image_src($bg['id'], 'full');
	
	$attributes = 'class="'.$padding.' '.$filter.' '.$add_class.' bg-cover resize"  style="background-image: url('.$bg_md[0].')" data-img-md="'.$bg_md[0].'" data-img-full="'.$bg_full[0].'"';
} else {
	$attributes = 'class="'.$padding.' '.$filter.' '.$add_class.'"';
}

?>

<?php if( get_field('filter') ): ?>
	<style>
		.filter-<?php echo $rand; ?>::after{
			background-color: <?php echo get_field('filter'); ?>
		}
	</style>
<?php endif; ?>

<?php if( get_field('use_icon') && get_field('icon') ): ?>
	<?php get_template_part( 'partial-templates/section-icon', null, array('icon_bg' => get_field('icon_bg')) ); ?>
<?php endif; ?> 

<section <?php echo esc_attr( $anchor ); ?> <?php echo $attributes ?>>
	
	<?php if( get_field('use_icon') && get_field('icon')  ): ?>
		<?php $img = get_field('icon'); ?>
		<img src="<?php echo esc_url($img['url']); ?>" class="section-icon" alt="<?php echo esc_attr($img['alt']); ?>"/>
	<?php endif; ?> 
	
	<?php if( get_field('container') ): ?>
		
		<?php if( $container == 'n-con' ): ?>
			<div class="content-wrapper">
				<InnerBlocks />
			</div>
		<?php else: ?>
			<div class="<?php echo $container ?>">
				<div class="row">
					<div class="col-12 content-wrapper">
						<InnerBlocks />
					</div>
				</div>
			</div>
		<?php endif; ?>
		
	<?php else: ?>
		
		<div class="content-wrapper">
			<InnerBlocks />
		</div>
		
	<?php endif; ?>
	
</section>