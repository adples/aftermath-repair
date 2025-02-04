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

$rand = rand ( 10000 , 99999 );
$filter = '';
if( get_field('filter') ){
	$filter = 'bg-filter filter-'.$rand;
}

$attributes = 'class="banner banner-home '.$filter.' '.$add_class.'"';
$gallery = get_field('gallery');

?>

<?php if( get_field('filter') ): ?>
	<style>
		.filter-<?php echo $rand; ?>::after{
			background-color: <?php echo get_field('filter'); ?>
		}
	</style>
<?php endif; ?>

<div <?php echo esc_attr( $anchor ); ?> <?php echo $attributes ?>>
	<div class="container">
		<div class="row align-items-lg-end align-items-xl-stretch">
			<div class="col-lg-6 text-center text-md-start">
				<?php if( get_field('title') ): ?>
					<h1 class="banner-title d-block d-md-none d-lg-block"><?php echo get_field('title') ?></h1>
				<?php endif; ?>
				<div class="row gx-lg-4 gx-xxl-5 align-items-md-end">
					<div class="col-md-6 order-md-1">
						<div class="banner-img banner-img-1 mb-3 mb-md-0">
							<img src="<?php echo $gallery[0]['url'] ?>" alt="<?php echo $gallery[0]['alt'] ?>"/>
						</div>
					</div>
					<div class="col-md-6">
						<?php if( get_field('title') ): ?>
							<h1 class="banner-title d-none d-md-block d-lg-none"><?php echo get_field('title') ?></h1>
						<?php endif; ?>
						
						<InnerBlocks />
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row gx-lg-4 mt-md-4 mt-lg-0">
					<div class="col-md-6">
						<div class="banner-img banner-img-2">
							<img src="<?php echo $gallery[1]['url'] ?>" alt="<?php echo $gallery[1]['alt'] ?>"/>
						</div>
					</div>
					<div class="col-md-6">
						<div class="banner-img banner-img-3 mb-4">
							<img src="<?php echo $gallery[2]['url'] ?>" alt="<?php echo $gallery[2]['alt'] ?>"/>
						</div>
						<?php if( get_field('bubble_list') ): ?>
							<?php get_template_part( 'partial-templates/bubble-list') ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>