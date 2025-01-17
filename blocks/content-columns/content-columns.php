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
<?php if( have_rows('content_column') ): ?>
	<?php while( have_rows('content_column') ): the_row(); ?>
		
		<?php
		$container = $padding = $reverse = $img_rev = $center = $text_class = '';
		$col_1 = 'col-lg-5';
		$col_2 = 'col-lg-7';
		$text_padding = 'ps-lg-4 ps-xxl-5';
		
		if( get_sub_field('container') ){
			$container = get_sub_field('container');
		}
		if( get_sub_field('padding') ){
			$padding = get_sub_field('padding');
		}
		if( get_sub_field('center') ){
			$center = 'align-items-xl-center';
		}
		if( get_sub_field('text_class') ){
			$text_class = get_sub_field('text_class');
		}
		
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
		
		if( get_sub_field('reverse') ){
			$reverse = 'order-lg-1';
			$img_rev = 'img-rev';
			$text_padding = 'pe-lg-4 pe-xxl-5';
		}
		
		if( get_sub_field('inverse') ){
			$col_1_og = $col_1;
			$col_1 = $col_2;
			$col_2 = $col_1_og;
		}
		?>
		
		<section <?php echo esc_attr( $anchor ); ?> class="content-column <?php echo $add_class; ?>">
			<div class="<?php echo $container.' '.$padding ?>">
				
				<div class="row <?php echo $center ?>">
					<div class="<?php echo $col_1.' '.$reverse ?>">
						
						<?php get_template_part( 'partial-templates/image', null, array('img_rev' => $img_rev ) ); ?>
						
					</div>
					
					<div class="<?php echo $col_2 ?>">
						<div class="<?php echo $text_padding.' '.$text_class; ?>">
							
							<InnerBlocks />	
								
						</div>
					</div>
				</div>
							
			</div>
		</section>
		
	<?php endwhile; ?>
<?php endif; ?>