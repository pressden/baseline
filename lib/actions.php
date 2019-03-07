<?php
// ACTIONS

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 5 );

// Repositions secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_subnav', 12 );

// Add the utility menu
add_action( 'genesis_header', 'childtheme_do_utility_menu', 4 );
function childtheme_do_utility_menu() {
  $class = 'menu genesis-nav-menu menu-utility';
  if ( genesis_superfish_enabled() ) {
    $class .= ' js-superfish';
  }

  genesis_nav_menu( array(
    'theme_location' => 'utility',
    'menu_class'     => $class,
  ) );
}

// Add the main menu
add_action( 'genesis_header', 'childtheme_do_main_menu', 13 );
function childtheme_do_main_menu() {
  $class = 'menu genesis-nav-menu menu-main';
  if ( genesis_superfish_enabled() ) {
    $class .= ' js-superfish';
  }

  genesis_nav_menu( array(
    'theme_location' => 'main',
    'menu_class'     => $class,
  ) );
}

// Add the footer menu
add_action( 'genesis_footer', 'childtheme_do_footer_menu', 5 );
function childtheme_do_footer_menu() {
  $class = 'menu genesis-nav-menu menu-footer';
  if ( genesis_superfish_enabled() ) {
    $class .= ' js-superfish';
  }

  genesis_nav_menu( array(
    'theme_location' => 'footer',
    'menu_class'     => $class,
  ) );
}
