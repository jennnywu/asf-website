/* Our Facility page: photo gallery lightbox.
   Works on the block markup: every image inside the "Photo gallery" group (.facility-gallery)
   opens in a lightbox with prev/next, a counter, Escape and arrow-key support.
   The lightbox itself is built here, so the page content only holds editable images. */
(function () {
  'use strict';

  var galleryImgs = Array.prototype.slice.call(document.querySelectorAll('.facility-gallery img'));
  if (!galleryImgs.length) return;

  var svgClose = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
  var svgPrev = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>';
  var svgNext = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>';

  var lightbox = document.createElement('div');
  lightbox.className = 'lightbox';
  lightbox.id = 'lightbox';
  lightbox.setAttribute('role', 'dialog');
  lightbox.setAttribute('aria-modal', 'true');
  lightbox.setAttribute('aria-label', 'Photo viewer');
  lightbox.innerHTML =
    '<button type="button" class="lb-close" aria-label="Close">' + svgClose + '</button>' +
    '<button type="button" class="lb-prev" aria-label="Previous photo">' + svgPrev + '</button>' +
    '<div class="lb-img-wrap"><img src="" alt=""></div>' +
    '<button type="button" class="lb-next" aria-label="Next photo">' + svgNext + '</button>' +
    '<div class="lb-counter">1 / ' + galleryImgs.length + '</div>';
  document.body.appendChild(lightbox);

  var lbImg = lightbox.querySelector('.lb-img-wrap img');
  var lbCounter = lightbox.querySelector('.lb-counter');
  var lbIndex = 0;

  function show(i) {
    lbIndex = i;
    var src = galleryImgs[i].currentSrc || galleryImgs[i].src;
    lbImg.src = src;
    lbImg.alt = galleryImgs[i].alt || '';
    lbCounter.textContent = (lbIndex + 1) + ' / ' + galleryImgs.length;
  }
  function lbOpen(i) { show(i); lightbox.classList.add('open'); }
  function lbClose() { lightbox.classList.remove('open'); }
  function lbGo(dir) { show((lbIndex + dir + galleryImgs.length) % galleryImgs.length); }

  galleryImgs.forEach(function (img, i) {
    var item = img.closest('figure') || img.parentElement;
    item.addEventListener('click', function (e) {
      e.preventDefault(); // in case the photo was given a link in the editor
      lbOpen(i);
    });
  });
  lightbox.querySelector('.lb-close').addEventListener('click', lbClose);
  lightbox.querySelector('.lb-prev').addEventListener('click', function () { lbGo(-1); });
  lightbox.querySelector('.lb-next').addEventListener('click', function () { lbGo(1); });
  lightbox.addEventListener('click', function (e) { if (e.target === lightbox) lbClose(); });
  document.addEventListener('keydown', function (e) {
    if (!lightbox.classList.contains('open')) return;
    if (e.key === 'ArrowLeft') lbGo(-1);
    if (e.key === 'ArrowRight') lbGo(1);
    if (e.key === 'Escape') lbClose();
  });
})();
