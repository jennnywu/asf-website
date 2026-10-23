/* Benefits page: "Read More" buttons show/hide their panel.
   Each button is a core button linking to #more-N; the panel is the group with that anchor id. */
(function () {
  var buttons = document.querySelectorAll('.btn-read-more');

  function setOpen(wrap, link, panel, closedLabel, open) {
    panel.classList.toggle('open', open);
    wrap.classList.toggle('open', open);
    link.textContent = open ? 'Show Less' : closedLabel;
    link.setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  Array.prototype.forEach.call(buttons, function (wrap) {
    var link = wrap.querySelector('a');
    if (!link) return;
    var id = (link.getAttribute('href') || '').split('#')[1];
    var panel = id ? document.getElementById(id) : null;
    if (!panel) return;
    var closedLabel = link.textContent.trim() || 'Read More';

    link.setAttribute('role', 'button');
    link.setAttribute('aria-controls', id);
    link.setAttribute('aria-expanded', 'false');

    link.addEventListener('click', function (e) {
      e.preventDefault();
      setOpen(wrap, link, panel, closedLabel, !panel.classList.contains('open'));
    });

    // Deep link (e.g. /benefits/#more-2) opens that panel
    if (window.location.hash === '#' + id) {
      setOpen(wrap, link, panel, closedLabel, true);
    }
  });
})();
