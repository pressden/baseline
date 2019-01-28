<?php
// THEME SETUP
// add HTML5 markup structure
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// add accessibility support
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// move secondary menu to header right
add_action( 'after_setup_theme', 'baseline_move_subnav' );
function baseline_move_subnav() {
  remove_action( 'genesis_after_header', 'genesis_do_subnav' );
  add_action( 'genesis_header_right', 'genesis_do_subnav', 5 );
}

// move secondary sidebar inside .content-sidebar-wrap
add_action( 'after_setup_theme', 'baseline_move_sidebar_alt' );
function baseline_move_sidebar_alt() {
  remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
  add_action( 'genesis_after_content', 'genesis_get_sidebar_alt' );
}
