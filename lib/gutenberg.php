<?php
// GUTENBERG

// Enqueue any assets needed to properly render styles within Gutenberg editor (backend)
add_action( 'enqueue_block_editor_assets', 'childtheme_block_editor_styles' );
function childtheme_block_editor_styles() {

  // @TODO: See example below from Revolution Pro and replace with custom implementation
  /*
	wp_enqueue_style(
		'revolution-gutenberg-fonts',
		'https://fonts.googleapis.com/css?family=Noto+Serif+SC:300,600|Playfair+Display:400,700,700i|Poppins:400',
		array(),
		CHILD_THEME_VERSION
	);
  */
}

// Set the content width to match Gutenberg
// @TODO: Determine if this is even necessary given our custom SASS implementation
/*
add_action( 'after_setup_theme', 'revolution_pro_content_width', 0 );
function revolution_pro_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'revolution_pro_content_width', 1200 );
}
*/
