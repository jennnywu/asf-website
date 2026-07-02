/* ASF nav.js — interactive behaviour, no HTML injection */
(function () {
  'use strict';

  /* ── DROPDOWN TOGGLES ── */
  [].forEach.call(document.querySelectorAll('.nav-parent'), function (btn) {
    btn.addEventListener('click', function () {
      var expanded = btn.getAttribute('aria-expanded') === 'true';
      // Close all others
      [].forEach.call(document.querySelectorAll('.nav-parent'), function (other) {
        if (other !== btn) {
          other.setAttribute('aria-expanded', 'false');
          if (other.nextElementSibling) other.nextElementSibling.classList.remove('open');
        }
      });
      btn.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      if (btn.nextElementSibling) btn.nextElementSibling.classList.toggle('open', !expanded);
    });
  });

  /* ── MOBILE HAMBURGER ── */
  var hamburger = document.getElementById('nav-hamburger');
  var siteNav   = document.getElementById('site-nav');
  var overlay   = document.getElementById('nav-overlay');

  function openNav() {
    if (siteNav)   siteNav.classList.add('open');
    if (hamburger) { hamburger.classList.add('open'); hamburger.setAttribute('aria-expanded', 'true'); }
    if (overlay)   overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function closeNav() {
    if (siteNav)   siteNav.classList.remove('open');
    if (hamburger) { hamburger.classList.remove('open'); hamburger.setAttribute('aria-expanded', 'false'); }
    if (overlay)   overlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (hamburger) hamburger.addEventListener('click', function () {
    siteNav && siteNav.classList.contains('open') ? closeNav() : openNav();
  });
  if (overlay) overlay.addEventListener('click', closeNav);

  /* ── ACTIVE NAV STATE ── */
  var ABOUT_PAGES    = ['/our-facility', '/location-contact', '/benefits', '/coaching-team'];
  var PROGRAMS_PAGES = ['/which-program', '/camp', '/recreational-classes', '/xcel', '/competitive-team', '/birthday'];
  var path = window.location.pathname.replace(/\/$/, '');

  var navMenu = document.querySelector('.nav-menu');
  if (navMenu) {
    var items = navMenu.children;
    if (path === '' || path === '/') {
      if (items[0]) items[0].classList.add('active');
    } else if (ABOUT_PAGES.some(function (s) { return path === s || path.indexOf(s + '/') === 0; })) {
      var aboutBtn = items[1] && items[1].querySelector('.nav-parent');
      var aboutDrop = items[1] && items[1].querySelector('.nav-dropdown');
      if (aboutBtn)  { aboutBtn.setAttribute('aria-expanded', 'true'); }
      if (aboutDrop) {
        aboutDrop.classList.add('open');
        [].forEach.call(aboutDrop.querySelectorAll('a'), function (a) {
          try {
            if (new URL(a.href).pathname.replace(/\/$/, '') === path) a.parentNode.classList.add('active');
          } catch (e) {}
        });
      }
    } else if (PROGRAMS_PAGES.some(function (s) { return path === s || path.indexOf(s + '/') === 0; })) {
      var pgBtn  = items[2] && items[2].querySelector('.nav-parent');
      var pgDrop = items[2] && items[2].querySelector('.nav-dropdown');
      if (pgBtn)  { pgBtn.setAttribute('aria-expanded', 'true'); }
      if (pgDrop) {
        pgDrop.classList.add('open');
        [].forEach.call(pgDrop.querySelectorAll('a'), function (a) {
          try {
            if (new URL(a.href).pathname.replace(/\/$/, '') === path) a.parentNode.classList.add('active');
          } catch (e) {}
        });
      }
    } else if (path === '/gallery') {
      if (items[3]) items[3].classList.add('active');
    }
  }

  /* ── BACK TO TOP ── */
  var btt = document.createElement('button');
  btt.id = 'back-to-top';
  btt.setAttribute('aria-label', 'Back to top');
  btt.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>';
  document.body.appendChild(btt);

  window.addEventListener('scroll', function () {
    btt.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });
  btt.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

})();
