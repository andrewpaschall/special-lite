//Form Logic
    
    //States v Province v Territory
    function countrySelect() {
        //Get country value
        var country = document.getElementById('country_select').value;
        console.log( country );
        
        if (country === 'United States') {
            console.log('You have selected United States');
            document.getElementById('state_label').classList.remove('hide');
            // document.getElementById('county_label').classList.remove('hide');
            document.getElementById('province_label').classList.add('hide');
            document.getElementById('territory_label').classList.add('hide');
            document.getElementById('region_label').classList.add('hide');

        } else if (country === 'Canada') {
            console.log('You have selected Canada');
            document.getElementById('province_label').classList.remove('hide');
            document.getElementById('state_label').classList.add('hide');
            document.getElementById('county_label').classList.add('hide');
            document.getElementById('territory_label').classList.add('hide');
        } else if (country === 'US Territories') {
            console.log('You have selected US Territories');
            document.getElementById('territory_label').classList.remove('hide');
            document.getElementById('province_label').classList.add('hide');
            document.getElementById('state_label').classList.add('hide');
            document.getElementById('county_label').classList.add('hide');
            document.getElementById('region_label').classList.add('hide');
        }else {
            console.log('nothing going on here');
            document.getElementById('province_label').classList.add('hide');
            document.getElementById('state_label').classList.add('hide');
            document.getElementById('territory_label').classList.add('hide');
            // document.getElementById('county_label').classList.add('hide');
            document.getElementById('region_label').classList.add('hide');
        };
    }

    //Region
    function provinceSelect() {
        //Get Country Value 0000 I know I suck at code
        var country = document.getElementById('country_select').value;

        //Get province value
        var province = document.getElementById('province_select').value;
        if (country === 'Canada' && province === 'Ontario') {
            console.log('Ontario is selected');
            document.getElementById('region_label').classList.remove('hide');
        } else {
            console.log('Ontario is not selected');
            document.getElementById('region_label').classList.add('hide');
        };
    }

    //Counties
    function stateSelect() {
        //Country
        var country = document.getElementById('country_select').value;

        //Get State Value
        var us_state = document.getElementById('state_select').value;

        if (country === 'United States' && us_state !== 'District of Columbia' && us_state !== 'null') {
            console.log(us_state+' selected');
            document.getElementById('county_label').classList.remove('hide');
            (function($) {
                $.ajax({
                    
                })
            }
            )
        } else {
            console.log('No State Selected');
            document.getElementById('county_label').classList.add('hide');
        }


    }

//AJAX jQuery
(function($) {
    $.ajax({
        type : 'post',
        dataType : 'json',
        url : replocator_globals.ajax_url,
        data : {
            _ajax_nonce: replocator_globals.nonce
        }
    })

    $.ajax({
        success: function( response ) {
            if( 'success' === response.type ) {
                //Do something with Response
                console.log( 'all good here' );
            } else {
                //Something went wrong
                console.log( 'shit\'s fucked' );
            }
        }
    })

})( jQuery );