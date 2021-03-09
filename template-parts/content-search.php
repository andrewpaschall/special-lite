<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-container'); ?> style="margin-bottom: 2em; padding-bottom: 2em; border-bottom: 2px solid #ccc;">
		<div class="grid-x grid-padding-x align-center-middle">
			<?php if(has_post_thumbnail()) {?>
				<div class="medium-4 cell">
					<?php the_post_thumbnail($size = 'product-gallery size'); ?>
				</div>
			<?php } ?>
				<div class="<?php if(has_post_thumbnail()) { echo 'medium-8'; } ?> cell">
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

						<?php if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php
								special_lite_posted_on();
								special_lite_posted_by();
								?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header>
					
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
