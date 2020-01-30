<?php
/**
 * Special-Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Special-Lite
 */

if ( ! function_exists( 'special_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function special_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Special-Lite, use a find and replace
		 * to change 'special-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'special-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'special-lite' ),
			'menu-2' => esc_html__( 'Footer Menu 1'),
			'menu-3' => esc_html__( 'Footer Menu 2'),
			'menu-4' => esc_html__( 'Footer Menu 3'),
			'menu-5' => esc_html__( 'Footer Menu 4'),
			'menu-6' => esc_html__( 'Top Nav'),
			'menu-7' => esc_html__( 'Localization Menu'),
			'menu-8' => esc_html__( 'legalese'),
			'menu-9' => esc_html__( 'Social Networks'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'special_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
	add_filter( 'get_custom_logo', 'change_logo_class' );


	function change_logo_class( $html ) {

	    $html = str_replace( 'custom-logo', 'logo', $html );

	    return $html;
	}

endif;
add_action( 'after_setup_theme', 'special_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function special_lite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'special_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'special_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function special_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'special-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'special-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'special_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function special_lite_scripts() {
	wp_enqueue_style( 'special-lite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'special-lite-javascript', get_template_directory_uri() . '/js/app.js', array(), '20151215', true );

	wp_enqueue_script( 'special-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'special-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'special_lite_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
 */

/**
 * Custom Gutenberg blocks.
 */
require get_template_directory() . '/inc/custom-blocks.php';

/**
  *Remove Archive, Category, Tag from archive pages
  */
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

		} elseif ( is_post_type_archive() ) {

			$title = post_type_archive_title( '', false );

		} elseif( is_tax() ) {

        	$title = single_term_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

/**
 * Custom Sidebar Support
 */

function wpb_widgets_init() {
	
	//Downloads
    register_sidebar( array(
        'name' =>__( 'Downloads Sidebar', 'wpb'),
        'id' => 'sidebar-2',
        'description' => __( 'Appears on the static front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
	) );
	
	//Blog Archive Sidebar
	register_sidebar( array(
        'name' =>__( 'Blog Archive Sidebar Sidebar', 'wpb'),
        'id' => 'sidebar-3',
        'description' => __( 'Appears on the static front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    }
 
add_action( 'widgets_init', 'wpb_widgets_init' );

add_filter( 'facetwp_indexer_query_args', function( $args ) {
    $args['post_status'] = array( 'publish', 'inherit' );
    return $args;
});

/**
 * Custom Mime Types
 */

function sl_mime_types($mime_types){
	$mime_types['dwg'] = 'application/acad'; //Adding dwg extension
	$mime_types['doc'] = 'application/msword'; //adding doc extension
	
    return $mime_types;
}
add_filter('upload_mimes', 'sl_mime_types', 1, 1);

/**
 * Custom Image Size for Products
 */

add_image_size('product-gallery size', 500, 500, true);

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


/**
 * Pagination
 */
function get_pagination_links() {
    global $wp_query;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $big = 999999999;

    return paginate_links( array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '?paged=%#%',
        'current' => $current,
        'total' => $wp_query->max_num_pages,
        'prev_next'    => false
    ) );
}

/**
 * Replaces the excerpt "Read More" text by a link
 **/ 
function new_excerpt_more($more) {
	global $post;
 return '<a class="moretag" href="'. get_permalink($post->ID) . '">...Read More»</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * React App - ROI Calculator
 */

if (is_page_template('page-cost-of-frp-vs-hollow-metal.php')) {
	wp_enqueue_script( 'roi-calculator', get_template_directory_uri() . '' );
}

if (is_page_template( 'page-cost-of-frp-vs-hollow-metal.php' )) {
	wp_enqueue_style( 'roi-calculator', get_template_directory_uri() . '');
}