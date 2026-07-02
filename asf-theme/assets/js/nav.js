/* ASF nav.js — interactive behaviour only (no HTML injection) */
(function () {
  'use strict';

  /* ── DROPDOWN TOGGLES ── */
  document.querySelectorAll('.nav-parent-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var parent = btn.closest('.nav-parent');
      var isOpen = parent.classList.contains('open');
      // Close all
      document.querySelectorAll('.nav-parent.open').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.nav-parent-btn').setAttribute('aria-expanded', 'false');
      });
      // Open clicked (if it was closed)
      if (!isOpen) {
        parent.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ── MOBILE HAMBURGER ── */
  var menuBtn  = document.getElementById('mobile-menu-btn');
  var siteNav  = document.getElementById('site-nav');
  var overlay  = document.getElementById('nav-overlay');

  function openNav() {
    if (!siteNav) return;
    siteNav.classList.add('open');
    if (overlay) overlay.classList.add('active');
    if (menuBtn) menuBtn.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }

  function closeNav() {
    if (!siteNav) return;
    siteNav.classList.remove('open');
    if (overlay) overlay.classList.remove('active');
    if (menuBtn) menuBtn.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  if (menuBtn)  menuBtn.addEventListener('click', openNav);
  if (overlay)  overlay.addEventListener('click', closeNav);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeNav();
  });

  /* ── ACTIVE NAV STATE ── */
  var path = window.location.pathname.replace(/\/$/, '');
  var ABOUT_SLUGS    = ['/our-facility', '/coaching-team', '/benefits', '/location-contact'];
  var PROGRAMS_SLUGS = ['/recreational-classes', '/xcel', '/competitive-team', '/camp', '/birthday', '/which-program'];

  document.querySelectorAll('.nav-link, .nav-sub-link').forEach(function (a) {
    if (!a.href) return;
    try {
      var linkPath = new URL(a.href).pathname.replace(/\/$/, '');
      if (linkPath === path || (path === '' && linkPath === '')) {
        a.classList.add('active');
      }
    } catch (e) { /* ignore */ }
  });

  ABOUT_SLUGS.forEach(function (slug) {
    if (path === slug || path.indexOf(slug) === 0) {
      var aboutBtn = document.querySelector('.nav-parent-btn[aria-label="About"], .nav-parent-btn');
      document.querySelectorAll('.nav-parent-btn').forEach(function (btn) {
        if (btn.nextElementSibling) {
          var links = btn.nextElementSibling.querySelectorAll('a');
          links.forEach(function (a) {
            try {
              if (new URL(a.href).pathname.replace(/\/$/, '') === slug) {
                btn.closest('.nav-parent').classList.add('open');
                btn.setAttribute('aria-expanded', 'true');
              }
            } catch (e) { /* ignore */ }
          });
        }
      });
    }
  });

  PROGRAMS_SLUGS.forEach(function (slug) {
    if (path === slug || path.indexOf(slug) === 0) {
      document.querySelectorAll('.nav-parent-btn').forEach(function (btn) {
        if (btn.nextElementSibling) {
          var links = btn.nextElementSibling.querySelectorAll('a');
          links.forEach(function (a) {
            try {
              if (new URL(a.href).pathname.replace(/\/$/, '') === slug) {
                btn.closest('.nav-parent').classList.add('open');
                btn.setAttribute('aria-expanded', 'true');
              }
            } catch (e) { /* ignore */ }
          });
        }
      });
    }
  });

  /* ── BACK TO TOP ── */
  var btt = document.createElement('button');
  btt.id = 'back-to-top';
  btt.setAttribute('aria-label', 'Back to top');
  btt.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>';
  btt.style.cssText = [
    'position:fixed',
    'bottom:28px',
    'right:28px',
    'width:44px',
    'height:44px',
    'border-radius:50%',
    'background:var(--dark-garnet)',
    'color:#fff',
    'border:none',
    'cursor:pointer',
    'display:flex',
    'align-items:center',
    'justify-content:center',
    'box-shadow:0 4px 16px rgba(0,0,0,.25)',
    'opacity:0',
    'pointer-events:none',
    'transition:opacity .25s',
    'z-index:900',
  ].join(';');
  document.body.appendChild(btt);

  window.addEventListener('scroll', function () {
    if (window.scrollY > 400) {
      btt.style.opacity = '1';
      btt.style.pointerEvents = 'auto';
    } else {
      btt.style.opacity = '0';
      btt.style.pointerEvents = 'none';
    }
  }, { passive: true });

  btt.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

})();
