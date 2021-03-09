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
		<section class="grid-container">
			<div class="grid-x grid-padding-x">
				<aside class="medium-3 cell" style="border-right: 2px solid #ccc;">
				
				</aside>
				<div class="medium-9 cell">
					[facetwp template="blog_filter"]
				</div>
			</div>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
