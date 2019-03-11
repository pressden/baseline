<?php
/**
 * Baseline
 *
 * This file adds functions to the child theme.
 *
 * @package Baseline
 * @author  D.S. Webster
 * @license GPL-2.0-or-later
 * @link    https://github.com/pressden/baseline
 */

// Initialize Genesis.
require_once get_template_directory() . '/lib/init.php';

// Defines the child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Child Theme' );
define( 'CHILD_THEME_URL', 'https://github.com/pressden/baseline' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Sets up the Theme.
require_once( 'baseline/lib/baseline.php');

/**********************************
 * BEGIN THEME FUNCTIONS
 *
 * Theme specific customizations should be added below.
 **********************************/

// Gets default link color.
function childtheme_get_default_link_color() {
	return '#00b9eb';
}

// Gets default accent color.
function childtheme_get_default_accent_color() {
	return '#00b9eb';
}
