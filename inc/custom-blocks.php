<?php

add_action('acf/init', 'sl_acf_init');
function sl_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register testimonial block
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('A custom testimonial block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));

		// register hero block
		acf_register_block(array(
			'name'				=> 'hero-1',
			'title'				=> __('Hero 1'),
			'description'		=> __('A custom hero block. Features background image and centered text'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'hero', 'header', 'headline' ),
		));

		// register timeline block
		acf_register_block(array(
			'name'				=> 'Timeline',
			'title'				=> __('Timeline'),
			'description'		=> __('A block for a custom timeline based on Zurb Foundation'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'dashicons-clock',
			'keywords'			=> 'Timeline', 'timeline', 'history',

		));

		//register card block
		acf_register_block(array(
			'name'				=>'Card',
			'title'				=>__('Card'),
			'description'		=>__('A block to display card styled elements'),
			'render_callback'	=>'my_acf_block_render_callback',
			'category'			=>'layout',
			'icon'				=>'dashicons-tickets-alt',
			'keywords'			=>'Cards', 'cards', 'card', 'Card'
		));

		//register hover slide card
		acf_register_block(array(
			'name'				=>'hover_slide_card',
			'title'				=>__('Hover Slide Card'),
			'description'		=>__('A block to display categories and links to basic informational pages'),
			'render_callback'	=>'my_acf_block_render_callback',
			'category'			=>'layout',
			'icon'				=>'dashicons-id'
		));

		//register product card
		acf_register_block(array(
			'name'				=>'product_card',
			'title'				=>__('Product Card'),
			'description'		=>__('A block to display product cards'),
			'render_callback'	=>'my_acf_block_render_callback',
			'category'			=>'layout',
			'icon'				=>'dashicons-tickets-alt',
			'keywords'			=>'Product', 'product', 'Products', 'products'
		));

		//register post card
		acf_register_block(array(
			'name'				=>'post_card',
			'title'				=>__('Post Block Card'),
			'description'		=>__('A block to display posts on cards within layout content'),
			'render_callback'	=>'my_acf_block_render_callback',
			'category'			=>'layout',
			'icon'				=>'dashicons-tickets-alt',
			'keywords'			=>'post', 'Post', 'Posts', 'posts'
		));
	}
}

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists(STYLESHEETPATH . "/template-parts/block/content-{$slug}.php") ) {
		include( STYLESHEETPATH . "/template-parts/block/content-{$slug}.php" );
	}
}




?>