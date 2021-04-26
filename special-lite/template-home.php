<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!--Hero Slideshow-->
			
			<?php if ( have_rows( 'slideshow_settings' ) ) : ?>
				<?php while ( have_rows( 'slideshow_settings' ) ) : the_row(); ?>
					<section class="hero-slider">
						<div class="hero center-feature" style="background: linear-gradient(rgba(0, 0, 0,.5), rgba(0, 0, 0,.5)), url('<?php if ( $background_image ) {echo $background_image['url'];} ?>'); background-size: cover; background-position: top center">
							<div class="grid-container">
								<div class="grid-x align-center">
									<div class="cell flex-container align-center-middle flex-dir-column">
										<h1><?php the_sub_field( 'heading' ); ?></h1>
										<h2><?php the_sub_field( 'sub-heading' ); ?></h2>
										<?php if ( have_rows( 'call_to_action_button' ) ) : ?>
											<?php while ( have_rows( 'call_to_action_button' ) ) : the_row(); ?>
												<a href="<?php the_sub_field( 'link' ); ?>" class="button large c2a success"><?php the_sub_field( 'text' ); ?></a>
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</section>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
