<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-container'); ?> style="margin-top: 2em; margin-bottom: 2em;">
	<div class="grid-x grid-padding-x">
		<div id="entry-content" class="medium-8 cell">
			<header class="entry-header grid-x">
				<?php special_lite_post_thumbnail(); ?>
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
				?>
					<div class="entry-meta">
						<?php
						special_lite_posted_on();
						special_lite_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-content grid-x">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'special-lite' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'special-lite' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<?php the_post_navigation(); ?>
		</div>
		<div class="medium-4 cell">
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<aside class="medium-4 cell show-for-medium" data-sticky-container>
					<div class="sidebar-box sticky" data-margin-bottom="3" data-sticky data-anchor="entry-content" >
						<?php dynamic_sidebar('sidebar-3'); ?>
					</div>
				</aside>
			<?php endif; ?>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
