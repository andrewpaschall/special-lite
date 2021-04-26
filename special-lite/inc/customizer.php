<?php
/**
 * Special-Lite Theme Customizer
 *
 * @package Special-Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function special_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'special_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'special_lite_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'special_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function special_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function special_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function special_lite_customize_preview_js() {
	wp_enqueue_script( 'special-lite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'special_lite_customize_preview_js' );


/**
 * WPMU Tut on Customizer
 */
add_action ('customize_register', 'cd_customizer_settings');
function cd_customizer_settings($wp_customize) {
	//Sections
	$wp_customize->add_section('cd_alert', array(
		'title' => 'Alert',
		'priority' => 30,
	));

	$wp_customize->add_section('cd_footer', array(
		'title' => 'Footer Settings',
		'priority' => 90,
	));

	//Settings
	/**Alerts**/
	$wp_customize->add_setting('alert_background', array(
		'default' => '#22b573',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('display_header_alert', array(
		'default' => false,
		'transport' => 'refresh'
	));

	$wp_customize->add_setting( 'alert_text', array(
		'default' => '',
		'transport' => 'postMessage'
	));

	/**Footer**/
	$wp_customize->add_setting( 'enable_signup', array(
		'default' => 'show',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting( 'enable_social', array(
		'default' => 'show',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting( 'footer_columns', array(
		'default' => 4,
		'transport' => 'refresh'
	));

	$wp_customize->add_setting( 'column_1_label', array(
		'default' => 'Footer Nav Label',
		'transport' => 'postMessage',
	));

	$wp_customize->add_setting( 'column_2_label', array(
		'default' => 'Footer Nav Label',
		'transport' => 'postMessage',
	));

	$wp_customize->add_setting( 'column_3_label', array(
		'default' => 'Footer Nav Label',
		'transport' => 'postMessage',
	));

	$wp_customize->add_setting( 'column_4_label', array(
		'default' => 'Footer Nav Label',
		'transport' => 'postMessage',
	));

	//Controls
	/**Alerts**/
	$wp_customize->add_control( 'alert_text', array(
		'label' => 'Header Alert Message',
		'section' => 'cd_alert',
		'type' => 'text'
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'alert_background', array(
		'label' => 'Background Color',
		'section' => 'cd_alert',
		'settings' => 'alert_background'
	)));

	$wp_customize->add_control( 'display_header_alert', array(
		'label' => 'Display Header Alert',
		'section' => 'cd_alert',
		'settings' => 'display_header_alert',
		'type' => 'radio',
		'choices' => array(
			'show' => 'Show Header Alert',
			'hide' => 'Hide Header Alert',
		)
	));

	/**Footer**/
	$wp_customize->add_control( 'enable_signup', array(
		'label' => 'Enable Sign Up Form',
		'section' => 'cd_footer',
		'settings' => 'enable_signup',
		'type' => 'radio',
		'choices' => array(
			'show' => 'Enable Sign-Up Form',
			'hide' => 'Disable Sign-Up Form',
		),
	));
	
	$wp_customize->add_control( 'enable_social', array(
		'label' => 'Enable Social Media Links',
		'section' => 'cd_footer',
		'settings' => 'enable_social',
		'type' => 'radio',
		'choices' => array(
			'show' => 'Enable Social Media Links',
			'hide' => 'Disable Social Media Links',
		),
	));

	$wp_customize->add_control( 'footer_columns', array(
		'label' => 'Number of Columns',
		'section' => 'cd_footer',
		'settings' => 'footer_columns',
		'type' => 'select',
		'choices' => array(
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
		)
	));

	$wp_customize->add_control( 'column_1_label', array(
		'label' => 'Column 1 Label',
		'section' => 'cd_footer',
		'type' => 'text',
	));

	$wp_customize->add_control( 'column_2_label', array(
		'label' => 'Column 2 Label',
		'section' => 'cd_footer',
		'type' => 'text',
	));

	$wp_customize->add_control( 'column_3_label', array(
		'label' => 'Column 3 Label',
		'section' => 'cd_footer',
		'type' => 'text',
	));

	$wp_customize->add_control( 'column_4_label', array(
		'label' => 'Column 4 Label',
		'section' => 'cd_footer',
		'type' => 'text',
	));
}

add_action ('wp_head', 'cd_customizer_css');
function cd_customizer_css() {
	?>
		<style type="text/css">
			.header-alert {
				background: <?php echo get_theme_mod('alert_background', '#22b573'); ?>;
			}
		</style>
	<?php
}