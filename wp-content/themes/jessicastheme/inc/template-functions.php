<?php
/**
* Functions which enhance the theme by hooking into WordPress
*
* @package Jessica's_Theme
*/

/**
* Adds custom classes to the array of body classes.
*
* @param array $classes Classes for the body element.
* @return array
*/
function jessicastheme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	
	return $classes;
}
add_filter( 'body_class', 'jessicastheme_body_classes' );

/**
* Add a pingback url auto-discovery header for single posts, pages, or attachments.
*/
function jessicastheme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'jessicastheme_pingback_header' );


/**
* Arrays for custom posts
*/

function jm_register_posts() {
	$post_rules = array(
		'public'      => true,
		'has_archive' => false,
		'publicly_queryable' => false,
		'show_in_rest' => true,
		'supports' => array(
			'title', 
			'editor', 
			'comments', 
			'revisions', 
			'page-attributes', 
			'thumbnail', 
			'custom-fields'
			)
		); 
		
	//Portfolio pieces
		
	register_post_type('jm_portfolio_piece',
	array(
		'labels'      => array(
			'name'          => _x('Portfolio', 'textdomain'),
			'singular_name' => _x('Portfolio Piece', 'textdomain'),
			'featured_image'        => _x( 'Screenshot', 'textdomain' ),
			'set_featured_image'    => _x( 'Set screenshot', 'textdomain' ),
			'remove_featured_image' => _x( 'Remove screenshot', 'textdomain' ),
			'use_featured_image'    => _x( 'Use as screenshot', 'textdomain' ),
		),
		'public'      => true,
		'has_archive' => false,
		'publicly_queryable' => false,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array(
			'title', 
			'editor', 
			'comments', 
			'revisions', 
			'page-attributes', 
			'thumbnail', 
			'custom-fields'
		),
		
		
		)
	);
		
	//Skills
		
	register_post_type('jm_skills',
	array(
			'labels'      => array(
				'name'          => _x('Skills', 'textdomain'),
				'singular_name' => _x('Skill', 'textdomain'),
			),
			'public'      => true,
			'has_archive' => false,
			'publicly_queryable' => false,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-superhero-alt',
			'supports' => array(
				'title', 
				'editor', 
				'comments', 
				'revisions', 
				'page-attributes', 
				'thumbnail', 
				'custom-fields'
				)
				)
			);
}
		
add_action('init', 'jm_register_posts');