<?php
/**
 * Partial - Content Columns
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $class = isset($args['class']) ? $args['class'] : ''; ?>


<?php if( have_rows('content_col') ): ?>
	
<?php $section_flag = 0; ?>

<div class="content-columns">
	<?php while( have_rows('content_col') ): the_row(); ?>
		
		<?php
		//Apply Column Options
		if( have_rows('col_options') ):
			while( have_rows('col_options') ): the_row();
				//Set Column Width
				if( get_sub_field('col_width') == '6_6' ):
					$col_1 = 'col-lg-6';
					$col_2 = 'col-lg-6';
				elseif ( get_sub_field('col_width') == '2_10' ):
					$col_1 = 'col-lg-2';
					$col_2 = 'col-lg-10';
				elseif ( get_sub_field('col_width') == '3_9' ):
					$col_1 = 'col-lg-3';
					$col_2 = 'col-lg-9';
				elseif ( get_sub_field('col_width') == '4_8' ):
					$col_1 = 'col-lg-4';
					$col_2 = 'col-lg-8';
				elseif ( get_sub_field('col_width') == '5_7' ):
					$col_1 = 'col-lg-5';
					$col_2 = 'col-lg-7';
				endif;
				
				if($class == 'cta-col'):
					$col_1 = 'd-none';;
				endif;
				
				//Get Padding Class
				if( get_sub_field('content_padding') ):
					$padding = get_sub_field('content_padding');
				else:
					$padding = '';
				endif;
				
				//Get Vertically Centered Class
				if( get_sub_field('center') ):
					$vc = 'align-items-center';
				else:
					$vc = '';
				endif;
				
				//Get Reverse Col Order
				if( get_sub_field('reverse') ):
					$order = 'order-lg-1';
				else:
					$order = '';
				endif;
				
			endwhile;
		endif;
		?>
		
		<div class="row <?php echo $vc.' '.$class; ?>">
			<div class="position-relative <?php echo $col_1.' '.$order; ?>">
				<?php if( have_rows('col_img') ): ?>
					<?php while( have_rows('col_img') ): the_row(); ?>
						
						<?php if( !get_sub_field('caption') ): $mb = 'mb-3'; else: $mb = ''; endif; ?>
						
						<?php if( get_sub_field('img') ): ?>
							
							<?php if( get_sub_field('stretch') ): ?>
								<?php
								$img = get_sub_field('img');
								$img_md = wp_get_attachment_image_src($img['id'], 'medium_large');
								$img_full = wp_get_attachment_image_src($img['id'], 'full');
								?>
								<div class="img-wrapper stretch <?php echo $mb; ?> mb-0" style="background-image:url(<?php echo $img_full[0]; ?>)"></div>
							<?php else: ?>
								<?php $img = get_sub_field('img'); ?>
								<div class="img-wrapper <?php echo $mb; ?> mb-0">
									<img src="<?php echo esc_url($img['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($img['alt']); ?>" />
								</div>
							<?php endif; ?>
						<?php endif; ?>
						
						<?php if( get_sub_field('caption') ): ?>
							<div class="img-caption mb-3 mb-lg-0"><?php the_sub_field('caption'); ?></div>
						<?php endif; ?>
						
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			
			<div class="<?php echo $col_2; ?>">
				<div class="col-content <?php echo $padding ?>">
					
					<?php
					if( have_rows('col_heading') ):
						while( have_rows('col_heading') ): the_row();
							$level = get_sub_field('level');
							$style = get_sub_field('style');
							if( get_sub_field('heading') ):
								echo '<'.$level.' class="'.$style.' accent-title mb-3 mb-xl-4"><span>'.get_sub_field('heading').'</span></'.$level.'>';
							endif; 
						endwhile; 
					endif;
					
					if( get_sub_field('col_content') ):
						the_sub_field('col_content');
					endif;
					?>
					
					<?php
					if( get_sub_field('add_list') ):
						get_template_part( 'partial-templates/list', null, array('list' => 'icon-list') );
					endif;
					?>
					
					<?php
					if( get_sub_field('add_btn') ):
						get_template_part( 'partial-templates/btn' );
					endif;
					?>
					
				</div>
			</div>
		</div>
		<?php $section_flag++; ?>
	<?php endwhile; ?>
</div>
<?php endif; ?>
