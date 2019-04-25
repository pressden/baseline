// begin baseline.js

$( document ).ready( function() {

  // add .c-pointer to clickable blocks and containers that contain anchors
  $( '.ab-block-cta' ).each( function() {
    var $anchor = $( this ).find( 'a' );
    var href = $anchor.attr( 'href' );
    var target = $anchor.attr( 'target' );

    // look for .t-blank and assign target `_blank` on anchors that do not yet support targets
    // EXAMPLE: Atomic Blocks - Call-to-Action Block
    var blank = $( this ).hasClass( 't-blank' );

    if( blank ) {
      $anchor.attr( 'target', '_blank' );
    }

    if( href ) {
      $( this ).addClass( 'c-pointer' );
    }
  } );

  // add a click event on .c-pointer targets
  $( '.c-pointer' ).click( function() {
    var $anchor = $( this ).find( 'a' );
    var href = $anchor.attr( 'href' );
    var target = $anchor.attr( 'target' );

    if( href ) {
      if ( target ) {
        window.open(href, target);
      }
      else {
        window.location = href;
      }
    }

    return false;
  } );
} );
