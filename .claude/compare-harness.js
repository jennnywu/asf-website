// Local testing helper (not part of the theme): loads an HTML preview page and its WordPress
// version side by side on the local test server and reports differences in layout, styles,
// fonts, text, images and links. Served at /preview/.claude/compare-harness.js
window.asfCompare = async function (previewFile, wpPath, width, opts) {
  opts = opts || {};
  sessionStorage.setItem('asf_auth', '1');
  const mk = (src) => new Promise((res) => {
    const f = document.createElement('iframe');
    f.style.cssText = 'position:fixed;left:0;top:0;width:' + width + 'px;height:900px;border:0;opacity:0.01;pointer-events:none;z-index:-1';
    f.onload = () => setTimeout(() => res(f), 2500);
    f.src = src;
    document.body.appendChild(f);
  });
  const [a, b] = await Promise.all([mk('/preview/' + previewFile), mk(wpPath)]);
  const skip = /^(wp-|is-|has-|active$|open$|size-|pos-|tab-icon-|icon-|ico-|cat-|status-|age-|exp-|goal-|ph-|program-photo|alignwide|alignfull|mt-\d+)/;
  const collect = (doc) => {
    const main = doc.querySelector('main');
    const m = main.getBoundingClientRect();
    const seen = {};
    const fonts = {};
    main.querySelectorAll('*').forEach((el) => {
      if (!el.childNodes.length || ![...el.childNodes].some((n) => n.nodeType === 3 && n.textContent.trim())) return;
      const t = el.textContent.trim().slice(0, 40);
      if (!(t in fonts)) fonts[t] = doc.defaultView.getComputedStyle(el).fontFamily.split(',')[0].replace(/["']/g, '');
    });
    main.querySelectorAll('[class]').forEach((el) => {
      for (const c of el.classList) {
        if (skip.test(c) || seen[c]) continue;
        const r = el.getBoundingClientRect();
        if (!r.width && !r.height) continue;
        const cs = doc.defaultView.getComputedStyle(el);
        seen[c] = [Math.round(r.top - m.top), Math.round(r.left - m.left), Math.round(r.width), Math.round(r.height), cs.display, cs.fontSize, cs.fontWeight, cs.color, cs.backgroundColor];
        break;
      }
    });
    const words = (main.innerText || '').replace(/[\u2018\u2019]/g, "'").replace(/[\u201c\u201d]/g, '"').replace(/[\u2013\u2014]/g, '-').split(/\s+/).filter(Boolean);
    const imgs = [...main.querySelectorAll('img')].map((i) => (i.getAttribute('src') || '').split('/').pop());
    const links = [...main.querySelectorAll('a[href]')].map((l) => l.getAttribute('href').replace(/^https?:\/\/127\.0\.0\.1:9400/, '').replace(/\.html/, '/').replace(/^(?!https?:|mailto:|tel:|#|\/)/, '/').replace(/^\/index\/$/, '/'));
    return { seen, fonts, h: Math.round(m.height), words, imgs, links, scrollW: doc.documentElement.scrollWidth, vw: doc.defaultView.innerWidth };
  };
  const A = collect(a.contentDocument), B = collect(b.contentDocument);
  const out = { mainHeight: A.h + ' -> ' + B.h, hScroll: B.scrollW > B.vw ? 'WP page scrolls sideways: ' + B.scrollW : 'ok', layout: [], missingClasses: [], fonts: [] };
  for (const k in A.seen) {
    if (!B.seen[k]) { out.missingClasses.push(k); continue; }
    const p = A.seen[k], q = B.seen[k];
    const d = [0, 1, 2, 3].map((i) => q[i] - p[i]);
    const st = p.slice(4).join('|') !== q.slice(4).join('|');
    if (d.some((x) => Math.abs(x) > 3) || st) out.layout.push(k + ' d[t,l,w,h]=' + d.join(',') + (st ? ' style ' + p.slice(4).join('|') + ' => ' + q.slice(4).join('|') : ''));
  }
  for (const t in A.fonts) if (t in B.fonts && A.fonts[t] !== B.fonts[t]) out.fonts.push(t + ': ' + A.fonts[t] + ' => ' + B.fonts[t]);
  const bag = (arr) => arr.reduce((m, w) => (m[w] = (m[w] || 0) + 1, m), {});
  const diffBag = (x, y) => { const X = bag(x), Y = bag(y), r = []; for (const k in X) if ((Y[k] || 0) < X[k]) r.push(k + (X[k] - (Y[k] || 0) > 1 ? 'x' + (X[k] - (Y[k] || 0)) : '')); return r; };
  out.wordsMissing = diffBag(A.words, B.words).slice(0, 40);
  out.wordsExtra = diffBag(B.words, A.words).slice(0, 40);
  out.imgsMissing = diffBag(A.imgs, B.imgs);
  out.linksMissing = diffBag(A.links, B.links).slice(0, 30);
  // A flex/grid child is always "blockified", so inline-block => block (or inline-flex => flex) is not a real difference
  out.layout = out.layout.filter((x) => !/inline-block\|.* => block\||inline-flex\|.* => flex\|/.test(x)).slice(0, opts.max || 30);
  out.missingClasses = out.missingClasses.slice(0, 40);
  out.fonts = out.fonts.slice(0, 20);
  a.remove(); b.remove();
  return out;
};

window.ALLPAGES = [['index.html', '/'], ['birthday.html', '/birthday/'], ['our-facility.html', '/our-facility/'], ['xcel.html', '/xcel/'], ['competitive-team.html', '/competitive-team/'], ['benefits.html', '/benefits/'], ['location-contact.html', '/location-contact/'], ['coaching-team.html', '/coaching-team/'], ['gallery.html', '/gallery/'], ['which-program.html', '/which-program/'], ['camp.html', '/camp/'], ['recreational-classes.html', '/recreational-classes/']];

// Runs every page in the background; read window.__res (summary) / window.__full (details) when window.__done
window.asfRunAll = function (pages, width) {
  window.__res = {}; window.__full = {}; window.__done = false;
  (async () => {
    for (const [f, p] of pages) {
      try {
        const r = await asfCompare(f, p, width);
        window.__full[f] = r;
        window.__res[f] = r.mainHeight + ' L' + r.layout.length + ' F' + r.fonts.length + ' w' + r.wordsMissing.length + '/' + r.wordsExtra.length + ' i' + r.imgsMissing.length + ' l' + r.linksMissing.length + ' ' + r.hScroll;
      } catch (e) { window.__res[f] = 'ERR ' + e.message; }
    }
    window.__done = true;
  })();
  return 'started';
};
