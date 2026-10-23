/* Which Program page: program finder.
   Block markup:
   - Each question: .finder-filters .filter-chips (Buttons block) > .wp-block-button.chip > a[href="#<question>-<value>"]
     e.g. "#age-toddler"; "#age-any" = no preference.
   - Each program card: .prog-grid .prog-card whose classes list the answers it suits ("age-toddler exp-first goal-fun").
     A card with no class for a question is shown whatever the answer to that question.
   - .finder-results-header gets the "N programs match" count; .no-results shows when nothing matches. */
(function () {
  'use strict';

  var grid = document.querySelector('.prog-grid');
  if (!grid) return;

  var state = {};

  function tokenOf(chip) {
    var a = chip.querySelector('a');
    var href = a ? (a.getAttribute('href') || '') : '';
    var i = href.indexOf('#');
    var hash = i >= 0 ? href.slice(i + 1).toLowerCase() : '';
    var dash = hash.indexOf('-');
    if (dash < 1) return null;
    return { key: hash.slice(0, dash), val: hash.slice(dash + 1) };
  }

  function select(group, chip) {
    group.querySelectorAll('.chip').forEach(function (c) { c.classList.remove('selected'); });
    chip.classList.add('selected');
  }

  document.querySelectorAll('.finder-filters .filter-chips').forEach(function (group) {
    var chips = Array.prototype.slice.call(group.querySelectorAll('.wp-block-button.chip'));
    var first = null;
    chips.forEach(function (chip) {
      var t = tokenOf(chip);
      if (!t) return;
      if (!(t.key in state)) state[t.key] = 'any';
      if (!first || (t.val === 'any' && tokenOf(first).val !== 'any')) first = chip;
      var a = chip.querySelector('a');
      a.setAttribute('role', 'button');
      a.addEventListener('click', function (e) {
        e.preventDefault();
        select(group, chip);
        state[t.key] = t.val;
        updateResults();
      });
    });
    // Start on the "any" answer (or the first answer if there is none)
    if (first) {
      select(group, first);
      var ft = tokenOf(first);
      state[ft.key] = ft.val;
    }
  });

  // Result count lives next to the "Recommended Programs" heading
  var header = document.querySelector('.finder-results-header');
  var countEl = header ? header.querySelector('.result-count') : null;
  if (header && !countEl) {
    countEl = document.createElement('span');
    countEl.className = 'result-count';
    countEl.id = 'result-count';
    countEl.setAttribute('aria-live', 'polite');
    header.appendChild(countEl);
  }
  var noResults = document.querySelector('.no-results');

  function cardMatches(card, key, val) {
    if (val === 'any') return true;
    var prefix = key + '-';
    var hasAny = false;
    for (var i = 0; i < card.classList.length; i++) {
      var c = card.classList[i];
      if (c.indexOf(prefix) === 0) {
        hasAny = true;
        if (c === prefix + val) return true;
      }
    }
    return !hasAny;
  }

  function updateResults() {
    var cards = grid.querySelectorAll('.prog-card');
    var visible = 0;
    cards.forEach(function (card) {
      var match = Object.keys(state).every(function (key) { return cardMatches(card, key, state[key]); });
      card.classList.toggle('hidden', !match);
      if (match) visible++;
    });
    if (countEl) countEl.textContent = visible === 0 ? '' : visible + ' program' + (visible !== 1 ? 's' : '') + ' match';
    if (noResults) noResults.style.display = visible === 0 ? 'block' : 'none';
  }

  updateResults();
})();
