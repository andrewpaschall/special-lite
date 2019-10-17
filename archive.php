<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="page-header">
				<section class="grid-container">
					<div class="grid-x">
						<div class="cell">
							<h1><?php echo get_the_archive_title(); ?></h1>
						</div>					
					</div>
				</section>
			</header><!-- .page-header -->

			<section class="grid-container" style="margin-top: 2em; margin-bottom: 2em;">
				<div class="grid-x grid-padding-x">
					<div id="archive-content" class="medium-8 cell facetwp-template archive-content">
						<?php 
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						while ( have_posts() ): the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('grid-x grid-padding-x'); ?>>
							
								
									<header>
										<?php
											echo '<a href="'.get_permalink($post->ID).'" title="'.get_the_title().'">';
												special_lite_post_thumbnail();
											echo '</a>';
										?>
									</header>
									<footer class="cell" <?php if(has_post_thumbnail()){ echo 'style="border-top: none;"';} ?>>
										<?php
											echo '<h3><a href="'.get_permalink($post->ID).'" title="'.get_the_title().'">';
												the_title();
											echo '</a></h3>';
										?>
										<div class="entry-meta">
											<?php
												special_lite_posted_on();
												special_lite_posted_by();
											?>
										</div>
											<?php 
												the_excerpt();
											?>
									</footer>
							</article>
						<?php endwhile;
							echo '<section class="grid-container" style="margin-bottom: 2em;">
							<div class="grid-x grid-padding-x align-center-middle">
								<div class="small-3 cell flex-container align-left">';
								previous_posts_link('« Previous Page');
								echo '</div>
								<div class="small-6 cell pagination flex-container align-center">';
								//the_posts_navigation();
								echo get_pagination_links();
								echo '</div>
								<div class="small-3 cell flex-container align-right">';
								next_posts_link('Next Page »');
								echo '</div>
							</div>
						</section>';
						
						?>

					</div>
					<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
						<aside class="medium-4 cell show-for-medium" data-sticky-container>
							<div class="sidebar-box sticky" data-margin-bottom="3" data-sticky data-anchor="archive-content" >
								<?php dynamic_sidebar('sidebar-3'); ?>
							</div>
						</aside>
					<?php endif; ?>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
