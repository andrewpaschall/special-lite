<?php
/**
 * Block template file: 
 *
 * Hover Slide card Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hover-slide-card-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-hover-slide-card';
if( ! empty( $block['className'] ) ) {
    $classes .= 'hover-slide-card card' . $block['className'];
}
if( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="hover-slide-card card <?php echo esc_attr( $classes ); ?>">
	<?php $hsc_image = get_field( 'hsc_image' ); ?>
    <a href="<?php the_field( 'hsc_link' ); ?>" title="<?php the_field( 'hsc_label' ); ?>">
        <?php if ( $hsc_image ) { ?>
            <img src="<?php echo $hsc_image['url']; ?>" alt="<?php echo $hsc_image['alt']; ?>" />
        <?php } ?>
        <footer id="hoverSlideFooter" class="card-title hover-slide-footer">
            <h4><?php the_field( 'hsc_label' ); ?></h4>
        </footer>
    </a>
</div>