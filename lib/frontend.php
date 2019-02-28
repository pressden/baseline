<?php
// FRONTEND

// Enqueues scripts and styles.
add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_scripts_styles' );
function childtheme_enqueue_scripts_styles() {
  wp_enqueue_style( 'dashicons' );

  wp_enqueue_script(
		'childtheme-main',
		get_stylesheet_directory_uri() . '/js/main.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
  );

  wp_localize_script(
    'childtheme-main',
    'genesis_responsive_menu',
    childtheme_responsive_menu_settings()
  );
}

// Defines responsive menu settings.
function childtheme_responsive_menu_settings() {
	$settings = array(
		'mainMenu'         => __( 'Menu', 'childtheme' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'childtheme' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
        '.nav-primary',
        '.nav-secondary'
			),
			'others'  => array(),
		),
	);

	return $settings;
}
