<?php
get_header();
?>
<style>
    h1, h2, h3, h4, h5, h6 {
        font-weight: heavy;
    }

    label {
        color: #fefefe;
    }

    .section-title{
        text-align: center;
        color: #fefefe;
    }

    .section-title.black{
        color: #333;
    }
    .section-underline{
        width: 50px;
        display: block;
        margin: 0 auto 2rem auto;
        border-top: 3px solid #fefefe;
    }
    .section-underline.black {
        border-top: 3px solid #333;
    }

    #hourly_rate {
        border-radius: 0;
        width: 100%;
        max-width: 450px;
        display: block;
        margin-right: auto;
        margin-left: auto;
        border-top: none;
        border-right: none;
        border-bottom: 3px solid #fefefe;
        border-left: none;
        background: transparent; color: #fefefe;
        font-size: 3em;
        line-height: 1.1em;
        padding-top: 1em;
        padding-bottom: 1em;
        text-align: center;
        outline: none;
        box-shadow: none;
    }
    #hourly_rate:before {
        content: "jQuery";
        color: #fefefe;
        display: block;
    }
    
    #hourly_rate:focus {
        border-top: 0;
        border-right: 0;
        border-left: 0;
        box-shadow: none;
    }

    #gform_submit_button_12{
        background: #CE9411;
        padding-left: 3em;
        padding-right: 3em;
        border-radius: 0;
        display: block;
        margin-right: auto!important;
        margin-left: auto!important;
    }

    /** Counter Styling **/
    .counter-block {
        color: #fefefe;
        text-align: center;
    }
    .counter-block.black {
        color: #333;
    }
    .counter-display {
        font-weight: 900;
        font-size: 4em;
        margin: 0;
        line-height: 1em;
    }
    .counter-label {
        font-size: 1.25em;
        font-weight: 700;
        margin: 0;
    }
</style>
<!--Hero-->
<header style="background: #617088; color: #fefefe; padding-top: 2rem; padding-bottom: 4rem;">
    <div class="grid-container">
        <div class="grid-x align-bottom">
            <div class="medium-6 cell">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="medium-6 cell">
                <img src="/wp-content/uploads/2020/01/boxing-ring.svg">
            </div>
        </div>
    </div>
</header>

<div class="App"></div>

<!--Sign Up-->
<section class="grid-x grid-padding-x align-center-middle" style="background: linear-gradient(10deg, rgba(0, 0, 0, 0) 15%, rgba(0, 0, 0, .8) 60%), url(/wp-content/uploads/2020/01/boxing-knockout.svg); background-size: cover; background-position: top left; background-repeat: no-repeat; padding-bottom: 12rem; color: #fefefe;">
    <span style="width: 100%;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 141.42 70.71" width="30" height="30" style="margin-bottom: 8rem; display: block; margin-right: auto; margin-left: auto; position: relative; bottom: 8px;"><g><g><polygon style="fill: #C75443;" points="70.71 70.71 0 0 141.42 0 70.71 70.71"/></g></g></svg></span>
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-center">
            <div class="cell">
                <h3 class="text-center">Sign up below to learn more about FRP Doors and Frames and why they're a better choice than hollow metal</h3>
            </div>
            <div class="medium-6 cell">
                <?php gravity_form(12, false, false, false, '', true); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>