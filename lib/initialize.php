<?php
/*
// THEME SETUP
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
*/


// WORDPRESS CLEAN UP

// disable all things emoji
add_action( 'init', 'childtheme_disable_emoji', 1 );
if( !function_exists( 'childtheme_disable_emoji' ) ) {
	function childtheme_disable_emoji() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'childtheme_disable_tinymce_emoji' );
	}
}

// filter function used to remove the tinymce emoji plugin
if( !function_exists( 'childtheme_disable_tinymce_emoji' ) ) {
	function childtheme_disable_tinymce_emoji( $plugins ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}
}

// remove the DNS prefetch
add_filter( 'emoji_svg_url', '__return_false' );


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
// @TODO: Determine if this is even necessary giving our custom SASS implementation
/*
add_action( 'after_setup_theme', 'revolution_pro_content_width', 0 );
function revolution_pro_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'revolution_pro_content_width', 1200 );
}
*/







/*
// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );
*/








/*
// add support for post formats
add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

// add custom header support
add_theme_support( 'custom-header' );

// GENESIS SETUP

// remove structural wraps
add_theme_support( 'genesis-structural-wraps', array( 'utility-widgets', 'header', 'footer', 'footer-widgets' ) );

// add excerpts to pages
add_post_type_support( 'page', 'excerpt' );

// add entry footer to pages
add_post_type_support( 'page', 'genesis-entry-meta-after-content' );

// add after entry widget area to pages
add_post_type_support( 'page', 'genesis-after-entry-widget-area' );
*/









/*
// CUSTOM POST TYPE SETUP

// initialize the banner post type
add_action( 'init', 'childtheme_initialize_banners' );
if( !function_exists( 'childtheme_initialize_banners' ) ) {
	function childtheme_initialize_banners() {
		childtheme_register_taxonomy( 'banner-group', 'Banner Group', 'Banner Groups', array( 'applies_to' => 'banner' ) );
		childtheme_register_taxonomy( 'banner-size', 'Banner Size', 'Banner Sizes', array( 'applies_to' => 'banner' ) );

		$args = array (
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'supports' => array( 'title', 'thumbnail' ),
		);

		childtheme_register_post_type( 'banner', 'Banner', 'Banners', $args );
	}
}

// initialize the contact post type (useful for staff directories / committees / boards / etc.)
add_action( 'init', 'childtheme_initialize_contacts' );
if( !function_exists( 'childtheme_initialize_contacts' ) ) {
	function childtheme_initialize_contacts() {
		childtheme_register_taxonomy( 'contact-group', 'Contact Group', 'Contact Groups', array( 'applies_to' => 'contact' ) );

		$args = array (
			'rewrite' => array( 'slug' => 'contact-directory' ),
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		);

		childtheme_register_post_type( 'contact', 'Contact', 'Contacts', $args );
	}
}

// initialize the faq post type
add_action( 'init', 'childtheme_initialize_faqs' );
if( !function_exists( 'childtheme_initialize_faqs' ) ) {
	function childtheme_initialize_faqs() {
		childtheme_register_taxonomy( 'faq-category', 'FAQ Category', 'FAQ Categories', array( 'applies_to' => 'faq' ) );
		childtheme_register_post_type( 'faq', 'FAQ', 'FAQs' );
	}
}

// initialize the layer post type (reusable layers shared across multiple pages / posts)
add_action( 'init', 'childtheme_initialize_layers' );
if( !function_exists( 'childtheme_initialize_layers' ) ) {
	function childtheme_initialize_layers() {
		$args = array (
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'supports' => array( 'title', 'author' ),
		);

		childtheme_register_post_type( 'layer', 'Layer', 'Layers', $args );
	}
}

// initialize the work item post type (useful for showcasing various types of client work)
add_action( 'init', 'childtheme_initialize_work_items' );
if( !function_exists( 'childtheme_initialize_work_items' ) ) {
	function childtheme_initialize_work_items() {
		childtheme_register_taxonomy( 'client', 'Client', 'Clients', array( 'applies_to' => 'work-item' ) );
		childtheme_register_taxonomy( 'work-type', 'Work Type', 'Work Types', array( 'applies_to' => 'work-item' ) );
		childtheme_register_post_type( 'work-item', 'Work Item', 'Work Items' );
	}
}
*/
