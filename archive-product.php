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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			<section class="grid-container">

				<div class="grid-x grid-padding-x">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						//the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</section>
				
			</header><!-- .page-header -->
			<section class="grid-container">
				<div class="grid-x grid-padding-x">
				<?php
					//Define Term ID
					//$term_id = get_queried_object()->term_id;

					//Define Taxonomy
					$custom_terms = get_terms( array(
						'taxonomy'	=> 'product_category',
						'hide_empty' => false,
						'orderby' => 'name',
						'order'	=> 'ASC',
						'parent' => 0
					));

					foreach($custom_terms as $custom_term) {

						$req_query = new WP_Query();
						
						// Define taxonomy prefix
						$taxonomy_prefix = 'product_category';

						// Define term ID
						$cat_image_id = $custom_term->term_id;

						// Define prefixed term ID
						$term_id_prefixed = $taxonomy_prefix .'_'. $cat_image_id;

						//Define Category Image Field
						$product_category_image = get_field( 'product_category_image', $term_id_prefixed );
						$size = 'product-gallery size';
						$product_category_image_resize = wp_get_attachment_image_src( $product_category_image, $size );
						?>
						<div class="medium-6 large-3 cell">
						<div class="hover-slide-card card">
								<a href="<?php echo get_term_link($custom_term) ; ?>" title="<?php echo $custom_term->name ?>">
									<img src="<?php echo $product_category_image_resize[0] ?>" alt="<?php echo $product_category_image['alt'] ?>">
									<footer id="hoverSlideFooter" class="card-title hover-slide-footer">
										<h4><?php echo $custom_term->name ?></h4>
									</footer>
								</a>
							</div>
						</div>
							

					<?php	}
					wp_reset_postdata(); ?>
				</div>
			</section>
			

		<?php endif;?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();