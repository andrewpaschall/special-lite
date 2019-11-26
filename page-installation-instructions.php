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
            
            <!--Hero-->
            <header section class="grid-x hero" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>'), linear-gradient(rgba(26,26,26,.5) 0%, rgba(26,26,26,.5) 100%); background-size: cover; background-repeat: no-repeat; padding-top: 10em; padding-bottom: 10em; margin-bottom: 3em;">
                <div class="grid-container">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
            </header>

            <!--Project Selector-->
            <div class="grid-container" style="margin-bottom: 3em;">
                <div class="grid-x align-center">
                    <div class="cell">
                        <h2 class="text-center">I'm Installing</h2>
                    </div>
                    <div class="medium-4 cell">
                        <select onchange="location = this.value;">
                            <option>Option</option>
                            <option>Option</option>
                            <option>Option</option>
                            <option>Option</option>
                            <option>Option</option>
                        </select>
                    </div>
                </div>
            </div>

            <!--Listings section-->
            <section class="grid-container" style="margin-bottom: 3em;">
                <div class="grid-x grid-padding-x">
                <?php
					//Define Term ID
					$term_id = get_queried_object()->term_id;

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
						$product_category_image = get_field( 'product_category_image', $term_id_prefixed );?>
                        
                        <div class="medium-6 cell">
                            <div class="grid-x" style="margin-bottom: 1em;">
                                <div class="small-4">
                                    <img src="<?php echo $product_category_image['url'] ?>" alt="<?php echo $product_category_image['alt'] ?>">
                                </div>
                                <div class="small-8">
                                    <h3><?php echo $custom_term->name ?></h3>
                                </div>
                            </div>
                            <div class="grid-x">
                                <div class="cell">
                                    <ul>
                                        <li id=""><a href="" title="">Instructions</a></li>
                                        <li id=""><a href="" title="">Instructions</a></li>
                                        <li id=""><a href="" title="">Instructions</a></li>
                                        <li id=""><a href="" title="">Instructions</a></li>
                                        <li id=""><a href="" title="">Instructions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
					<?php	}
					wp_reset_postdata(); ?>
				</div>
                    <div class="medium-6 cell">
                    </div>
                </div>            
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
