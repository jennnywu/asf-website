( function () {
  'use strict';

  // ── Slideshow ──────────────────────────────────────────────────────────────
  const slides     = document.querySelectorAll( '.hero-slide' );
  const dots       = document.querySelectorAll( '.hero-dot' );
  const slideLabel = document.querySelector( '.slide-label' );
  let current      = 0;
  let timer;

  function goSlide( n ) {
    slides[ current ].classList.remove( 'active' );
    slides[ current ].setAttribute( 'aria-hidden', 'true' );
    if ( dots[ current ] ) {
      dots[ current ].classList.remove( 'active' );
      dots[ current ].setAttribute( 'aria-selected', 'false' );
    }
    current = n;
    slides[ current ].classList.add( 'active' );
    slides[ current ].setAttribute( 'aria-hidden', 'false' );
    if ( dots[ current ] ) {
      dots[ current ].classList.add( 'active' );
      dots[ current ].setAttribute( 'aria-selected', 'true' );
    }
    if ( slideLabel ) {
      slideLabel.textContent =
        String( current + 1 ).padStart( 2, '0' ) + ' / ' +
        String( slides.length ).padStart( 2, '0' );
    }
  }

  function startTimer() {
    clearInterval( timer );
    if ( slides.length > 1 ) timer = setInterval( () => goSlide( ( current + 1 ) % slides.length ), 4500 );
  }

  if ( slides.length > 1 ) {
    dots.forEach( ( dot, i ) => dot.addEventListener( 'click', () => { goSlide( i ); startTimer(); } ) );
    startTimer();
    const hero = document.querySelector( '.hero' );
    if ( hero ) {
      hero.addEventListener( 'mouseenter', () => clearInterval( timer ) );
      hero.addEventListener( 'mouseleave', startTimer );
    }
  }

  // ── Program tabs (homepage) ────────────────────────────────────────────────
  const tabs   = document.querySelectorAll( '.program-tab' );
  const panels = document.querySelectorAll( '.program-panel' );

  function switchTab( n ) {
    tabs.forEach( ( t, i ) => {
      t.classList.toggle( 'active', i === n );
      t.setAttribute( 'aria-selected', i === n ? 'true' : 'false' );
    } );
    panels.forEach( ( p, i ) => {
      const active = i === n;
      p.classList.toggle( 'active', active );
      active ? p.removeAttribute( 'hidden' ) : p.setAttribute( 'hidden', '' );
    } );
  }

  tabs.forEach( ( tab, i ) => {
    tab.addEventListener( 'click', () => switchTab( i ) );
    tab.addEventListener( 'keydown', ( e ) => {
      if ( e.key === 'ArrowRight' ) switchTab( ( i + 1 ) % tabs.length );
      if ( e.key === 'ArrowLeft'  ) switchTab( ( i - 1 + tabs.length ) % tabs.length );
    } );
  } );

  // ── Sidebar nav: parent item toggles ──────────────────────────────────────
  document.querySelectorAll( '.nav-parent' ).forEach( btn => {
    btn.addEventListener( 'click', () => {
      const expanded = btn.getAttribute( 'aria-expanded' ) === 'true';
      // Collapse all other open dropdowns
      document.querySelectorAll( '.nav-parent[aria-expanded="true"]' ).forEach( other => {
        if ( other !== btn ) {
          other.setAttribute( 'aria-expanded', 'false' );
          other.nextElementSibling?.classList.remove( 'open' );
        }
      } );
      btn.setAttribute( 'aria-expanded', expanded ? 'false' : 'true' );
      btn.nextElementSibling?.classList.toggle( 'open', ! expanded );
    } );
  } );

  // ── Mobile nav: hamburger toggles sidebar ─────────────────────────────────
  const hamburger = document.querySelector( '.nav-hamburger' );
  const sideNav   = document.getElementById( 'site-nav' );

  if ( hamburger && sideNav ) {
    hamburger.addEventListener( 'click', () => {
      const open = sideNav.classList.toggle( 'open' );
      hamburger.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
    } );
    // Close on outside tap
    document.addEventListener( 'click', ( e ) => {
      if ( ! hamburger.contains( e.target ) && ! sideNav.contains( e.target ) ) {
        sideNav.classList.remove( 'open' );
        hamburger.setAttribute( 'aria-expanded', 'false' );
      }
    } );
  }

  // ── Back to top ───────────────────────────────────────────────────────────
  const btt = document.getElementById( 'back-to-top' );
  if ( btt ) {
    window.addEventListener( 'scroll', () => {
      btt.classList.toggle( 'visible', window.scrollY > 320 );
    } );
    btt.addEventListener( 'click', () => window.scrollTo( { top: 0, behavior: 'smooth' } ) );
  }

  // ── Lucide icons init ─────────────────────────────────────────────────────
  if ( typeof lucide !== 'undefined' ) {
    lucide.createIcons();
  }

  // ── Benefits: read-more toggle ────────────────────────────────────────────
  document.querySelectorAll( '.btn-read-more' ).forEach( btn => {
    btn.addEventListener( 'click', () => {
      const target = document.getElementById( btn.dataset.target );
      if ( ! target ) return;
      const open = target.classList.toggle( 'open' );
      btn.classList.toggle( 'open', open );
      btn.querySelector( '.btn-label' ).textContent = open ? 'Show less' : 'Read more';
    } );
  } );

  // ── Camp page: tab switching ───────────────────────────────────────────────
  const campTabBar = document.querySelector( '.camp-tab-bar' );
  if ( campTabBar ) {
    const campTabs   = campTabBar.querySelectorAll( '.camp-tab' );
    const campPanels = document.querySelectorAll( '.camp-panel' );

    function switchCampTab( id ) {
      campTabs.forEach( t => t.classList.toggle( 'active', t.dataset.panel === id ) );
      campPanels.forEach( p => p.classList.toggle( 'active', p.id === 'panel-' + id ) );
    }

    campTabs.forEach( tab => {
      tab.addEventListener( 'click', () => switchCampTab( tab.dataset.panel ) );
    } );
  }

  // ── Camp page: div-style accordions (camp uses <div class="accordion-header">) ──
  document.querySelectorAll( '.accordion' ).forEach( acc => {
    const header = acc.querySelector( '.accordion-header' );
    if ( ! header || header.tagName === 'BUTTON' ) return; // skip button-style
    header.addEventListener( 'click', () => {
      const open = acc.classList.toggle( 'open' );
      header.classList.toggle( 'open', open );
    } );
  } );

  // ── Recreational classes: button-style accordions (<button class="accordion-header">) ──
  document.querySelectorAll( 'button.accordion-header' ).forEach( btn => {
    btn.addEventListener( 'click', () => {
      const acc  = btn.closest( '.accordion' );
      if ( ! acc ) return;
      const body = acc.querySelector( '.accordion-body' );
      const open = acc.classList.toggle( 'open' );
      btn.classList.toggle( 'open', open );
      if ( body ) body.style.display = open ? 'block' : 'none';
    } );
  } );

  // ── Recreational classes: tab switching ──────────────────────────────────
  const recTabBar = document.querySelector( '.tab-bar' );
  if ( recTabBar ) {
    const recTabs   = recTabBar.querySelectorAll( '.tab-btn' );
    const recPanels = document.querySelectorAll( '.tab-panel' );

    function switchRecTab( id ) {
      recTabs.forEach( t => t.classList.toggle( 'active', t.dataset.panel === id ) );
      recPanels.forEach( p => p.classList.toggle( 'active', p.id === 'panel-' + id ) );
    }

    recTabs.forEach( tab => {
      tab.addEventListener( 'click', () => switchRecTab( tab.dataset.panel ) );
    } );
  }

  // ── Which Program finder ──────────────────────────────────────────────────
  const finderFilters = document.querySelector( '.finder-filters' );
  if ( finderFilters ) {
    const state = { age: null, exp: null, goal: null };

    function updateResults() {
      const cards      = document.querySelectorAll( '.prog-card' );
      const noResults  = document.querySelector( '.no-results' );
      const countEl    = document.getElementById( 'result-count' );
      let visible      = 0;

      cards.forEach( card => {
        const ageOk  = ! state.age  || card.dataset.age.split( ' ' ).includes( state.age );
        const expOk  = ! state.exp  || card.dataset.exp.split( ' ' ).includes( state.exp );
        const goalOk = ! state.goal || card.dataset.goal.split( ' ' ).includes( state.goal );
        const show   = ageOk && expOk && goalOk;
        card.classList.toggle( 'hidden', ! show );
        if ( show ) visible++;
      } );

      if ( countEl ) countEl.textContent = visible + ' program' + ( visible !== 1 ? 's' : '' );
      if ( noResults ) noResults.classList.toggle( 'visible', visible === 0 );
    }

    document.querySelectorAll( '.chip' ).forEach( chip => {
      chip.addEventListener( 'click', () => {
        const group = chip.dataset.group;
        const val   = chip.dataset.val;
        // Toggle: clicking the active chip clears the filter
        if ( state[ group ] === val ) {
          state[ group ] = null;
          chip.classList.remove( 'selected' );
        } else {
          // Deselect siblings
          finderFilters.querySelectorAll( `.chip[data-group="${ group }"]` )
            .forEach( c => c.classList.remove( 'selected' ) );
          state[ group ] = val;
          chip.classList.add( 'selected' );
        }
        updateResults();
      } );
    } );
  }

  // ── Facility lightbox (uses <img id="lb-img"> inside .lb-img-wrap) ────────
  const facilityLightbox = document.querySelector( '.lightbox' );
  const lbImg            = document.getElementById( 'lb-img' );

  if ( facilityLightbox && lbImg ) {
    const galleryItems = document.querySelectorAll( '.gallery-placeholder' );
    let lbImages = [];
    let lbIndex  = 0;

    function openFacilityLb( idx ) {
      lbIndex = idx;
      lbImg.src = lbImages[ idx ].src;
      lbImg.alt = lbImages[ idx ].alt;
      facilityLightbox.classList.add( 'open' );
      document.body.style.overflow = 'hidden';
    }

    function closeFacilityLb() {
      facilityLightbox.classList.remove( 'open' );
      document.body.style.overflow = '';
    }

    galleryItems.forEach( ( item, i ) => {
      const img = item.querySelector( 'img' );
      if ( img ) lbImages.push( img );
      item.addEventListener( 'click', () => openFacilityLb( i ) );
    } );

    facilityLightbox.querySelector( '.lb-close' )?.addEventListener( 'click', closeFacilityLb );
    facilityLightbox.querySelector( '.lb-prev'  )?.addEventListener( 'click', () => openFacilityLb( ( lbIndex - 1 + lbImages.length ) % lbImages.length ) );
    facilityLightbox.querySelector( '.lb-next'  )?.addEventListener( 'click', () => openFacilityLb( ( lbIndex + 1 ) % lbImages.length ) );

    facilityLightbox.addEventListener( 'click', ( e ) => {
      if ( e.target === facilityLightbox ) closeFacilityLb();
    } );
  }

  // ── Gallery page lightbox (uses <div id="lb-content"> inside .lb-img-wrap) ─
  const galleryLightbox = document.getElementById( 'lightbox' );
  const lbContent       = document.getElementById( 'lb-content' );

  if ( galleryLightbox && lbContent ) {
    const galleryPageItems = document.querySelectorAll( '.gallery-item' );
    let glbImages = [];
    let glbIndex  = 0;

    function buildGlbList() {
      glbImages = [];
      document.querySelectorAll( '.gallery-item:not(.hidden)' ).forEach( item => {
        const img = item.querySelector( 'img' );
        if ( img ) glbImages.push( { src: img.src, alt: img.alt || '' } );
      } );
    }

    function openGalleryLb( src, alt ) {
      glbIndex = glbImages.findIndex( im => im.src === src );
      lbContent.innerHTML = `<img src="${ src }" alt="${ alt }">`;
      const lbLabel = galleryLightbox.querySelector( '.lb-label' );
      if ( lbLabel ) lbLabel.textContent = alt;
      const lbCounter = galleryLightbox.querySelector( '.lb-counter' );
      if ( lbCounter ) lbCounter.textContent = ( glbIndex + 1 ) + ' / ' + glbImages.length;
      galleryLightbox.classList.add( 'open' );
      document.body.style.overflow = 'hidden';
    }

    function closeGalleryLb() {
      galleryLightbox.classList.remove( 'open' );
      document.body.style.overflow = '';
    }

    function navGalleryLb( dir ) {
      glbIndex = ( glbIndex + dir + glbImages.length ) % glbImages.length;
      const im = glbImages[ glbIndex ];
      lbContent.innerHTML = `<img src="${ im.src }" alt="${ im.alt }">`;
      const lbLabel = galleryLightbox.querySelector( '.lb-label' );
      if ( lbLabel ) lbLabel.textContent = im.alt;
      const lbCounter = galleryLightbox.querySelector( '.lb-counter' );
      if ( lbCounter ) lbCounter.textContent = ( glbIndex + 1 ) + ' / ' + glbImages.length;
    }

    galleryPageItems.forEach( item => {
      item.addEventListener( 'click', () => {
        const img = item.querySelector( 'img' );
        if ( ! img ) return;
        buildGlbList();
        openGalleryLb( img.src, img.alt );
      } );
    } );

    galleryLightbox.querySelector( '.lb-close' )?.addEventListener( 'click', closeGalleryLb );
    galleryLightbox.querySelector( '.lb-prev'  )?.addEventListener( 'click', () => navGalleryLb( -1 ) );
    galleryLightbox.querySelector( '.lb-next'  )?.addEventListener( 'click', () => navGalleryLb(  1 ) );

    galleryLightbox.addEventListener( 'click', ( e ) => {
      if ( e.target === galleryLightbox ) closeGalleryLb();
    } );

    // Keyboard navigation for both lightboxes
    document.addEventListener( 'keydown', ( e ) => {
      if ( galleryLightbox.classList.contains( 'open' ) ) {
        if ( e.key === 'Escape'     ) closeGalleryLb();
        if ( e.key === 'ArrowLeft'  ) navGalleryLb( -1 );
        if ( e.key === 'ArrowRight' ) navGalleryLb(  1 );
      }
    } );

    // Gallery filter
    const filterBtns = document.querySelectorAll( '.filter-btn' );
    filterBtns.forEach( btn => {
      btn.addEventListener( 'click', () => {
        filterBtns.forEach( b => b.classList.remove( 'active' ) );
        btn.classList.add( 'active' );
        const cat = btn.dataset.filter;
        galleryPageItems.forEach( item => {
          const show = cat === 'all' || item.dataset.cat === cat;
          item.classList.toggle( 'hidden', ! show );
        } );
        // Rebuild glb image list after filter
        buildGlbList();
      } );
    } );
  }

  // Keyboard: close facility lightbox with Escape
  if ( facilityLightbox && lbImg ) {
    document.addEventListener( 'keydown', ( e ) => {
      if ( facilityLightbox.classList.contains( 'open' ) ) {
        if ( e.key === 'Escape'     ) facilityLightbox.classList.remove( 'open' ), document.body.style.overflow = '';
        if ( e.key === 'ArrowLeft'  ) facilityLightbox.querySelector( '.lb-prev' )?.click();
        if ( e.key === 'ArrowRight' ) facilityLightbox.querySelector( '.lb-next' )?.click();
      }
    } );
  }

} )();
