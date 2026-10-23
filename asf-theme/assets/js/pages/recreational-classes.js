/* Recreational Classes page: tabs.
   Tab buttons are core/button blocks (.tab-bar .tab-btn) whose link points at a panel anchor (#panel-summer);
   panels are groups with class "tab-panel" and that id. Accordions are native <details>, no JS needed.
   Deep links (/recreational-classes/#panel-summer, or #summer) open that tab. */
( function () {
  'use strict';

  var bar = document.querySelector( '.tab-bar' );
  if ( ! bar ) return;
  var tabs   = Array.prototype.slice.call( bar.querySelectorAll( '.tab-btn' ) );
  var panels = Array.prototype.slice.call( document.querySelectorAll( '.tab-panel[id]' ) );
  if ( ! tabs.length || ! panels.length ) return;

  function linkOf( tab ) { return tab.querySelector( 'a' ); }

  function hashId( href ) {
    var i = ( href || '' ).indexOf( '#' );
    return i > -1 ? decodeURIComponent( href.slice( i + 1 ) ) : '';
  }

  function tabTarget( tab ) {
    var a = linkOf( tab );
    return a ? hashId( a.getAttribute( 'href' ) ) : '';
  }

  // Panel for an id, accepting "panel-summer" or the short "summer"
  function findPanel( id ) {
    if ( ! id ) return null;
    for ( var i = 0; i < panels.length; i++ ) {
      if ( panels[ i ].id === id || panels[ i ].id === 'panel-' + id ) return panels[ i ];
    }
    return null;
  }

  function show( panel ) {
    panels.forEach( function ( p ) { p.classList.toggle( 'active', p === panel ); } );
    tabs.forEach( function ( t ) {
      var on = tabTarget( t ) === panel.id;
      var a  = linkOf( t );
      t.classList.toggle( 'active', on );
      if ( a ) a.setAttribute( 'aria-selected', on ? 'true' : 'false' );
    } );
  }

  // Accessibility roles (were attributes in the HTML version)
  bar.setAttribute( 'role', 'tablist' );
  tabs.forEach( function ( t ) {
    var a = linkOf( t );
    if ( ! a ) return;
    a.setAttribute( 'role', 'tab' );
    if ( tabTarget( t ) ) a.setAttribute( 'aria-controls', tabTarget( t ) );
  } );
  panels.forEach( function ( p ) { p.setAttribute( 'role', 'tabpanel' ); } );

  // Tab clicks (stopPropagation keeps main.js's older .tab-btn handler from also running)
  tabs.forEach( function ( t ) {
    var a = linkOf( t );
    if ( ! a ) return;
    a.addEventListener( 'click', function ( e ) {
      var panel = findPanel( tabTarget( t ) );
      if ( ! panel ) return;
      e.preventDefault();
      e.stopPropagation();
      show( panel );
      if ( window.history && history.replaceState ) history.replaceState( null, '', '#' + panel.id );
    } );
  } );

  // Other links on the page pointing at a panel (e.g. "#panel-summer" in a paragraph)
  document.addEventListener( 'click', function ( e ) {
    var a = e.target.closest ? e.target.closest( 'a[href*="#"]' ) : null;
    if ( ! a || bar.contains( a ) ) return;
    if ( a.pathname !== location.pathname || a.host !== location.host ) return;
    var panel = findPanel( hashId( a.getAttribute( 'href' ) ) );
    if ( ! panel ) return;
    e.preventDefault();
    openAndScroll( panel );
    if ( window.history && history.replaceState ) history.replaceState( null, '', '#' + panel.id );
  } );

  // Shows a panel and scrolls to it, leaving room for the sticky tab bar
  function openAndScroll( panel ) {
    show( panel );
    var wrap   = document.querySelector( '.tabs-wrap' );
    var offset = wrap ? wrap.offsetHeight : 0;
    window.scrollTo( 0, panel.getBoundingClientRect().top + window.pageYOffset - offset );
  }

  // Initial tab: from the URL hash, else the tab marked active, else the first
  var initial = findPanel( hashId( location.hash ) );
  if ( initial ) {
    openAndScroll( initial );
  } else {
    var activeTab = tabs.filter( function ( t ) { return t.classList.contains( 'active' ); } )[ 0 ] || tabs[ 0 ];
    show( findPanel( tabTarget( activeTab ) ) || panels[ 0 ] );
  }

  window.addEventListener( 'hashchange', function () {
    var panel = findPanel( hashId( location.hash ) );
    if ( panel ) openAndScroll( panel );
  } );
} )();
