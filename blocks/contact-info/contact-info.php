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
	<h4 class="h5">Office Location</h4>
	<?php if( get_field('address','option') ): ?>
		<ul class="fa-ul">
			<li>
				<span class="fa-li">
					<i class="fa fa-map-marker"></i>
				</span>
				<?php get_template_part( 'partial-templates/address' ); ?>
			</li>
		</ul>
	<?php endif ?>
	
	<h4 class="h5 mt-3 mt-xl-4">Phone</h4>
	<?php if( get_field('phone','option') ): ?>
		<?php $phone = str_replace(array('.'), '' , get_field('phone','option')) ?>
		<ul class="fa-ul">
			<li>
				<span class="fa-li">
					<i class="fa fa-phone"></i>
				</span>
				<a href="<?php echo 'tel:'.$phone ?>">
					<?php echo get_field('phone','option') ?>
				</a>
			</li>
		</ul>
	<?php endif ?>
	
	<h4 class="h5 mt-3 mt-xl-4">Inquiries</h4>
	<?php if( get_field('email_estimating','option') || get_field('email_office','option') ): ?>
		<?php 
		$email_e = get_field('email_estimating','option');
		$email_o = get_field('email_office','option')  
		?>
		<ul class="fa-ul">
			<li>
				<span class="fa-li">
					<i class="fa fa-envelope"></i>
				</span>
				Estimating:
				<a href="<?php echo 'mailto:'.$email?>">
					<?php echo $email_e; ?>
				</a>
				<br>
				Office:
				<a href="<?php echo 'mailto:'.$email?>">
					<?php echo $email_o ?>
				</a>
			</li>
		</ul>
	<?php endif ?>
</div>
 
