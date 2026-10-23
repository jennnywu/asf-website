/* Camp page: section tabs (with #panel-<name> deep links), mobile accordions for the
   "Preparing for Camp" cards. Accordions elsewhere are native <details> (core Details block). */
( function () {
  'use strict';

  var bar = document.querySelector( '.camp-tab-bar' );
  if ( ! bar ) return;

  // Tab buttons are core Button blocks whose link points at their panel: href="#panel-summer"
  var tabs = Array.prototype.slice.call( bar.querySelectorAll( '.camp-tab' ) ).map( function ( tab ) {
    var link = tab.querySelector( 'a' );
    var href = link ? link.getAttribute( 'href' ) || '' : '';
    var id   = href.indexOf( '#' ) !== -1 ? href.slice( href.indexOf( '#' ) + 1 ) : '';
    return { el: tab, link: link, id: id, panel: id ? document.getElementById( id ) : null };
  } ).filter( function ( t ) { return t.link && t.panel; } );
  if ( ! tabs.length ) return;

  var panels = tabs.map( function ( t ) { return t.panel; } );

  bar.setAttribute( 'role', 'tablist' );
  tabs.forEach( function ( t ) {
    t.link.setAttribute( 'role', 'tab' );
    t.link.setAttribute( 'aria-controls', t.id );
    t.panel.setAttribute( 'role', 'tabpanel' );
  } );

  function activate( id ) {
    var found = tabs.some( function ( t ) { return t.id === id; } );
    if ( ! found ) return false;
    tabs.forEach( function ( t ) {
      var on = t.id === id;
      t.el.classList.toggle( 'active', on );
      t.link.setAttribute( 'aria-selected', on ? 'true' : 'false' );
    } );
    panels.forEach( function ( p ) { p.classList.toggle( 'active', p.id === id ); } );
    return true;
  }

  tabs.forEach( function ( t ) {
    t.link.addEventListener( 'click', function ( e ) {
      e.preventDefault();
      activate( t.id );
      history.replaceState( null, '', '#' + t.id );
    } );
  } );

  // Deep links (e.g. the footer's /camp/#panel-summer), on load and when the hash changes on this page
  function fromHash() {
    return activate( decodeURIComponent( location.hash.slice( 1 ) ) );
  }
  if ( ! fromHash() ) activate( tabs[ 0 ].id );
  window.addEventListener( 'hashchange', fromHash );

  // From here on the CSS hides inactive panels (before this, the first panel shows by default)
  document.documentElement.classList.add( 'camp-tabs-js' );

  // ── Preparing for Camp: cards collapse into accordions on tablet/mobile ──
  if ( window.innerWidth <= 1024 ) {
    document.querySelectorAll( '.prepare-card' ).forEach( function ( card ) {
      var h3 = card.querySelector( 'h3' );
      if ( ! h3 ) return;
      card.setAttribute( 'data-accordion-init', '' );
      var body = document.createElement( 'div' );
      body.className = 'prepare-body';
      Array.prototype.slice.call( card.children ).forEach( function ( el ) {
        if ( el !== h3 ) body.appendChild( el );
      } );
      card.appendChild( body );
      var chevron = document.createElement( 'span' );
      chevron.className = 'prepare-chevron';
      chevron.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>';
      h3.appendChild( chevron );
      h3.addEventListener( 'click', function () { card.classList.toggle( 'open' ); } );
    } );
  }
} )();
