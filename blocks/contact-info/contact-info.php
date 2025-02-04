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

<div class="contact-info">
	
	<ul>
		<?php if( get_field('phone','option') ): ?>
			<?php $phone = str_replace(array('.'), '' , get_field('phone','option')) ?>
			<li>
				<a href="<?php echo 'tel:'.$phone ?>" class="d-flex align-items-center">
					<span><i class="fa fa-phone"></i></span>
					<?php echo get_field('phone','option') ?>
				</a>
			</li>
		<?php endif ?>
		
		<?php if( get_field('email','option') ): ?>
			<?php $email = get_field('email','option') ?>
			<li>
				<a href="<?php echo 'mailto:'.$email ?>" class="d-flex align-items-center">
					<span><i class="fa fa-envelope"></i></span>
					<?php echo get_field('email','option') ?>
				</a>
			</li>
		<?php endif ?>
		
		<?php if(  get_field('address','option') ): ?>
			<?php $email = get_field('email','option') ?>
			<li>
				<div class="d-flex align-items-center">
					<span><i class="fa fa-map-marker"></i></span>
					<?php get_template_part( 'partial-templates/address' ); ?>
				</div>
			</li>
		<?php endif ?>
	</ul>
</div>
 
