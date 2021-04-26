<?php
/**
 * Block Name: Hero 1
 *
 * This is the template that displays the block for a background image and centered text and c2a.
 */

// get image field (array)
$background_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

// convert hexidecimal to RGB
function hex2rgb($hex) {
$hex = str_replace("#", "", $hex);

if(strlen($hex) == 3) {
	$r = hexdec(substr($hex,0,1).substr($hex,0,1));
	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
} else {
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
}
$rgb = array($r, $g, $b);

return $rgb; // returns an array with the rgb values
}

$Hex_color = get_field('overlay_color');
$RGB_color = hex2rgb($Hex_color);

$Final_Rgb_color = implode(", ", $RGB_color);

// create id attribute for specific styling
$id = 'hero-' . $block['id'];

/* create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';*/

?>
<header class="hero left-feature" style="background: linear-gradient(rgba(<?php echo $Final_Rgb_color ?>,<?php the_field( 'overlay_opacity' ); ?>), rgba(<?php echo $Final_Rgb_color ?>,<?php the_field( 'overlay_opacity' ); ?>)), url(<?php echo $background_image[0]; ?>); background-size: cover; background-position: <?php the_field( 'background_position' ); ?>;">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1><?php the_field( 'headline_text' ); ?></h1>
				<h2><?php the_field( 'sub_headline_text' ); ?></h2>
				<?php if ( have_rows( 'call_to_action_button' ) ) : ?>
					<?php while ( have_rows( 'call_to_action_button' ) ) : the_row(); ?>
						<a href="<?php the_sub_field( 'link' ); ?>" class="button large c2a success"><?php the_sub_field( 'text' ); ?></a>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>