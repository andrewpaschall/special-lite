<?php
/**
 * The template for displaying the rep locator
 *
 * This template page is for the Rep Locator page only. This page must be hard coded based on its operation. 
 * You won't be finding any WordPress loop here.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

get_header();
?>
<style>
    #canState {display: none;}
    .repData {text-align: center; margin: 0 auto; margin-top: 25px; padding-top: 10px; padding-bottom: 10px; background-color: #f7f7f7; width: 100%;}
</style>
<div id="primary" class="content-area" style="background: #fefefe;">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: #fefefe;">
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
            <section class="grid-container" style="padding-bottom: 5em;">
                <div class="grid-x grid-margin-x">
                    <div class="medium-12 cell">
                        <h4 style="text-transform: initial; text-align: center; font-weight: 400;">Insert your postal code or use your country, city, and state to find your Sales Representative</h4>
                    </div> <!-- /medium-12 -->
                </div> <!-- /grid-x grid-margin-x -->

                <div class="grid-x grid-margin-x">
                    <div class="medium-4 cell">
                        <div class="grid-x grid-margin-x align-center">
                            <div class="cell">
                                <label>Enter Your Postal Code (US Only)</label>
                                <input id="zipcode" type="text" placeholder="Postal Code" />
                            </div>
                        </div><!-- /grid-x grid-margin-x -->
                        
                        <p style="font-weight: 700; font-size: 2rem; text-align: center;">Or</p>
                        
                        <div class="grid-x grid-margin-x">
                            <div class="cell" >
                                <label>Select Your Country</label>
                                <select id="country">
                                    <option value="US">United States</option>
                                    <option value="CAN">Canada</option>
                                </select>
                                <br />
                                <input id="city" type="text" placeholder="Enter City" /><br />
                                <label>Select Your State</label>
                                <select id="canState">
                                    <option value="AB">Alberta</option>
                                    <option value="BC">British Columbia</option>
                                    <option value="MB">Manitoba</option>
                                    <option value="NB">New Brunswick</option>
                                    <option value="NL">Newfoundland and Labrador</option>
                                    <option value="NS">Nova Scotia</option>
                                    <option value="ON">Ontario</option>
                                    <option value="PE">Prince Edward Island</option>
                                    <option value="QC">Quebec</option>
                                    <option value="SK">Saskatchewan</option>
                                    <option value="NT">Northwest Territories</option>
                                    <option value="NU">Nunavut</option>
                                    <option value="YT">Yukon</option>
                                </select>
                                <select id="usState">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                                <input id="submit" class="button large" type="submit" value="Submit" />
                            </div>
                        </div>
                    </div>
                    <div class="medium-8 cell flex-container align-center-middle repData" style="font-weight: 700; font-size: 1.75em;"> </div>
                </div>
            </section>
        </article>
    </main><!-- #main -->
</div><!-- #primary -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('#country').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if(valueSelected == 'US'){
                $('#usState').show();
                $('#canState').hide();
            }
            if(valueSelected == 'CAN'){
                $('#usState').hide();
                $('#canState').show();
            }
        });

        $('#submit').click(function(event){
            event.preventDefault();
            var zipcode = $('#zipcode').val();
            var city = $('#city').val();
            var optionSelected = $("#country option:selected").val();
            if(optionSelected == 'US'){
                var state = $('#usState').find(':selected').val();
            }
            if(optionSelected == 'CAN'){
                var state = $('#canState').find(':selected').val();
            }

            if(city.length > 1){
                $.ajax({
                    url: "//dev.special-lite.com/functions/zipcodeTest.php",
                    type: "POST",
                    data: {zipcode : zipcode, city : city, state : state},
                    success: function(result){
                        $('.repData').show();
                        $('.repData').html(result);
                    }
                });
            }else{
                $.ajax({
                    url: "//dev.special-lite.com/functions/zipcodeTest.php",
                    type: "POST",
                    data: {zipcode : zipcode},
                    success: function(result){
                        $('.repData').show();
                        $('.repData').html(result);
                    }
                });
            }
        });
        $('#zipcode').keypress(function(e){
            if(e.which == 13){//Enter key pressed
                $('#submit').click();//Trigger search button click event
            }
        });
    });
    </script>
<?php
//get_sidebar();
get_footer();