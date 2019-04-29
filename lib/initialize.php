<?php
add_action( 'after_setup_theme', 'childtheme_initialize', 1 );

function childtheme_initialize() {
  // THEME SETUP

  // Adds support for HTML5 markup structure.
  add_theme_support( 'html5', genesis_get_config( 'html5' ) );

  // Adds support for accessibility.
  add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );

  // Adds viewport meta tag for mobile browsers.
  add_theme_support( 'genesis-responsive-viewport' );

  // Adds custom logo in Customizer > Site Identity.
  add_theme_support( 'custom-logo', genesis_get_config( 'custom-logo' ) );

  // Renames primary and secondary navigation menus.
  add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );

  // Adds support for after entry widget.
  add_theme_support( 'genesis-after-entry-widget-area' );

  // Adds support for 2-column footer widgets.
  add_theme_support( 'genesis-footer-widgets', 3 );

  // Adds support for structural wraps (Genesis defaults + Custom regions)
  add_theme_support( 'genesis-structural-wraps', array(
    // Genesis defaults
    'header',
    'menu-primary',
    'menu-secondary',
    'site-inner',
    'footer-widgets',
    'footer',

    // Custom regions
    'utility-bar',
  ) );

  // GUTENBERG SUPPORT

  // Adds support for wide and full alignment options on image blocks (and a few others)
  add_theme_support( 'align-wide' );

  // Adds support for responsive embeds
  add_theme_support( 'responsive-embeds' );

  // Adds support for selectable font sizes in paragraph blocks
  // @TODO: Review font size options in `childtheme/config/editor-font-sizes`
  // @TODO: Add supporting styles as needed
  add_theme_support( 'editor-font-sizes', genesis_get_config( 'editor-font-sizes' ) );

  // Adds support for color palette selections in blocks that allow it
  // @TODO: Review color options in `childtheme/config/editor-color-palette`
  // @TODO: Add supporting styles as needed
  add_theme_support( 'editor-color-palette', genesis_get_config( 'editor-color-palette' ) );

  // Adds support for custom Gutenberg editor styles (backend)
  // @TODO: Add supporting styles as needed
  add_theme_support( 'editor-styles' );
  // @TODO: Break editor styles into a standalone style sheet
  // @TODO: See Revolution Pro styles for working example here `/lib/gutenberg/style-editor.css`
  // @TODO: Change line below to reflect correct path after implementation
  //add_editor_style( '/lib/gutenberg/style-editor.css' );

  // @TODO: Research the Revolution Pro implementation of inline styles to determine benefits
  //require_once get_stylesheet_directory() . '/lib/gutenberg/inline-styles.php';

  // GENESIS ACTIONS

  // Displays custom logo.
  add_action( 'genesis_site_title', 'the_custom_logo', 0 );

  // Repositions primary navigation menu.
  remove_action( 'genesis_after_header', 'genesis_do_nav' );
  add_action( 'genesis_header', 'genesis_do_nav', 6 );

  // Repositions secondary navigation menu.
  remove_action( 'genesis_after_header', 'genesis_do_subnav' );
  add_action( 'genesis_header', 'genesis_do_subnav', 12 );
}
