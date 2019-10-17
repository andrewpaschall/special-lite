<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Special-Lite
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if ( have_posts() ) : ?>

			<header class="page-header grid-container" style="margin-top: 4em; margin-bottom: 4em;">
				<div class="grid-x grid-padding-x">
					<div class="cell">
						<h1 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'special-lite' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</div>
				</div>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

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

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
