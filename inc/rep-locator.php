<?php

//Rep locator
function rep_locator_scripts() {
    if (is_page('96')) {
		wp_enqueue_script( 'rep-locator-js', get_template_directory_uri() . '/js/rep-locator.js', array(), '20151215', true );

		//Localize Rep Locator
			wp_localize_script(
				'rep-locator-js',
				'replocator_globals',
				[
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'site_url' => esc_url( home_url() ),
					'nonce' => wp_create_nonce( 'rep_locator' )
				]
			);
		}
}

add_action ('wp_enqueue_scripts', 'rep_locator_scripts');

function replocator_acf() {
    check_ajax_referer( 'rep-locator' );

    //US Counties
    $alabama = get_field( 'alabama_counties' );
    $alaska = get_field( 'alaska_counties' );
    $arizona = get_field( 'arizona_counties' );
    $arkansas = get_field( 'arkansascounties' );
    $california = get_field( 'california_counties' );
    $colorado = get_field( 'colorado_counties' );
    $connecticut = get_field( 'connecticut_counties' );
    $delaware = get_field( 'delaware_counties' );
    $florida = get_field( 'florida_counties' );
    $georgia = get_field( 'georgia_counties' );
    $hawaii = get_field( 'hawaii_counties' );
    $idaho = get_field( 'idaho_counties' );
    $illinois = get_field( 'illinois_counties' );
    $indiana = get_field( 'indiana_counties' );
    $iowa = get_field( 'iowa_counties' );
    $kansas = get_field( 'kansas_counties' );
    $kentucky = get_field( 'kentucky_counties' );
    $louisiana = get_field( 'louisiana_counties' );
    $maine = get_field( 'maine_counties' );
    $maryland = get_field( 'maryland_counties' );
    $massachusetts = get_field( 'massachusetts_counties' );
    $michigan = get_field( 'michigan_counties' );
    $minnesota = get_field( 'minnesota_counties' );
    $mississippi = get_field( 'mississippi_counties' );
    $missouri = get_field( 'missouri_counties' );
    $montana = get_field( 'montana_counties' );
    $nebraska = get_field( 'nebraska_counties' );
    $nevada = get_field( 'nevada_counties' );
    $newHampshire = get_field( 'new_hampshire_counties' );
    $newJersey = get_field( 'new_jersey_counties' );
    $newMexico = get_field( 'new_mexico_counties' );
    $newYork = get_field( 'new_york_counties' );
    $northCarolina = get_field( 'north_carolina_counties' );
    $northDakota = get_field( 'north_dakota_counties' );
    $ohio = get_field( 'ohio_counties' );
    $oklahoma = get_field( 'oklahoma_counties' );
    $oregon = get_field( 'oregon_counties' );
    $pennsylvania = get_field( 'pennsylvania_counties' );
    $rhodeIsland = get_field( 'rhode_island_counties' );
    $southCarolina = get_field( 'south_carolina_counties' );
    $southDakota = get_field( 'south_dakota_counties' );
    $tennessee = get_field( 'tennessee_counties' );
    $texas = get_field( 'texas_counties' );
    $utah = get_field( 'utah_counties' );
    $vermont = get_field( 'vermont_counties' );
    $virginia = get_field( 'virginia_counties' );
    $washington = get_field( 'washington_counties' );
    $westVirginia = get_field( 'west_virginia_counties' );
    $wisconsin = get_field( 'wisconsin_counties' );
    $wyoming =  get_field( 'wyoming_counties' );

    //Success
    $success = 'This is a string';


    if( true == $success ) {
        $response[] = $alabama;
    }

    $response = json_encode( $response );
    echo $response;
    die();

}

add_action( 'wp_ajax_replocator_acf', 'replocator_acf' );
add_action( 'wp_ajax_nopriv_replocator_acf', 'replocator_acf' );
	