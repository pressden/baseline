/**
 * StudioPress Sticky Header Fixes.
 *
 * 1. Calculates the sticky header height and adds margin to the site-inner
 * element so content is not under the menu if the menu contains a logo,
 * or if menu items wrap onto multiple lines.
 *
 * 2. Adds and removes the 'shrink' class to the site-container when scrolling.
 *
 * @author StudioPress
 * @license GPL-2.0-or-later
 */

var studiopress = studiopress || {};

studiopress.stickyHeader = ( function( $ ) {
	'use strict';

	/**
	 * Store whether or not the site container has been given the shrunk class.
	 *
	 * @since 1.0.0
	 */
	var containerHasShrunkClass = false,

	/**
	 * Adjust site inner margin top to compensate for flexible header height.
	 *
	 * The header height may increase due to the logo or menu items wrapping.
	 *
	 * @since 1.0.0
	 */
	moveContentBelowFixedHeader = function() {
		var siteInnerMarginTop = 0;

		if ( 'fixed' === $( '.site-header' ).css( 'position' ) ) {
			siteInnerMarginTop = $( '.site-header' ).outerHeight();

			// Ensures site-inner margin-top is always the full header height,
			// never the 'shrunk' header height.
			if ( containerHasShrunkClass ) {
				siteInnerMarginTop += parseInt( studiopressStickyHeaderConfig.heightDifference || 0 );
			}
		}

		$( '.site-inner' ).animate({ marginTop: siteInnerMarginTop }, 100, 'studiopressEaseOutQuad' );

	},

	/**
	 * Toggle the shrink class on the site-container element.
	 *
	 * @since 1.0.0
	 */
	toggleShrinkClass = function() {
		if ( 20 < $( document ).scrollTop() ) {
			containerHasShrunkClass = true;
			$( '.site-container' ).addClass( 'shrink' );
		} else {
			containerHasShrunkClass = false;
			$( '.site-container' ).removeClass( 'shrink' );
		}
	},

	/**
	 * Actions to perform on the page load event.
	 *
	 * Moves site content below header initially, on resize,
	 * and during Customizer preview refreshes.
	 *
	 * @since 1.0.0
	 */
	load = function() {
		var observer;

		moveContentBelowFixedHeader();

		$( window ).resize( moveContentBelowFixedHeader );

		// Adjust site-inner margin after the title-area changes in the Customizer.
		if ( 'undefined' != typeof wp && 'undefined' != typeof wp.customize ) {
			observer = new MutationObserver( function( mutations ) {
				mutations.forEach( moveContentBelowFixedHeader );
			});

			$( '.title-area' ).each( function() {
				observer.observe( this, { attributes: true, childList: true, subtree: true });
			});
		}
	},

	/**
	 * Extend jQuery easing options with a custom studiopressEaseOutQuad.
	 *
	 * Prepends 'studiopress' to avoid overwriting existing easing functions.
	 *
	 * Based on jQuery Easing by George McGinley Smith (BSD License).
	 * http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js.
	 *
	 * See https://easings.net/ for easing function demos.
	 *
	 * @since 1.0.0
	 */
	setupCustomEasing = function() {
		$.easing.studiopressEaseOutQuad = function( x, t, b, c, d ) {
			return -c * ( t /= d ) * ( t - 2 ) + b;
		};
	},

	/**
	 * Actions to perform on the page ready event.
	 *
	 * Adds and removes the 'shrink' class to the sticky header on scroll.
	 *
	 * @since 1.0.0
	 */
	init = function() {
		toggleShrinkClass();
		setupCustomEasing();
		$( document ).on( 'scroll', toggleShrinkClass );
		$( window ).on( 'load', load );
	};

	// Expose the ready function.
	return {
		init: init
	};

}( jQuery ) );

jQuery( studiopress.stickyHeader.init );
