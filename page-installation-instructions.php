<?php
/**
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
                        'include'		=> 'all',
                        'child_of'	=> $term_id,
                        'orderby'		=> 'menu_order'
                    ));


				    if (count($custom_terms) > 0) {
					    foreach($custom_terms as $custom_term) {

                            $args = array(
                                'post_type' => 'products',
                                'post_status' => 'publish',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_category',
                                        'field' => 'slug',
                                        'terms' => $custom_term->slug,
                                        'hide_empty' => true
                                    )
                                ),

                                //'post__in' => $associated_downloads
                            );

						    $req_query = new WP_Query($args);
						
                            if($custom_term) {
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
                                $image_alt = get_post_meta($product_category_image, '_wp_attachment_image_alt', true);
                                ?>
                        
                                <div class="medium-6 cell">
                                    <div class="grid-x grid-padding-x" style="margin-bottom: 1em;">
                                        <div class="small-3 cell">
                                            <img src="<?php echo $product_category_image_resize[0] ?>" alt="<?php echo $image_alt ?>">
                                        </div>
                                        <div class="small-9 cell">
                                            <h3><?php echo $custom_term->name ?></h3>
                                        </div>
                                    </div>
                                    <div class="grid-x">
                                        <ul class="cell">
                                            <li id=""><a href="" title="">Instructions</a></li>
                                            <li id=""><a href="" title="">Instructions</a></li>
                                            <li id=""><a href="" title="">Instructions</a></li>
                                            <li id=""><a href="" title="">Instructions</a></li>
                                            <li id=""><a href="" title="">Instructions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php	}
                        }
                        
                        wp_reset_postdata();
                    
                    }?>
                
                </div>          
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
