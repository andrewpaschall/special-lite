<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Special-Lite
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WMR739H');</script>
	<!-- End Google Tag Manager -->

	<!--Multiview Pixel-->
	<script src="//assets.adobedtm.com/c876840ac68fc41c08a580a3fb1869c51ca83380/satelliteLib-6fbd97c4ce3d45ba39e0e05952ac50eaa4d2a8df.js"></script>
	<!--End Multiview Pixel-->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMR739H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content" style="display: none;"><?php esc_html_e( 'Skip to content', 'special-lite' ); ?></a>
	<header id="masthead">
		<small>
			<nav class="grid-x align-right align-middle micro-menu show-for-large">
				<?php

					wp_nav_menu( array(
						'theme_location' => 'menu-7',
						'menu_id'        => 'localization-menu',
						'menu_class' => 'menu horizontal',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					) );
					wp_nav_menu( array(
						'theme_location' => 'menu-6',
						'menu_id'        => 'top-nav',
						'menu_class' => 'menu horizontal',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					) );
				?>
				<form role="search" method="get" class="search-form flex-container align-middle" action="<?php echo home_url( '/' ); ?>">
			        <span class="screen-reader-text" style="display: none;"><?php echo _x( 'Search for:', 'label' ) ?></span>
			        <input type="search" class="search-field"
			            value="<?php echo get_search_query() ?>" name="s"
			            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</form>
			</nav>
		</small>
		<div class="title-bar flex-container align-justify" data-responsive-toggle="animated-menu" data-hide-for="large">
			<?php the_custom_logo(); ?>
			<div class="flex-container flex-dir-col">
				<button class="menu-icon dark" type="button" data-toggle></button>
			</div>
		</div>

		<div class="top-bar stacked-for-medium" id="animated-menu" data-animate="slide-in-left slide-out-left">
			<div class="top-bar-left">
				<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
					?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
					<?php
						else :
					?>
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
					<?php
						endif;
					$special_lite_description = get_bloginfo( 'description', 'display' );
					if ( $special_lite_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $special_lite_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
				<form role="search" method="get" class="search-form hide-for-large" action="<?php echo home_url( '/' ); ?>">
			        <span class="screen-reader-text" style="display: none;"><?php echo _x( 'Search for:', 'label' ) ?></span>
			        <input type="search" class="search-field"
			            value="<?php echo get_search_query() ?>" name="s"
			            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</form>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-6',
						'menu_id'        => 'top-nav',
						'menu_class' => 'menu vertical hide-for-large',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					) );
				?>
			</div>
			<nav class="top-bar-right">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class' => 'vertical large-horizontal menu',
						'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown">%3$s</ul>',
						'walker' => new My_Walker_Nav_Menu(),
					) );
				?>
			</nav>
	</div>
	</header>
	<?php if( get_theme_mod( 'display_header_alert', 'show' ) == 'show' ) : ?>
		<div class="header-alert" style="padding: .5em 1em; color: #fff; font-weight: 700; text-align-center;">
			<p style="text-align: center; margin-bottom: 0;"><?php echo get_theme_mod( 'alert_text', '' ); ?></p>
		</div>
	<?php endif ?>
	<div id="content" class="site-content">
