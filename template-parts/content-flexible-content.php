<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php //special_lite_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(); ?>

        <!--Flexible Content-->
			
			<?php if ( have_rows( 'page_content' ) ): ?>
                <?php while ( have_rows( 'page_content' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'one_column' ) : ?>
                        <?php if ( have_rows( 'one_column' ) ): ?>
                            <?php while ( have_rows( 'one_column' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                    <?php elseif ( get_row_layout() == 'two_column' ) : ?>
                        <?php if ( have_rows( 'column_1' ) ): ?>
                            <?php while ( have_rows( 'column_1' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'column_2' ) ): ?>
                            <?php while ( have_rows( 'column_2' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                    <?php elseif ( get_row_layout() == 'three_column' ) : ?>
                        <?php if ( have_rows( 'column_1' ) ): ?>
                            <?php while ( have_rows( 'column_1' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'column_2' ) ): ?>
                            <?php while ( have_rows( 'column_2' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'column_3' ) ): ?>
                            <?php while ( have_rows( 'column_3' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                    <?php elseif ( get_row_layout() == 'four_column' ) : ?>
                        <?php if ( have_rows( 'column_1' ) ): ?>
                            <?php while ( have_rows( 'column_1' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'column_2' ) ): ?>
                            <?php while ( have_rows( 'column_2' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'column_3' ) ): ?>
                            <?php while ( have_rows( 'column_3' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'column_4' ) ): ?>
                            <?php while ( have_rows( 'column_4' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'image' ) : ?>
                                    <?php $image = get_sub_field( 'image' ); ?>
                                    <?php if ( $image ) { ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php } ?>
                                <?php elseif ( get_row_layout() == 'content' ) : ?>
                                    <?php the_sub_field( 'content' ); ?>
                                <?php elseif ( get_row_layout() == 'button' ) : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                    <?php the_sub_field( 'link' ); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php // no layouts found ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <?php // no layouts found ?>
            <?php endif; ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'special-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'special-lite' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
