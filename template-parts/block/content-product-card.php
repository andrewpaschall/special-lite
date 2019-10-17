<?php
/**
 * Block template file: 
 *
 * Product Card Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'product-card-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-product-card';
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
<?php
    // echo '<pre>';
    // print_r( get_field('product_card') );
    // echo '</pre>;'
    ?>
<?php
    $post_object = get_field( 'product_card', false, false );
    if ( $post_object ) {
        // override $post
        $post = $post_object;
        setup_postdata( $post );
        ?>
    <div class="card card-product">
        <a href="<?php echo get_permalink( $post_object ); ?>" title="<?php echo get_the_title( $post_object ) ?>">
            <header class="entry-header">
                <?php echo get_the_post_thumbnail( $post_object, 'product-gallery size' ); ?>
            </header>
            <footer class="entry-footer details">
                <h3 class="title"><?php echo get_the_title( $post_object ); ?></h3>
            </footer>
        </a>
    </div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the current page works correctly
    } ?>