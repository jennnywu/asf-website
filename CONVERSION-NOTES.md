# ASF theme: editable pages - conversion notes

Branch: `wordpress-editable-pages`. Everything here was built and tested on a local copy of WordPress only. Nothing has been uploaded to academysportfitness.ca.

## What changed

Every page is now built from **blocks** in the WordPress page editor (Pages → pick a page → Edit). The client can click any text, photo, button or link on the page and change it, the same way as the Coaching Team pilot. The nav, footer and contact details are edited in **Appearance → Menus** and **Appearance → Customize**.

Each page also keeps a built-in default layout (a "pattern"). If a page is empty, the site shows that default layout, so nothing breaks before the content is filled in.

## How the client edits each page

General tips that work on every page:
- **Change text:** click it and type.
- **Change a photo:** click it, then **Replace** in the toolbar.
- **Change a link or button:** click it, then the link icon (or Ctrl+K).
- **Add another card, row, photo or coach:** open **List View** (the three-lines icon, top left), select the item (they have friendly names like "Coach", "Class card", "Camp week"), then **⋮ → Duplicate**, and edit the copy.
- **Remove one:** same, then **⋮ → Delete**.
- Main page sections are locked so they can't be deleted by accident.

| Page | What's on it / how it's edited |
|---|---|
| Home | Slideshow photos (duplicate a "Slide" to add one; dots are added automatically), headline and buttons, promo banner (can be deleted, and re-added from + → Patterns → ASF Gymnastics → Promo banner), video (paste a new YouTube link), program tabs, testimonials (add more with the "Testimonial" pattern), Instagram section |
| Coaching Team | Coach cards (duplicate a "Coach" in List View, or + → Patterns → ASF Gymnastics → Coach) |
| Camp | Tabs (Summer, Winter, March Break, Preparing for Camp, Cancellation Policy), dates, prices (bold = the big red price, e.g. **$410** + HST; italic "TBC" shows the yellow TBC tag), the registration table (each "Camp week" row has its own Full Day / Half Day register buttons), daily schedule table, accordions |
| Recreational Classes | Tabs, 10 "Class card" items (each with its own schedule and Register Now button), accordions, closure dates lists |
| Gallery | Photos and filter buttons. Each photo's category is set in the right sidebar → **Advanced → Additional CSS class(es)** (`cat-facility`, `cat-camps`, `cat-recreational` or `cat-competitive`). Counts update by themselves. The grey "coming soon" tiles can be deleted once real photos are added |
| Find the Right Program | Questions, answer buttons and program cards are all editable text. See "Things to know" below before changing which answers match which programs |
| Benefits, Birthday, Xcel, Competitive Team, Our Facility | Plain editable sections, cards and lists. The Facility photos open in the lightbox automatically |
| Location & Contact | Address, phone, email, hours text, the closures table (add/remove rows from the table toolbar), Directions and Email Us buttons |

**Sidebar and footer:**
- **Links:** Appearance → Menus. There are three menus, which were created automatically when the theme was activated: "Sidebar Navigation", "Programs" and "Quick Links". A footer column's heading is its menu's name.
- **Everything else:** Appearance → Customize → **Sidebar & Footer**. That covers the name next to the logo, business name, address (also used for the Google Maps links), phone, email, open hours, footer description, Instagram link, the two footer logos, and the sidebar Register button text and link.
- **Main logo:** Customize → Site Identity → Logo.

## Things that are not fully editable (and why)

- **Google Map (Location & Contact):** the map itself is embedded code, so changing the map pin means editing that block's HTML. The address text next to it is normal editable text.
- **Find the Right Program logic:**
  - Each answer button's link (e.g. `#age-toddler`) and each program card's CSS classes (e.g. `age-young exp-first`) are what make the finder work. The client can change all the wording freely, but should leave those links and classes alone, or ask you to change them.
  - The "N programs match" wording lives in the page script.
  - The coloured status labels only come in three styles: open, assessment and invite.
- **Gallery captions:** the category names shown in the lightbox caption come from the page script.
- **Icons:** the small icons (tab icons, arrows, check marks, contact icons) are drawn by the theme's CSS, so they can't be swapped in the editor. They're decorative.

## Instagram feed (home page)

The home page has a spot for a live Instagram feed. Until a feed plugin is installed, it shows the grey placeholder grid from the design. The "Instagram feed plugin connects here" note under it is only visible to logged-in editors.

