<?php
/**
 * Block template file: 
 *
 * Card Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'card-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-card';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
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

<div id="<?php echo esc_attr( $id ); ?>" class="card <?php echo esc_attr( $classes ); ?> <?php the_field( 'card_image_style' ); ?> <?php if ( get_field( 'card_border' ) == 1 ) { echo 'border'; } ?>" style="background: <?php the_field( 'card_background_color' );?>; <?php if(get_field('card_border') == 1){ echo 'border-color:'; the_field('border_color');} ?>; text-align: <?php the_field('text_align'); ?>;">
	<?php $card_image = get_field( 'card_image' ); ?>
	<?php if ( $card_image ) { ?>
		<img src="<?php echo $card_image['url']; ?>" alt="<?php echo $card_image['alt']; ?>" />
	<?php } ?>
    <div class="card-section">
        <h4><?php the_field( 'card_header' ); ?></h4>
        <?php $card_content = get_field( 'card_content' );
            if ($card_content) {
                echo '<p>'.$card_content.'</p>';
            }
        ?>
        <?php if ( have_rows( 'card_button' ) ) : ?>
            <?php while ( have_rows( 'card_button' ) ) : the_row(); ?>
                <?php 
                    $card_url = get_sub_field('url');
                    if($card_url){ ?>
                        <a href="<?php the_sub_field( 'url' ); ?>" title="<?php the_sub_field( 'button_text' ); ?>" class="button" <?php if(get_field('new_tab') == 1 ){echo 'target="_blank"';} ?> ><?php the_sub_field( 'button_text' ); ?></a>
                    <?php } endwhile; ?>
        <?php endif; ?>    
    </div>
</div>