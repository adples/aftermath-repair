<?php
/**
 * Partial - List
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php 
$add_class = isset($args['class']) ? $args['class'] : '';
$list = [];
$i=0;
$use_icon = '';
$icon = '';

if( get_field('use_icon') || get_sub_field('use_icon')){
	$use_icon = true;
}

if( get_field('icon') ){
	$icon = get_field('icon');
} elseif( get_sub_field('icon') ){
	$icon = get_sub_field('icon');
}

if ( $use_icon == true && get_field('icon') || $use_icon == true && get_sub_field('icon') ){
	$list_class = 'fa-ul list-icon';
} else {
	$list_class = 'list-unstyled';
}

if( get_sub_field('split') || get_field('split') ):
	$list_col = 'list-col';
	
	if( have_rows('list') ):
		while( have_rows('list') ): the_row();
			if( get_sub_field('list_item') ):
				$list[$i] = get_sub_field('list_item');
			endif;
			$i++;
		endwhile;
		
		$len = (int) count($list);
		$list_1 = array_slice($list, 0, round($len / 2));
		$list_2 = array_slice($list, round($len / 2));
	endif;
endif;

if( get_field('color') ):
	$color = get_field('color');
elseif( get_sub_field('color') ):
	$color = get_sub_field('color');
else:
	$color = '';
endif;
?>

<?php if( get_sub_field('split') || get_field('split') ): ?>
	<?php if( get_field('list') || get_sub_field('list') ): ?>
	<div class="row">
		<div class="col-lg-6">
			<ul class="<?php echo $list_class.' '.$color.' '.$add_class; ?>">
				<?php foreach ($list_1  as $li): ?>
					<li>
						<?php if( $use_icon == true && $icon != '' ){ echo list_icon($icon); } ?>
						<?php echo $li; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-lg-6">
			<ul class="<?php echo $list_class.' '.$color.' '.$add_class; ?>">
				<?php foreach ($list_2  as $li): ?>
					<li>
						<?php if( $use_icon == true && $icon != ''){ echo list_icon($icon); } ?>
						<?php echo $li; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php endif; ?>
	
<?php else: ?>
	
	<?php if( have_rows('list') ): ?>
		<ul class="<?php echo $list_class.' '.$color.' '.$add_class; ?>">
			<?php while( have_rows('list') ): the_row(); ?>
				<?php if( get_sub_field('list_item') ): ?>
					<li>
						<?php if( $use_icon == true && $icon != '' ){ echo list_icon($icon); } ?>
						<?php the_sub_field('list_item') ?>
					</li>
				<?php endif; ?>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	
<?php endif; ?>
