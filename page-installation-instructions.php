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

            <!--Project Selector
            <div class="grid-container" style="margin-bottom: 3em;">
                <div class="grid-x align-center">
                    <div class="cell">
                        <h2 class="text-center">I'm Installing</h2>
                    </div>
                    <div class="medium-4 cell">
                        <?php
                            $products = get_posts([
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'numberposts' => -1,
                                'order'    => 'ASC'
                            ]);
                        ?>
                        <nav style="width: 100%; border: 1px solid #808080; border-radius: 3px;">
                            <ul class="dropdown menu select" data-dropdown-menu>
                                <li style="width: 100%;">
                                    <a href="#" style="color: #1a1a1a;">Select The Product You're Installing</a>
                                        <ul class="menu">
                                            <?php foreach ($products as $product) { 
                                                $args = array(
                                                    'post_type' => 'product',
                                                    'post_status' => 'publish'
                                                );

                                                $prod_query=new WP_Query($args);
                                            ?>
                                            <li><a href="#<?php echo $product->ID; ?>" title="<?php echo get_the_title( $product ); ?>""><?php echo get_the_title( $product ); ?></a></li>
                                            <?php } 
                                            
                                            wp_reset_postdata();
                                            ?>
                                        </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>-->

            <!--Listings section-->
            <section class="grid-container" style="margin-bottom: 3em;">
                <div class="grid-x grid-margin-x">
                    <?php
                    //Define Term ID
				    //$term_id = get_queried_object()->term_id;

				    //Define Taxonomy
				    $custom_terms = get_terms( array(
                        'taxonomy'	=> 'product_category',
                        'hide_empty' => false,
                        'include'		=> 'all',
                        //'child_of'	=> $term_id,
                        'orderby'		=> 'menu_order'
                    ));

				    if (count($custom_terms) > 0) {
					    foreach($custom_terms as $term) {

                            // echo '<pre>';
                            // echo print_r($custom_term);
                            // echo '</pre>';

                            $args = array(
                                'post_type' => 'products',
                                'post_status' => 'publish',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_category',
                                        'field' => 'slug',
                                        'terms' => $term->slug,
                                        'hide_empty' => true
                                    )
                                ),
                            );

						    $req_query = new WP_Query($args);
						
                            if($term) {
                                // Define taxonomy prefix
                                $taxonomy_prefix = 'product_category';

                                // Define term ID
                                $cat_image_id = $term->term_id;

                                // Define prefixed term ID
                                $term_id_prefixed = $taxonomy_prefix .'_'. $cat_image_id;

                                //Define Category Image Field
                                $product_category_image = get_field( 'product_category_image', $term_id_prefixed );
                                $size = 'product-gallery size';
                                $product_category_image_resize = wp_get_attachment_image_src( $product_category_image, $size );
                                $image_alt = get_post_meta($product_category_image, '_wp_attachment_image_alt', true);
                                ?>
                        
                                <div class="medium-6 cell" style="margin-bottom: 1em; border: 1px solid #cdcdcd;">
                                    <div class="grid-x grid-padding-x" style="padding-top: 1em; padding-bottom: 1em; background: #ebebeb; border-bottom: 1px solid #cdcdcd;">
                                        <div class="small-3 cell">
                                            <img src="<?php echo $product_category_image_resize[0] ?>" alt="<?php echo $image_alt ?>">
                                        </div>
                                        <div class="small-9 cell">
                                            <h3><?php echo $term->name ?></h3>
                                        </div>
                                    </div>

                                    <?php
                                    //Download Args
                                    $download_args = array(
                                        'post_type' => 'downloads',
                                        'post_status' => 'publish',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'download_category',
                                                'terms' => array(
                                                    '259'
                                                )
                                            )
                                        )
                                    );

                                    //Define Download
                                    $downloads = get_posts( $download_args );

                                    // echo '<pre>';
                                    // echo print_r($downloads);
                                    // echo '</pre>';

                                    //Test it all out
                                    // echo '<pre>';
                                    // echo print_r($custom_terms);
                                    // echo print_r($associated_products);
                                    // echo print_r($get_product_term);
                                    //  echo '</pre>';
                                    
                                    
                                    
                                    foreach ($downloads as $post) {
                                        //Get ACF Fields
                                        $file = get_field('file');
                                        $associated_products = get_field('associated_product');

                                        //Get the Associated Product taxonomy term
                                        $get_product_term = get_term($associated_product, 'product_category');

                                        echo '<pre>';
                                        echo print_r($term);
                                        // echo print_r($get_product_term);
                                        echo '</pre>';
                                        

                                        // if ($get_product_term == $custom_term) {

                                    ?>

                                    
                                            <div class="grid-x downloads">
                                                <div class="cell">
                                                    <a id="<?php foreach( $associated_products as $associated_product ) { echo $associated_product->ID.' '; } ?>" class="icon <?php 
                                                        if ($file['subtype'] == 'vnd.openxmlformats-officedocument.wordprocessingml.document') {
                                                            echo 'docx';
                                                        } else {
                                                            echo $file['subtype'];
                                                        }
                                                    ?>" href="<?php echo $file['url']; ?>" title="<?php 
                                                        the_title();
                                                        if ($file['subtype'] == 'vnd.openxmlformats-officedocument.wordprocessingml.document'){ 
                                                            echo 'DocX';
                                                        } else{ echo $file['subtype'];} ?>" target="_blank">
                                                            <?php the_title(); ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php }
                                            wp_reset_postdata();
                                    //    }
                                    ?>
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
