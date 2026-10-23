// Local testing helper (not part of the theme): clicks through each page's interactive parts
// on the local WordPress test site. Served at /preview/.claude/js-tests.js
window.asfLoad = (src, width) => new Promise((res) => {
  const f = document.createElement('iframe');
  f.style.cssText = 'position:fixed;left:0;top:0;width:' + (width || 1400) + 'px;height:900px;border:0;opacity:0.01;pointer-events:none;z-index:-1';
  f.onload = () => setTimeout(() => res(f), 2000);
  f.src = src;
  document.body.appendChild(f);
});
const wait = (ms) => new Promise((r) => setTimeout(r, ms));
const vis = (el) => !!el && el.getClientRects().length > 0 && getComputedStyle(el).visibility !== 'hidden' && el.ownerDocument.defaultView.getComputedStyle(el).display !== 'none';
const shown = (d, sel) => [...d.querySelectorAll(sel)].filter((e) => e.offsetParent !== null || e.getClientRects().length).length;

window.asfJsTests = async function () {
  const R = {};
  window.__jsPartial = R;
  const run = async (name, src, fn, width) => {
    const f = await Promise.race([asfLoad(src, width), wait(20000).then(() => null)]);
    if (!f) { R[name] = 'LOAD TIMEOUT'; document.querySelectorAll('iframe').forEach((x) => x.remove()); return; }
    try { R[name] = await fn(f.contentDocument, f.contentWindow); } catch (e) { R[name] = 'ERROR ' + e.message; }
    f.remove();
  };

  await run('home', '/', async (d) => {
    const slides = d.querySelectorAll('.hero > .hero-slide').length;
    const dots = d.querySelectorAll('.hero-dot').length;
    const tabs = d.querySelectorAll('.program-tab a');
    tabs[2].click(); await wait(200);
    const active = [...d.querySelectorAll('.program-panel')].filter((p) => p.classList.contains('active')).map((p) => p.id);
    const pause = d.querySelector('.hero-pause'); pause.click(); await wait(100);
    return { slides, dots, activeAfterTab3: active.join(','), pauseLabel: pause.getAttribute('aria-label') };
  });

  await run('camp-click', '/camp/', async (d) => {
    const tab = [...d.querySelectorAll('.camp-tab a')].find((a) => /winter/i.test(a.getAttribute('href')));
    tab.click(); await wait(300);
    return { visiblePanels: [...d.querySelectorAll('[id^="panel-"]')].filter(vis).map((p) => p.id).join(',') };
  });
  await run('camp-deeplink', '/camp/#panel-marchbreak', async (d) => ({ visiblePanels: [...d.querySelectorAll('[id^="panel-"]')].filter(vis).map((p) => p.id).join(',') }));
  await run('camp-mobile-prepare', '/camp/#panel-prepare', async (d) => ({ accordionsOnMobile: d.querySelectorAll('#panel-prepare details, #panel-prepare .open, #panel-prepare [class*="accordion"]').length }), 375);

  await run('rec', '/recreational-classes/', async (d) => {
    const before = [...d.querySelectorAll('.tab-panel')].filter(vis).map((p) => p.id).join(',');
    const tab = [...d.querySelectorAll('.tab-btn a')][1];
    tab.click(); await wait(300);
    const after = [...d.querySelectorAll('.tab-panel')].filter(vis).map((p) => p.id).join(',');
    const det = d.querySelector('details.accordion'); const wasOpen = det.open; det.querySelector('summary').click(); await wait(100);
    return { before, afterClickTab2: after, accordionToggles: wasOpen !== det.open };
  });
  await run('rec-deeplink', '/recreational-classes/#panel-summer', async (d) => ({ visible: [...d.querySelectorAll('.tab-panel')].filter(vis).map((p) => p.id).join(',') }));

  await run('gallery', '/gallery/', async (d) => {
    const all = shown(d, '.gallery-item');
    const btn = [...d.querySelectorAll('.filter-btn a')].find((a) => /facility/.test(a.getAttribute('href')));
    const label = btn.textContent.trim();
    btn.click(); await wait(500);
    const fac = shown(d, '.gallery-item');
    const img = [...d.querySelectorAll('.gallery-item img')].find((i) => i.getClientRects().length);
    img.click(); await wait(400);
    const lb = [...d.querySelectorAll('[class*="lightbox"]')].find(vis);
    const lbImg = lb && lb.querySelector('img');
    return { visibleAll: all, facilityButton: label, visibleFacility: fac, lightboxOpen: !!lb, lightboxImg: lbImg ? lbImg.src.split('/').pop() : null };
  });

  await run('which-program', '/which-program/', async (d) => {
    const cards = () => [...d.querySelectorAll('.prog-card')].filter(vis).length;
    const before = cards();
    const chip = d.querySelector('.chip a[href*="age-"]:not([href$="-any"])');
    chip.click(); await wait(400);
    const afterAge = cards();
    const count = (d.querySelector('[class*="result"]') || {}).textContent;
    return { cardsBefore: before, chip: chip.textContent.trim(), cardsAfter: afterAge, countText: (count || '').trim().slice(0, 60) };
  });

  await run('benefits', '/benefits/', async (d) => {
    const btn = d.querySelector('.btn-read-more a');
    const panel = d.getElementById(btn.getAttribute('href').replace(/^.*#/, ''));
    const h0 = panel.getBoundingClientRect().height;
    btn.click(); await wait(600);
    return { label: btn.textContent.trim(), panelHeightBefore: Math.round(h0), panelHeightAfter: Math.round(panel.getBoundingClientRect().height) };
  });

  await run('our-facility', '/our-facility/', async (d) => {
    const img = d.querySelector('main img');
    img.click(); await wait(400);
    const lb = [...d.querySelectorAll('[class*="lightbox"]')].find(vis);
    const counter = lb ? lb.innerText.match(/\d+\s*\/\s*\d+/) : null;
    return { lightboxOpen: !!lb, counter: counter && counter[0] };
  });

  await run('nav', '/coaching-team/', async (d) => {
    const active = [...d.querySelectorAll('.nav-menu li.active > a')].map((a) => a.textContent.trim());
    const open = [...d.querySelectorAll('.nav-dropdown.open')].length;
    const btn = [...d.querySelectorAll('.nav-parent')].find((b) => /Programs/.test(b.textContent));
    btn.click(); await wait(100);
    return { activeLinks: active.join(','), openDropdownsOnLoad: open, programsExpandedAfterClick: btn.getAttribute('aria-expanded') };
  });

  await run('nav-mobile', '/xcel/', async (d) => {
    const h = d.getElementById('nav-hamburger'); h.click(); await wait(300);
    return { navOpen: d.getElementById('site-nav').classList.contains('open') };
  }, 375);

  return R;
};
