/* Gallery page: category filter + lightbox.
   Block markup:
   - Filter buttons: .filter-bar .wp-block-button.filter-btn > a[href="#<category>"] ("#all" shows everything)
   - Items: .gallery-grid .gallery-item with a "cat-<category>" class token.
     Photos are Image blocks (figure > img); grey placeholder tiles have no img. */
(function () {
  'use strict';

  var grid = document.querySelector('.gallery-grid');
  if (!grid) return;

  var allItems = Array.prototype.slice.call(grid.querySelectorAll('.gallery-item'));
  var filterBtns = Array.prototype.slice.call(document.querySelectorAll('.filter-bar .filter-btn'));

  // Lightbox caption per category (same wording as the original page); unknown categories use the button text
  var LABELS = { facility: 'Facility', camps: 'Camps', recreational: 'Recreational', competitive: 'Competitive Team' };

  function categoryOf(item) {
    for (var i = 0; i < item.classList.length; i++) {
      var c = item.classList[i];
      if (c.indexOf('cat-') === 0) return c.slice(4);
    }
    return '';
  }

  function filterOf(btn) {
    var a = btn.querySelector('a');
    var href = a ? (a.getAttribute('href') || '') : '';
    var hash = href.indexOf('#') >= 0 ? href.slice(href.indexOf('#') + 1) : '';
    return hash.toLowerCase() || 'all';
  }

  function labelOf(item) {
    var cat = categoryOf(item);
    if (LABELS[cat]) return LABELS[cat];
    for (var i = 0; i < filterBtns.length; i++) {
      if (filterOf(filterBtns[i]) === cat) {
        var a = filterBtns[i].querySelector('a');
        return a ? a.textContent.replace(/\s*\(\d+\)\s*$/, '').trim() : cat;
      }
    }
    return cat;
  }

  // Full-size source of a photo: the largest srcset candidate, else src
  function photoSrc(img) {
    var best = img.getAttribute('src') || '';
    var srcset = img.getAttribute('srcset');
    if (srcset) {
      var maxW = 0;
      srcset.split(',').forEach(function (part) {
        var bits = part.trim().split(/\s+/);
        var w = parseInt(bits[1], 10) || 0;
        if (bits[0] && w > maxW) { maxW = w; best = bits[0]; }
      });
    }
    return best;
  }

  /* ── Filter + live counts ── */
  filterBtns.forEach(function (btn) {
    var f = filterOf(btn);
    var n = f === 'all' ? allItems.length : allItems.filter(function (i) { return categoryOf(i) === f; }).length;
    var a = btn.querySelector('a');
    if (!a) return;
    var count = document.createElement('span');
    count.className = 'filter-count';
    count.textContent = '(' + n + ')';
    a.appendChild(document.createTextNode(' '));
    a.appendChild(count);
    a.addEventListener('click', function (e) {
      e.preventDefault();
      setFilter(btn);
    });
  });

  function setFilter(btn) {
    filterBtns.forEach(function (b) { b.classList.remove('active'); });
    btn.classList.add('active');
    var f = filterOf(btn);
    allItems.forEach(function (item) {
      item.classList.toggle('hidden', f !== 'all' && categoryOf(item) !== f);
    });
  }

  // Start on "All" (or the first button)
  var start = filterBtns.filter(function (b) { return filterOf(b) === 'all'; })[0] || filterBtns[0];
  if (start) start.classList.add('active');

  /* ── Lightbox (built here; it lives outside the editable content) ── */
  var ICON_IMG = '<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" opacity=".4"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>';
  var lightbox = document.createElement('div');
  lightbox.className = 'lightbox';
  lightbox.id = 'lightbox';
  lightbox.setAttribute('role', 'dialog');
  lightbox.setAttribute('aria-modal', 'true');
  lightbox.innerHTML =
    '<button class="lb-close" type="button" aria-label="Close"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>' +
    '<button class="lb-prev" type="button" aria-label="Previous photo"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg></button>' +
    '<div class="lb-img-wrap"></div>' +
    '<button class="lb-next" type="button" aria-label="Next photo"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg></button>' +
    '<div class="lb-label"></div>' +
    '<div class="lb-counter"></div>';
  document.body.appendChild(lightbox);

  var lbContent = lightbox.querySelector('.lb-img-wrap');
  var lbCounter = lightbox.querySelector('.lb-counter');
  var lbLabel = lightbox.querySelector('.lb-label');
  var lbItems = [];
  var lbIndex = 0;

  function getVisibleItems() {
    return allItems.filter(function (i) { return !i.classList.contains('hidden'); });
  }

  function lbRender(i) {
    var item = lbItems[i];
    var img = item.querySelector('img');
    lbContent.innerHTML = '';
    if (!img || !img.getAttribute('src')) {
      var ph = document.createElement('div');
      ph.className = 'lb-placeholder';
      ph.innerHTML = ICON_IMG + '<span>Photo coming soon</span>';
      lbContent.appendChild(ph);
    } else {
      var big = document.createElement('img');
      big.src = photoSrc(img);
      big.alt = img.getAttribute('alt') || '';
      lbContent.appendChild(big);
    }
    lbLabel.textContent = labelOf(item);
    lbCounter.textContent = (i + 1) + ' / ' + lbItems.length;
  }

  function lbOpen(item) {
    lbItems = getVisibleItems();
    lbIndex = Math.max(0, lbItems.indexOf(item));
    lbRender(lbIndex);
    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function lbClose() {
    lightbox.classList.remove('open');
    document.body.style.overflow = '';
  }

  function lbNav(dir) {
    lbIndex = (lbIndex + dir + lbItems.length) % lbItems.length;
    lbRender(lbIndex);
  }

  allItems.forEach(function (item) {
    item.addEventListener('click', function (e) {
      e.preventDefault(); // an image the client linked somewhere still opens the lightbox
      lbOpen(item);
    });
  });

  lightbox.querySelector('.lb-close').addEventListener('click', lbClose);
  lightbox.querySelector('.lb-prev').addEventListener('click', function () { lbNav(-1); });
  lightbox.querySelector('.lb-next').addEventListener('click', function () { lbNav(1); });
  lightbox.addEventListener('click', function (e) { if (e.target === lightbox) lbClose(); });

  document.addEventListener('keydown', function (e) {
    if (!lightbox.classList.contains('open')) return;
    if (e.key === 'Escape') lbClose();
    if (e.key === 'ArrowLeft') lbNav(-1);
    if (e.key === 'ArrowRight') lbNav(1);
  });
})();
