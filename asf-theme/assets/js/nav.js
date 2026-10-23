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
  // Highlights the menu link for the current page (works with whatever links are in the menu)
  // and opens its fold-out section
  var path = window.location.pathname.replace(/\/$/, '');

  [].forEach.call(document.querySelectorAll('.nav-menu a'), function (a) {
    var url;
    try { url = new URL(a.href); } catch (e) { return; }
    if (url.origin !== window.location.origin || url.hash || url.pathname.replace(/\/$/, '') !== path) return;
    a.parentNode.classList.add('active');
    var drop = a.closest('.nav-dropdown');
    if (drop) {
      drop.classList.add('open');
      var btn = drop.previousElementSibling;
      if (btn) btn.setAttribute('aria-expanded', 'true');
    }
  });

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
