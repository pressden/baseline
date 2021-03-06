<?php
// FILTERS

add_filter( 'body_class', 'childtheme_maybe_add_menu_body_class' );
/**
 * Add custom class depending on which menus are set.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function childtheme_maybe_add_menu_body_class( $classes ) {

  $has_left_menu = has_nav_menu( 'primary' );
  $has_right_menu = has_nav_menu( 'secondary' );

  if( $has_left_menu && $has_right_menu ) {
    $classes[] = 'has-split-menu';
  }
  else if( $has_left_menu ) {
    $classes[] = 'has-left-menu';
  }
  else if( $has_right_menu) {
    $classes[] = 'has-right-menu';
  }

	return $classes;

}

// Filter footer credits
add_filter( 'genesis_footer_creds_text', 'childtheme_footer_creds_text' );
function childtheme_footer_creds_text( $creds_text ) {
  // Credits contains shortcodes that are filtered by genesis_footer_output before echo
  $credits = array (
    '[footer_copyright before="' . __( 'Copyright', 'genesis' ) . ' "]',
    get_bloginfo( 'name' ),
    __( 'All Rights Reserved', 'childtheme' ),
    '[footer_loginout]'
  );

  // Implode the credits with a separator
  $creds_text = implode( ' &#x000B7; ', $credits );

  // Return the credits
  return $creds_text;
}



/*
// Add custom body class to the head
add_filter( 'body_class', 'childtheme_body_class' );
if( !function_exists( 'childtheme_body_class' ) ) {
	function childtheme_body_class( $classes ) {
		$classes[] = 'boilerplate';
		$classes[] = 'childtheme';
		return $classes;
	}
}

// Add Bootstrap 4 compatibility via a content wrapper (if the ACF Pro Layers plugin is not activated)
if( !function_exists( 'apl_content_layers_filter' ) ) {
	add_filter( 'the_content', 'childtheme_content_layers_filter' );
	function childtheme_content_layers_filter( $content ) {
		// return without markup if there is no content (prevents excess whitespace)
		if( !$content ) {
			return $content;
		}

		// initialize the output variable
		$output = '';

		// name the layer wordpress-content
		$layer_name = 'wordpress-content';

		// generate a unique ID for direct targeting
		$layer_id = 'apl-content-0-' . $layer_name;

		// wrap code extracted from the APL Pro Layers plugin
		$output.= '
			<section id="' . $layer_id . '" class="' . $layer_name . '-wrap layer-wrap">
				<div class="container ' . $layer_name . '-container">
					<div class="' . $layer_name . '-layer layer row">
						<div class="col">
							' . $content . '
						</div>
					</div>
				</div>
			</section>
		';

	  return $output;
	}
}

// override the standard genesis search form to get bootstrap friendly markup in place
add_action( 'after_setup_theme', 'childtheme_override_search_form' );
if( !function_exists( 'childtheme_override_search_form' ) ) {
	function childtheme_override_search_form() {
		remove_filter( 'get_search_form', 'genesis_search_form' );
		add_filter( 'get_search_form', 'childtheme_search_form' );
	}
}

if( !function_exists( 'childtheme_search_form' ) ) {
	function childtheme_search_form() {
		$search_text = get_search_query() ? apply_filters( 'the_search_query', get_search_query() ) : apply_filters( 'genesis_search_text', __( 'Search this website', 'genesis' ) . ' &#x02026;' ); // WPCS: prefix ok.

		$button_text = apply_filters( 'genesis_search_button_text', esc_attr__( 'Search', 'genesis' ) );

		$onfocus = "if ('" . esc_js( $search_text ) . "' === this.value) {this.value = '';}";
		$onblur  = "if ('' === this.value) {this.value = '" . esc_js( $search_text ) . "';}";

		// Empty label, by default. Filterable.
		$label = apply_filters( 'genesis_search_form_label', '' );

		$value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';

		// @TODO: Add filters to manipulate the label, input and button classes for greater control over search forms
		$form  = sprintf( '<form %s>', genesis_attr( 'search-form' ) );

		if ( '' == $label )  {
			$label = apply_filters( 'genesis_search_text', __( 'Search this website', 'genesis' ) );
		}

		$form_id = uniqid( 'searchform-', true );

		$form.= '
			<meta itemprop="target" content="' . home_url( '/?s={s}' ) . '"/>
			<label class="search-form-label screen-reader-text" for="' . esc_attr( $form_id ) . '">' . esc_html( $label ) . '</label>
			<input itemprop="query-input" type="search" name="s" id="' . esc_attr( $form_id ) . '" class="form-control mr-2" ' . $value_or_placeholder . '="' . esc_attr( $search_text ) . '" />
			<button type="submit" class="btn btn-primary" />' . esc_attr( $button_text ) . '</button>
		</form>';

		return apply_filters( 'genesis_search_form', $form, $search_text, $button_text, $label );
	}
}

// Suppress the edit link on pages in favor of the admin bar
add_filter( 'genesis_edit_post_link', 'childtheme_edit_post_link' );
if( !function_exists( 'childtheme_edit_post_link' ) ) {
	function childtheme_edit_post_link( $edit_link ) {
		if( !$edit_link || ( is_singular() && is_page() ) ) {
			return false;
		}

		return true;
	}
}

add_filter( 'do_shortcode_tag', 'childtheme_do_responsive_embed', 10, 3 );
if( !function_exists( 'childtheme_do_responsive_embed' ) ) {
	function childtheme_do_responsive_embed( $output, $tag, $attr ) {
		// target the embed shortcode
		if( $tag == 'embed' ) {
			// @TODO: Look for a way to manipulate the "16by9" ratio dynamically so this solution will work for all supported ratios (https://getbootstrap.com/docs/4.1/utilities/embed/#about)
			$output = '<div class="embed-responsive embed-responsive-16by9">' . $output . '</div>';
		}

	  return $output;
	}
}
*/
