// Shared nav, footer, and back-to-top for all ASF pages.
// Edit this file to update the nav or footer across the entire site.
(function () {
  var MOBILE_TOPBAR_INNER = [
    '<a href="index.html" class="mobile-logo">',
    '  <div class="mobile-logo-icon"><img src="assets/web/logo.png" alt="ASF Logo"></div>',
    '  <span class="mobile-logo-name">Academy of Sport and Fitness</span>',
    '</a>',
    '<button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu" aria-expanded="false">',
    '  <span></span><span></span><span></span>',
    '</button>'
  ].join('\n');

  var NAV_INNER = [
    '<a href="index.html" class="nav-logo">',
    '  <div class="nav-logo-icon"><img src="assets/web/logo.png" alt="ASF Logo"></div>',
    '  <div class="nav-logo-text"><strong>Academy of Sport<br>and Fitness</strong></div>',
    '</a>',
    '<ul class="nav-menu">',
    '  <li><a href="index.html">Home</a></li>',
    '  <li>',
    '    <button class="nav-parent" aria-expanded="false">',
    '      About',
    '      <span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10l5 5 5-5H7z"/></svg></span>',
    '    </button>',
    '    <ul class="nav-dropdown">',
    '      <li><a href="our-facility.html">Our Facility</a></li>',
    '      <li><a href="location-contact.html">Location &amp; Contact</a></li>',
    '      <li><a href="benefits.html">Benefits</a></li>',
    '      <li><a href="coaching-team.html">Coaching Team</a></li>',
    '      <li><a href="https://academysportfitness.ca/wp-content/uploads/2025/06/Academy-Policies-25-26.pdf" target="_blank" rel="noopener noreferrer">Policies (PDF)&nbsp;<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a></li>',
    '    </ul>',
    '  </li>',
    '  <li>',
    '    <button class="nav-parent" aria-expanded="false">',
    '      Programs',
    '      <span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10l5 5 5-5H7z"/></svg></span>',
    '    </button>',
    '    <ul class="nav-dropdown">',
    '      <li><a href="which-program.html">Find the Right Program</a></li>',
    '      <li><a href="camp.html">Camps</a></li>',
    '      <li><a href="recreational-classes.html">Recreational Classes</a></li>',
    '      <li><a href="xcel.html">Xcel / Advanced</a></li>',
    '      <li><a href="competitive-team.html">Competitive Team</a></li>',
    '      <li><a href="birthday.html">Birthday Parties</a></li>',
    '    </ul>',
    '  </li>',
    '  <li><a href="gallery.html">Gallery</a></li>',
    '  <li>',
    '    <button class="nav-parent" aria-expanded="false">',
    '      Family Portal',
    '      <span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10l5 5 5-5H7z"/></svg></span>',
    '    </button>',
    '    <ul class="nav-dropdown">',
    '      <li><a href="https://app.jackrabbitclass.com/regv2.asp?id=540626" target="_blank" rel="noopener noreferrer">Sign Up&nbsp;<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a></li>',
    '      <li><a href="https://app.jackrabbitclass.com/jr3.0/ParentPortal/Login?orgID=540626" target="_blank" rel="noopener noreferrer">Log In&nbsp;<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a></li>',
    '    </ul>',
    '  </li>',
    '</ul>',
    '<div class="nav-contact">',
    '  <p><a href="https://maps.google.com/?q=40+Vogell+Road+Unit+32+Richmond+Hill+ON+L4B+3N6" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none">40 Vogell Road, Unit #32<br>Richmond Hill, Ontario L4B 3N6</a></p>',
    '  <p><a href="tel:9057800913">905-780-0913</a></p>',
    '  <p><a href="mailto:academysportfitness@gmail.com">academysportfitness@gmail.com</a></p>',
    '</div>',
    '<div class="nav-cta-wrap">',
    '  <a href="https://app.jackrabbitclass.com/regv2.asp?id=540626" class="nav-cta" target="_blank" rel="noopener noreferrer">Register Now</a>',
    '</div>'
  ].join('\n');

  var FOOTER_INNER = [
    '<div class="footer-inner">',
    '  <div class="footer-brand">',
    '    <div class="footer-logo">',
    '      <div class="footer-logo-icon"><img src="assets/web/logo.png" alt="ASF Logo"></div>',
    '      <div class="footer-logo-text"><strong>Academy of Sport<br>and Fitness</strong></div>',
    '    </div>',
    '    <p>We foster complete child development - physically &amp; emotionally. Serving Richmond Hill, Markham, and the Greater York Region.</p>',
    '    <div class="footer-logos">',
    '      <a href="https://www.instagram.com/asfgymnastics/" class="footer-ig-btn" target="_blank" rel="noopener noreferrer" aria-label="Instagram">',
    '        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>',
    '      </a>',
    '      <img src="assets/web/logo-recasf.png" alt="Gymnastics Ontario" class="logo-go">',
    '      <img src="assets/web/logo-nccp.png" alt="National Coaching Certification Program" class="logo-nccp">',
    '    </div>',
    '  </div>',
    '  <div class="footer-col">',
    '    <h4>Programs</h4>',
    '    <ul>',
    '      <li><a href="recreational-classes.html">Recreational Classes</a></li>',
    '      <li><a href="competitive-team.html">Competitive Team</a></li>',
    '      <li><a href="xcel.html">Xcel / Advanced</a></li>',
    '      <li><a href="camp.html#panel-summer">Summer Camp</a></li>',
    '      <li><a href="camp.html#panel-winter">Winter Camp</a></li>',
    '      <li><a href="camp.html#panel-marchbreak">March Break Camp</a></li>',
    '    </ul>',
    '  </div>',
    '  <div class="footer-col">',
    '    <h4>Location &amp; Contact</h4>',
    '    <div class="footer-contact-item"><span class="icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg></span><span><a href="https://maps.google.com/?q=40+Vogell+Road+Unit+32+Richmond+Hill+ON+L4B+3N6" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none">40 Vogell Road, Unit #32<br>Richmond Hill, Ontario L4B 3N6</a></span></div>',
    '    <div class="footer-contact-item"><span class="icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg></span><a href="tel:9057800913">905-780-0913</a></div>',
    '    <div class="footer-contact-item"><span class="icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></span><a href="mailto:academysportfitness@gmail.com">academysportfitness@gmail.com</a></div>',
    '    <div class="footer-hours">',
    '      <h5><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg> Open Hours</h5>',
    '      Mon, Tue, Thu: 12pm–8:30pm<br>Wed: 2:30pm–8:30pm<br>Fri: 12pm–8pm<br>Sat–Sun: 9:30am–5pm',
    '    </div>',
    '  </div>',
    '  <div class="footer-col">',
    '    <h4>Quick Links</h4>',
    '    <ul>',
    '      <li><a href="our-facility.html">About ASF</a></li>',
    '      <li><a href="coaching-team.html">Coaching Team</a></li>',
    '      <li><a href="https://app.jackrabbitclass.com/jr3.0/ParentPortal/Login?orgID=540626" target="_blank" rel="noopener noreferrer">Family Portal</a></li>',
    '      <li><a href="https://app.jackrabbitclass.com/jr3.0/TimeClock/StaffLogin?OrgId=540626&amp;sId=6b551da4-ce01-4f84-93cd-3070660bcdcf&amp;loc=ACADEMY" target="_blank" rel="noopener noreferrer">Staff Portal</a></li>',
    '      <li><a href="https://academysportfitness.ca/wp-content/uploads/2025/06/Academy-Policies-25-26.pdf" target="_blank" rel="noopener noreferrer">Policies (PDF)</a></li>',
    '      <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeGI9-S27g814u1JuJN66jXMPEFzDr7q_HO4TTykKR-nlzwiQ/viewform?usp=send_form" target="_blank" rel="noopener noreferrer">Assessment Form</a></li>',
    '    </ul>',
    '  </div>',
    '</div>',
    '<div class="footer-bottom">',
    '  <span>&copy; 2026 Academy of Sport and Fitness. All rights reserved.</span>',
    '</div>'
  ].join('\n');

  var GATE_HTML = [
    '<div id="pw-gate">',
    '  <div id="pw-box">',
    '    <div id="pw-logo">Academy of Sport &amp; Fitness</div>',
    '    <div id="pw-sub">Enter the preview password to continue</div>',
    '    <input id="pw-input" type="password" placeholder="Password" autocomplete="off">',
    '    <button id="pw-btn">Enter Site</button>',
    '    <div id="pw-err"></div>',
    '  </div>',
    '</div>'
  ].join('\n');

  var ABOUT_PAGES = ['our-facility.html', 'location-contact.html', 'benefits.html', 'coaching-team.html'];
  var PROGRAMS_PAGES = ['which-program.html', 'camp.html', 'recreational-classes.html', 'xcel.html', 'competitive-team.html', 'birthday.html'];

  function initGate() {
    if (sessionStorage.getItem('asf_auth') === '1') return;
    document.body.insertAdjacentHTML('beforeend', GATE_HTML);

    function unlock() {
      sessionStorage.setItem('asf_auth', '1');
      var gate = document.getElementById('pw-gate');
      if (gate) gate.remove();
      document.body.style.overflow = '';
      document.body.style.position = '';
      document.body.style.width = '';
    }

    function attempt() {
      var inp = document.getElementById('pw-input');
      var err = document.getElementById('pw-err');
      if (!inp) return;
      if (inp.value.trim().toLowerCase() === 'asfgym') {
        unlock();
      } else {
        inp.classList.remove('shake');
        void inp.offsetWidth;
        inp.classList.add('shake');
        if (err) err.textContent = 'Incorrect password. Please try again.';
      }
    }

    var btn = document.getElementById('pw-btn');
    var inp = document.getElementById('pw-input');
    if (btn) btn.addEventListener('click', attempt);
    if (inp) inp.addEventListener('keydown', function (e) { if (e.key === 'Enter') attempt(); });
  }

  function init() {
    var page = (window.location.pathname.split('/').pop() || 'index.html').split('?')[0];

    // Inject mobile topbar
    var topbar = document.querySelector('.mobile-topbar');
    if (topbar) topbar.innerHTML = MOBILE_TOPBAR_INNER;

    // Inject nav
    var nav = document.getElementById('site-nav');
    if (nav) {
      nav.innerHTML = NAV_INNER;

      // Apply active states
      var menu = nav.querySelector('.nav-menu');
      if (menu) {
        var items = menu.children;
        if (page === 'index.html' || page === '') {
          items[0].classList.add('active');
        } else if (ABOUT_PAGES.indexOf(page) !== -1) {
          var aboutBtn = items[1].querySelector('.nav-parent');
          var aboutDrop = items[1].querySelector('.nav-dropdown');
          if (aboutBtn) aboutBtn.setAttribute('aria-expanded', 'true');
          if (aboutDrop) {
            aboutDrop.classList.add('open');
            [].forEach.call(aboutDrop.querySelectorAll('a'), function (a) {
              if (a.getAttribute('href') === page) a.parentNode.classList.add('active');
            });
          }
        } else if (PROGRAMS_PAGES.indexOf(page) !== -1) {
          var pgBtn = items[2].querySelector('.nav-parent');
          var pgDrop = items[2].querySelector('.nav-dropdown');
          if (pgBtn) pgBtn.setAttribute('aria-expanded', 'true');
          if (pgDrop) {
            pgDrop.classList.add('open');
            [].forEach.call(pgDrop.querySelectorAll('a'), function (a) {
              if (a.getAttribute('href') === page) a.parentNode.classList.add('active');
            });
          }
        } else if (page === 'gallery.html') {
          items[3].classList.add('active');
        }
      }
    }

    // Inject footer
    var footer = document.getElementById('site-footer');
    if (footer) footer.innerHTML = FOOTER_INNER;

    // Inject back-to-top button
    var btt = document.createElement('button');
    btt.id = 'back-to-top';
    btt.setAttribute('aria-label', 'Back to top');
    btt.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>';
    document.body.appendChild(btt);

    // Nav dropdown toggles
    [].forEach.call(document.querySelectorAll('.nav-parent'), function (btn) {
      btn.addEventListener('click', function () {
        var expanded = btn.getAttribute('aria-expanded') === 'true';
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

    // Mobile nav open/close
    var hamburger = document.getElementById('nav-hamburger');
    var siteNav = document.getElementById('site-nav');
    var overlay = document.getElementById('nav-overlay');

    function openNav() {
      if (siteNav) siteNav.classList.add('open');
      if (hamburger) { hamburger.classList.add('open'); hamburger.setAttribute('aria-expanded', 'true'); }
      if (overlay) overlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    function closeNav() {
      if (siteNav) siteNav.classList.remove('open');
      if (hamburger) { hamburger.classList.remove('open'); hamburger.setAttribute('aria-expanded', 'false'); }
      if (overlay) overlay.classList.remove('active');
      document.body.style.overflow = '';
    }

    if (hamburger) {
      hamburger.addEventListener('click', function () {
        siteNav && siteNav.classList.contains('open') ? closeNav() : openNav();
      });
    }
    if (overlay) overlay.addEventListener('click', closeNav);

    // Back to top
    window.addEventListener('scroll', function () {
      btt.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });
    btt.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Gate runs immediately — layout.js is deferred so DOM is already parsed
  initGate();

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
