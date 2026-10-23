/* Home page: hero slideshow + program tabs (same behaviour as the HTML preview's inline script).
   Works with any number of slides/tabs the client adds in the editor. */
(function () {
  'use strict';

  /* ── SLIDESHOW ── */
  var hero = document.querySelector('.hero');
  var slides = hero ? [].slice.call(hero.querySelectorAll(':scope > .hero-slide')) : [];
  if (hero && slides.length) {
    var current = 0;
    var paused = false;
    var pauseIcon = '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>';
    var playIcon = '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>';

    // Pause button and dots aren't content, so they're added here
    var pauseBtn = document.createElement('button');
    pauseBtn.className = 'hero-pause';
    pauseBtn.setAttribute('aria-label', 'Pause slideshow');
    pauseBtn.title = 'Pause slideshow';
    pauseBtn.innerHTML = pauseIcon;
    var dotsWrap = document.createElement('div');
    dotsWrap.className = 'hero-dots';
    var dots = slides.map(function (s, i) {
      var d = document.createElement('button');
      d.className = 'hero-dot';
      d.setAttribute('aria-label', 'Show slide ' + (i + 1));
      dotsWrap.appendChild(d);
      return d;
    });
    if (slides.length > 1) {
      hero.appendChild(pauseBtn);
      hero.appendChild(dotsWrap);
    }

    var goSlide = function (n) {
      slides[current].classList.remove('active');
      dots[current].classList.remove('active');
      current = (n + slides.length) % slides.length;
      slides[current].classList.add('active');
      dots[current].classList.add('active');
    };
    slides.forEach(function (s) { s.classList.remove('active'); });
    slides[0].classList.add('active');
    dots[0].classList.add('active');
    hero.classList.add('is-ready');

    var t;
    var restart = function () {
      clearInterval(t);
      t = setInterval(function () { if (!paused) goSlide(current + 1); }, 4500);
    };
    if (slides.length > 1) restart();
    dots.forEach(function (d, i) {
      d.addEventListener('click', function () { goSlide(i); restart(); });
    });
    pauseBtn.addEventListener('click', function () {
      paused = !paused;
      pauseBtn.innerHTML = paused ? playIcon : pauseIcon;
      pauseBtn.setAttribute('aria-label', paused ? 'Resume slideshow' : 'Pause slideshow');
    });
  }

  /* ── PROGRAM TABS ── */
  // Each tab is a button linking to #panel-id; the panel group has that id (falls back to tab order)
  var tabs = [].slice.call(document.querySelectorAll('.program-tab'));
  var panels = [].slice.call(document.querySelectorAll('.program-panel'));
  if (tabs.length && panels.length) {
    var switchTab = function (n) {
      tabs.forEach(function (t, i) { t.classList.toggle('active', i === n); });
      var link = tabs[n].querySelector('a');
      var id = link ? (link.getAttribute('href') || '').replace(/^.*#/, '') : '';
      var target = id ? document.getElementById(id) : null;
      if (!target || panels.indexOf(target) === -1) target = panels[n];
      panels.forEach(function (p) { p.classList.toggle('active', p === target); });
    };
    tabs.forEach(function (tab, i) {
      var link = tab.querySelector('a');
      if (!link) return;
      link.setAttribute('role', 'tab');
      link.addEventListener('click', function (e) {
        e.preventDefault();
        switchTab(i);
      });
    });
    switchTab(0);
  }
})();
