<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

?>

<section class="no-results not-found" style="margin-top: 20vh; margin-bottom: 20vh;">
	<header class="page-header grid-container">
		<h1 class="page-title"><?php esc_html_e( 'Sorry, we couldn\'t find that.', 'special-lite' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="grid-container"
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'special-lite' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

				<p><?php esc_html_e( 'Nothing matched what you were looking for. Please try again with a different search.', 'special-lite' ); ?></p>
				<?php
				get_search_form();

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'special-lite' ); ?></p>
				<?php
				get_search_form();

			endif;
			?>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
