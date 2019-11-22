<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Special-Lite
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found grid-container" style="margin-top: 10vh; margin-bottom: 10vh;">
				<div class="grid-x grid-padding-x align-center">
					<div class="medium-3 cell">
						<img src="/wp-content/uploads/2019/06/AF-200.png" alt="Door">
					</div>
					<div class="medium-6 cell">
						<header class="page-header">
							<h1 class="page-title" style="font-size: 10em;">404</h1>
							<h2><?php esc_html_e( 'Nothing to see behind this door. But there are plenty more to&nbsp;try.', 'special-lite' ); ?></h2>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search and see what you can find?', 'special-lite' ); ?></p>

								<?php
								get_search_form();
								?>
							</div>
						
					</div><!-- .page-content -->

				</div><!-- .grid-x -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
