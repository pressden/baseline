<?php
// ACTIONS

// Enqueues scripts and styles.
add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_scripts_styles' );
function childtheme_enqueue_scripts_styles() {
  wp_enqueue_script(
		'childtheme-main',
		get_stylesheet_directory_uri() . '/js/main.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
}

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_subnav', 5 );
