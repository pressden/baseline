<?php
// ACTIONS

// Register the utility sidebars
add_action( 'after_setup_theme', 'childtheme_register_utility_sidebars' );
function childtheme_register_utility_sidebars() {
  genesis_register_sidebar( array(
    'id' => 'utility-bar-left',
    'name' => __( 'Utility Bar Left', 'childtheme' ),
    'description' => __( 'Left utility widget area above the header.', 'childtheme' ),
   ) );

   genesis_register_sidebar( array(
    'id' => 'utility-bar-right',
    'name' => __( 'Utility Bar Right', 'childtheme' ),
    'description' => __( 'Right utility widget area above the header.', 'childtheme' ),
   ) );
}

// Add the utility sidebars
add_action( 'genesis_header', 'childtheme_do_utility_widget_areas', 5 );
function childtheme_do_utility_widget_areas() {

  $inside  = '';
  $output  = '';
  $utility_sidebars = array( 'utility-bar-left', 'utility-bar-right' );

  foreach( $utility_sidebars as $sidebar )
  {
    // Darn you, WordPress! Gotta output buffer.
    ob_start();
    dynamic_sidebar( $sidebar );
    $widgets = ob_get_clean();

    if ( $widgets ) {
      $inside .= genesis_markup(
        array(
          'open'    => '<div %s>',
          'close'   => '</div>',
          'context' => $sidebar,
          'content' => $widgets,
          'echo'    => false,
        )
      );
    }
  }

  if ( $inside ) {
    $_inside = genesis_get_structural_wrap( 'utility-bar', 'open' );
    $_inside .= $inside;
    $_inside .= genesis_get_structural_wrap( 'utility-bar', 'close' );

    $output .= genesis_markup( array(
      'open'    => '<div %s>' . genesis_sidebar_title( 'Utility Bar' ),
      'close'   => '</div>',
      'content' => $_inside,
      'context' => 'utility-bar',
      'echo'    => false,
    ) );

  }

  echo apply_filters( 'childtheme_utility_widget_areas', $output );
}

// Add the main menu
add_action( 'genesis_header', 'childtheme_do_main_menu', 13 );
function childtheme_do_main_menu() {
  $class = 'menu genesis-nav-menu menu-main';
  if ( genesis_superfish_enabled() ) {
    $class .= ' js-superfish';
  }

  genesis_nav_menu( array(
    'theme_location'  => 'main',
    'menu_class'      => $class,
  ) );
}

// Add the footer menu
add_action( 'genesis_footer', 'childtheme_do_footer_menu', 5 );
function childtheme_do_footer_menu() {
  $class = 'menu genesis-nav-menu menu-footer';

  genesis_nav_menu( array(
    'theme_location'  => 'footer',
    'menu_class'      => $class,
    'depth'           => 1,
  ) );
}
