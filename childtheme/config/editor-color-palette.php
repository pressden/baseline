<?php
/**
 * Editor color palette config.
 */
return array(
	array(
		'name'  => __( 'Custom color', 'childtheme' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
		'slug'  => 'custom',
		'color' => get_theme_mod( 'childtheme_link_color', childtheme_get_default_link_color() ),
	),
	array(
		'name'  => __( 'Accent color', 'childtheme' ),
		'slug'  => 'accent',
		'color' => get_theme_mod( 'childtheme_accent_color', childtheme_get_default_accent_color() ),
	),
);