To turn on the live feed:
1. Plugins → Add New → search **"Smash Balloon Instagram Feed"** (free) → Install → Activate.
2. Instagram Feed → Settings → connect the @asfgymnastics account.
3. That's it: the home page already contains the `[instagram-feed]` shortcode, so the feed replaces the grey grid automatically.

## Launch day (done by you, not by me)

1. **Make the theme small enough to upload.** The theme is still about 228 MB because of the photos in `asf-theme/assets/photos` (that's being handled separately). Compress them before zipping.
2. Upload the zip: Appearance → Themes → Add New → Upload. Use **Live Preview** to check it before activating.
3. **Activate the theme.** This creates the three menus automatically.
4. Settings → Reading → "A static page", Homepage: your Home page.
5. **Replace each existing page's old content with the new layout.** For each page (slugs must match: `our-facility`, `location-contact`, `benefits`, `coaching-team`, `which-program`, `camp`, `recreational-classes`, `xcel`, `competitive-team`, `birthday`, `gallery`, plus the Home page):
   1. Open it in the editor and delete the old content.
   2. Click **+ → Patterns → ASF Gymnastics**, insert "<Page> page", and **Update**.

   (Or leave a page empty: it will show the default layout, but the client can only edit it once the pattern is inserted.)
6. Check Appearance → Customize → Sidebar & Footer and update anything that's changed (e.g. hours).
7. Optional: install the Instagram plugin (above).

## What was tested (local WordPress 7.1.3 only)

- **Blocks:** all 12 pages open in the editor with 0 "invalid content" warnings (about 1,540 blocks in total), and each page's own styles load in the editor so it looks like the real page.
- **Side-by-side comparison with the HTML previews:**
  - **Method:** an automated check measured the position, size, font, colour and display of every styled element, plus all words, images and links, at desktop (1400px) and phone (375px) widths.
  - **Result:** 11 of 12 pages match within 3px at both sizes, with identical fonts, colours, text, images and links. The nav and footer match exactly.
  - **Camp:** within 8px on desktop and 15px on phones. The registration table is now a duplicable grid instead of an HTML table, so its column widths are calculated slightly differently.
- **Interactive features, checked against the original behaviour:**
  - Home: slideshow, dots and pause; program tabs.
  - Camp: tabs and deep links like `/camp/#panel-winter`, plus phone accordions.
  - Recreational Classes: tabs, deep links and accordions.
  - Gallery: every filter (same counts as the original) and the lightbox.
  - Program finder: filtering and the match count.
  - Benefits: Read More.
  - Our Facility: the lightbox and its counter.
  - Nav: dropdowns, current-page highlight and the mobile menu.
- **Edit round trip:** changing a headline, swapping a slideshow photo and changing a button's link and text all saved and showed on the site.
- **Not tested:**
  - Safari and Firefox (all testing was in Chromium).
  - The real YouTube embed (the local test server can't reach YouTube's embed service, so a local-only helper stood in for it).
  - The Instagram plugin itself.
  - Uploading to the real site.

## Fixes made along the way

- The logo pointed to a folder that didn't exist in the theme (broken in the nav, footer and browser tab).
- The header and footer showed two different email addresses.
- The theme footer had different hours and links from the design; it now matches the HTML preview.
- Each page's CSS used to be merged into one file, so pages overrode each other's styles (e.g. button sizes). Each page now loads only its own CSS, like the preview.
- The program tab cartwheel icon pointed to a missing file.
- The Competitive Team about photo pointed to a file outside the theme. It's now `assets/photos/competitive-team/5-competitive-team.jpg` (8.7 MB, so compress it with the rest).
- Typos fixed in Recreational Classes: "12:55am" → "12:55pm" (GymFun 7+) and "12:40am" → "12:40pm" (Junior GymFun weekend).
- Asset files now carry their modified time as a version, so visitors get updated CSS and JS straight after a theme update.

## Worth checking with the client (copy, not code)

- Recreational Classes: the closure dates heading still says "2025–2026" while the rest of the page says 2026–2027.
- Camp on phones: the pricing cards and daily schedule sit side by side in narrow columns. This was already the case in the original design, and it's kept identical here, but it may be worth a redesign later.

## Local testing tools (in `.claude/`, not part of the theme)

- `playground-blueprint.json` sets up the local WordPress with every page and the theme.
- `compare-harness.js` (side-by-side comparison) and `js-tests.js` (interactive checks) run in the browser against that local site.
