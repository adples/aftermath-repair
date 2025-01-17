<?php
/**
 * Partial - Locations
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$primary = isset($args['primary']) ? $args['primary'] : '';
$phone = isset($args['phone']) ? $args['phone'] : '';
$address = isset($args['address']) ? $args['address'] : '';
$contact = isset($args['contact']) ? $args['contact'] : '';
$service_area = isset($args['service_area']) ? $args['service_area'] : '';
$hours = isset($args['hours']) ? $args['hours'] : '';
$icon = isset($args['icon']) ? $args['icon'] : '';
$columns = isset($args['columns']) ? $args['columns'] : '';
$list_class = '';

if( $icon == true ){
	$list_class = 'fa-ul';
}

?>

<?php if( have_rows('locations','option') ): ?>
	<?php if( $primary == true ): ?>
		
		<?php while( have_rows('locations','option') ): the_row(); ?>
			
			<?php if( $contact == true ): //display primary phone & email ?>
				<?php if( get_sub_field('primary') ): ?>
					<ul class="<?php echo $list_class ?>">
						<?php if( get_sub_field('phone') ): $phone = get_sub_field('phone'); ?>
						<li>
							<?php if( $icon == true ){ echo list_icon('fa-phone'); } ?>
							<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
						</li>
						<?php endif; ?>
						
						<?php if( get_sub_field('email') ): $email = get_sub_field('email');  ?>
						<li>
							<?php if( $icon == true ){ echo list_icon('fa-envelope'); } ?>
							<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
						</li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
				
			<?php elseif( $address == true ): //display address ?>
				<?php get_template_part( 'partial-templates/address' ); ?>
				
			<?php elseif( $hours == true ): //display hours ?>
				<?php if( get_sub_field('primary') ): ?>
					<?php if( get_sub_field('hours') ): ?>
						<span class="d-block"><?php echo get_sub_field('hours') ?></span>
					<?php endif; ?>
				<?php endif; ?>
				
			<?php elseif( $service_area == true ): //displayservice area ?>
				<?php if( get_sub_field('service_area') ): ?>
					<?php if( get_sub_field('service_area') ): ?>
						<span class="d-block"><?php echo  get_sub_field('service_area') ?></span>
					<?php endif; ?>
				<?php endif; ?>
				
			<?php else: //display all info ?>
				<?php if( get_sub_field('primary') ): ?>
					<ul class="<?php echo $list_class ?>">
						<?php if( have_rows('address') ): ?>
							<li>
								<?php if( $icon == true ){ echo list_icon('fa-map-marker'); } ?>
								<?php get_template_part( 'partial-templates/address' ); ?>
							</li>
						<?php endif; ?>
						
						<?php if( get_sub_field('phone') ): $phone = get_sub_field('phone'); ?>
						<li>
							<?php if( $icon == true ){ echo list_icon('fa-phone'); } ?>
							<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
						</li>
						<?php endif; ?>
						
						<?php if( get_sub_field('email') ): $email = get_sub_field('email');  ?>
						<li>
							<?php if( $icon == true ){ echo list_icon('fa-envelope'); } ?>
							<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
						</li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			<?php endif; ?>
		<?php endwhile; ?>
		
	<?php elseif( $columns == true ): ?>
		
		<div class="row gx-xxl-5">
			<?php while( have_rows('locations','option') ): the_row(); ?>
				<div class="col-lg-4">
					<div class="location-item pb-4 pb-lg-0">
						
						<?php if( get_sub_field('map') ): ?>
							<div class="img-wrapper img-standard mb-4">
								<iframe src="<?php echo  get_sub_field('map') ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						<?php endif; ?>
						
						<ul class="fa-ul list-contact">
							<?php if( have_rows('address') ): ?>
								<li>
									<span class="fa-li"><i class="fa fa-map-marker"></i></span>
									<?php get_template_part( 'partial-templates/address' ); ?>
								</li>
							<?php endif; ?>
							<?php if( get_sub_field('phone') ): $phone = get_sub_field('phone'); ?>
								<li>
									<span class="fa-li"><i class="fa fa-phone"></i></span>
									<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
								</li>
							<?php endif; ?>
							
							<?php if( get_sub_field('email') ): $email = get_sub_field('email');  ?>
								<li>
									<span class="fa-li"><i class="fa fa-envelope"></i></span>
									<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								</li>
							<?php endif; ?>
							<?php if( get_sub_field('desc') ): ?>
								<li>
									<span class="fa-li"><i class="fa fa-star"></i></span>
									<em><?php echo get_sub_field('desc'); ?></em>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			<?php endwhile; ?>	
		</div>
		
	<?php endif; ?>
<?php endif; ?>