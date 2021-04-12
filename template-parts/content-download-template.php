<?php
/**
 * Template part for displaying page content in template-downloads.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: #fefefe;">
	<?php  if (has_post_thumbnail($post->ID)):
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<header class="entry-header hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('<?php echo $image[0]; ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover; padding: 20vh 0; margin-bottom: 2em; text-transform: uppercase;">
			<div class="grid-container">
				<div class="grid-x align-center-middle">
					<?php the_title( '<h1 class="entry-title" style="font-size: calc(3.5em + (6 - 3.5) * ((100vw - 320px) / (2200 - 320))); text-align: center;">', '</h1>' ); ?>
				</div>
			</div>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php //special_lite_post_thumbnail();	?>

    <section class="grid-container">
        <div class="grid-x grid-padding-x download-list">
            <aside class="medium-3 cell downloads-filter off-canvas position-right" id="mobileContentFilter" data-off-canvas data-options="inCanvasFor:medium">
				<div class="grid-x hide-for-medium close-button-container">
					<button class="close-button" aria-label="Close menu" type="button" data-close>
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                <?php get_sidebar('downloads') ?>
			</aside>
            <div class="medium-9 cell off-canvas-content" style="padding: 0;">
                <div class="entry-content">
                    <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'special-lite' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                </div><!-- .entry-content -->
			</div>


		</div>

		<button type="button" class="hide-for-medium filter-button" data-toggle="mobileContentFilter">
			<div class="button-content">
				<img src="/wp-content/themes/WPGulpTheme/assets/img/sl-filter.svg" alt="filter">
				<div>Filter Results</div>
			</div>
		</button>
    </section>
</article><!-- #post-<?php the_ID(); ?> -->
