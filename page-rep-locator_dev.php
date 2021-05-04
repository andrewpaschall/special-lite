<?php
/**
 * The template for displaying the Rep Locator
 *
 *
 * @package Special-Lite
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: #fefefe; margin-bottom: 2em;">
	<?php  if (has_post_thumbnail($post->ID)):
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<header class="entry-header hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('<?php echo $image[0]; ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover; padding: 20vh 0; margin-bottom: 2em; text-transform: uppercase;">
			<div class="grid-container">
				<div class="grid-x align-center-middle">
					<?php the_title( '<h1 class="entry-title" style="font-size: calc(4em + (6 - 4) * ((100vw - 320px) / (2200 - 320))); text-align: center;">', '</h1>' ); ?>
				</div>
			</div>
		</header><!-- .entry-header -->
	<?php endif; ?>

    <?php //special_lite_post_thumbnail();
        function replocator_form_options() {
            check_ajax_referer( 'rep_locator' );

            //Do something with WordPress
            $response[ 'custom' ] = "Do something custom";
            $response[ 'success' ] = true;

            //Encode
            $response = json_encode( $response );
            echo $response;
            die();
        }
        add_action( 'wp_ajax_replocator_form_options', 'replocator_form_options' );
        add_action( 'wp_ajax_nopriv_replocator_form_options', 'replocator_form_options')

    ?>

	<div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="medium-4 cell">
                <form>
                    <?php
                        $country = get_terms('country');
                        $state = get_terms('state');
                        $province = get_terms('province');
                        $territory = get_terms('territory');
                        //print_r($country);
                        ?>
                    <label>
                        Choose Your Country
                        <select id="country_select" onChange="countrySelect()">
                            <option value="null"></option>
                            <?php foreach($country as $country) { ?>
                                <option value="<?php echo $country->name?>">
                                    <?php echo $country->name?>
                                </option>
                            <?php } ?>
                        </select>
                    </label>
                    <label id="state_label" class="hide">
                        Choose Your State
                        <select id="state_select" onChange="stateSelect()">
                            <option value="null"></option>
                            <?php foreach($state as $state) {
                                echo '<option value="' . $state->name . '">' . $state->name . '</option>';
                            }?>
                        </select>
                    </label>
                    <label id="province_label" class="hide">
                        Choose Your Province
                        <select id="province_select" onChange="provinceSelect()">
                            <option value="null"></option>
                            <?php foreach($province as $province) {
                                echo '<option value="' . $province->name . '">' . $province->name . '</option>';
                            }?>
                        </select>
                    </label>
                    <label id="territory_label" class="hide">
                        Choose Your Territory
                        <select id="territory_select">
                            <option value="null"></option>
                            <?php foreach($territory as $territory) {
                                echo '<option value=" ' . $territory->name . '">' . $territory->name . '</option>';
                            }?>
                        </select>
                    </label>
                    <label id="county_label" class="hide">
                        Choose Your County
                        <select>
                            <option value="null"></option>
                        </select>
                    </label>
                    <label id="region_label" class="hide">
                        Choose Your Region
                        <select>
                            <option>Here's some Options</option>
                        </select>
                    </label>
                </form>
            </div>
            <div class="medium-8 cell">
                <div class="flex-container align-center-middle" style="background: #EBEBEB; padding: 2em; flex-direction: column;">
                    <!--Logo-->
                    <div>
                        <img src="https://placekitten.com/400/200" />
                    </div>
                    <!--Rep Info-->
                    <div>
                        <div>
                            <h3>Agency Name</h3>
                            <h4 style="font-weight: 400; color: #333;">Main Contact Name</h4>
                            <p>https://website.com</p>
                            <p>email@address.com</p>
                            <p><a style="color: #333; text-decoration: underline;">(555) 555-5555</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
//get_sidebar();
get_footer();