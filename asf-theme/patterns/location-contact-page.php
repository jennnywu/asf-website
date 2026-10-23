<?php
/**
 * Title: Location & Contact page
 * Slug: asf/location-contact-page
 * Categories: asf
 * Description: The full Location & Contact page: header, map, contact details and hours, closure and holiday dates table, and email button.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$lock = '"lock":{"move":true,"remove":true}';

// Closure & holiday dates: [ date, occasion, notes ]
$closures = [
    [ 'Aug 30 – Sep 1, 2025', 'Labour Day Weekend', 'Gym Closed' ],
    [ 'Oct 13, 2025', 'Thanksgiving (Monday)', 'Gym Closed' ],
    [ 'Oct 31, 2025', 'Halloween', 'No Classes' ],
    [ 'December 2025', 'Holiday Recital', 'No regular classes — recital only for participating groups. Contact the gym for the confirmed date.' ],
    [ 'Dec 19, 2025 – Jan 4, 2026', 'Winter Break', 'No Classes. Winter Camp available (dates TBC)' ],
    [ 'Dec 25, 2025', 'Christmas Day', 'Gym Closed' ],
    [ 'Jan 1, 2026', 'New Year’s Day', 'Gym Closed' ],
    [ 'Jan 24–25, 2026', 'Hosted Competition', 'Gym Closed' ],
    [ 'Jan 31 – Feb 1, 2026', 'Hosted Competition', 'Gym Closed' ],
    [ 'Feb 16, 2026', 'Family Day', 'Gym Closed' ],
    [ 'Mar 3–8, 2026', 'Hosted Competition', 'Gym Closed' ],
    [ 'Mar 16–22, 2026', 'March Break', 'No Classes. March Break Camp available!' ],
    [ 'Apr 3, 2026', 'Good Friday', 'Gym Closed' ],
    [ 'May 18, 2026', 'Victoria Day', 'Gym Closed' ],
    [ 'Jun 9–10, 2026', 'End of Year Showcase', 'No regular classes' ],
];
$rows = '';
foreach ( $closures as $r ) {
    $rows .= '<tr><td>' . $r[0] . '</td><td>' . $r[1] . '</td><td>' . $r[2] . '</td></tr>';
}
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">About Us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Location &amp; Contact</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">Come visit us in Richmond Hill — we’d love to meet you</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Page content"},<?php echo $lock; ?>,"className":"inner-page","layout":{"type":"default"}} -->
<div class="wp-block-group inner-page"><!-- wp:group {"metadata":{"name":"Map and contact details"},<?php echo $lock; ?>,"className":"location-grid","layout":{"type":"default"}} -->
<div class="wp-block-group location-grid"><!-- wp:group {"metadata":{"name":"Map"},<?php echo $lock; ?>,"className":"map-wrap","layout":{"type":"default"}} -->
<div class="wp-block-group map-wrap"><!-- wp:html {<?php echo $lock; ?>} -->
<iframe src="https://www.google.com/maps?q=40+Vogell+Road+Unit+32+Richmond+Hill+Ontario+L4B+3N6&amp;output=embed" title="Academy of Sport and Fitness location" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Contact details"},<?php echo $lock; ?>,"className":"contact-card","layout":{"type":"default"}} -->
<div class="wp-block-group contact-card"><!-- wp:heading -->
<h2 class="wp-block-heading">Get in Touch</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Address"},<?php echo $lock; ?>,"className":"contact-item icon-pin","layout":{"type":"default"}} -->
<div class="wp-block-group contact-item icon-pin"><!-- wp:paragraph {<?php echo $lock; ?>,"className":"contact-item-body"} -->
<p class="contact-item-body"><strong>Address</strong>40 Vogell Road, Unit #32<br>Richmond Hill, Ontario L4B 3N6</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Phone"},<?php echo $lock; ?>,"className":"contact-item icon-phone","layout":{"type":"default"}} -->
<div class="wp-block-group contact-item icon-phone"><!-- wp:paragraph {<?php echo $lock; ?>,"className":"contact-item-body"} -->
<p class="contact-item-body"><strong>Phone</strong><a href="tel:9057800913">905-780-0913</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Email"},<?php echo $lock; ?>,"className":"contact-item icon-email","layout":{"type":"default"}} -->
<div class="wp-block-group contact-item icon-email"><!-- wp:paragraph {<?php echo $lock; ?>,"className":"contact-item-body"} -->
<p class="contact-item-body"><strong>Email</strong><a href="mailto:academysportfitness@gmail.com">academysportfitness@gmail.com</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Open hours"},<?php echo $lock; ?>,"className":"contact-item icon-clock","layout":{"type":"default"}} -->
<div class="wp-block-group contact-item icon-clock"><!-- wp:paragraph {<?php echo $lock; ?>,"className":"contact-item-body"} -->
<p class="contact-item-body"><strong>Open Hours</strong>Mon: 12–8:30 p.m.<br>Tue: 12–8:30 p.m.<br>Wed: 2:30–8:30 p.m.<br>Thu: 12–8:30 p.m.<br>Fri: 12–8 p.m.<br>Sat: 9:30 a.m.–5 p.m.<br>Sun: 9:30 a.m.–5 p.m.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {<?php echo $lock; ?>} -->
<div class="wp-block-buttons"><!-- wp:button {<?php echo $lock; ?>,"className":"btn-directions"} -->
<div class="wp-block-button btn-directions"><a class="wp-block-button__link wp-element-button" href="https://www.google.com/maps/dir/?api=1&amp;destination=40+Vogell+Road+Unit+32+Richmond+Hill+Ontario" target="_blank" rel="noreferrer noopener">Get Directions</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:separator {<?php echo $lock; ?>,"className":"section-divider"} -->
<hr class="wp-block-separator has-alpha-channel-opacity section-divider"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Closure and holiday dates"},<?php echo $lock; ?>,"className":"closures-section","layout":{"type":"default"}} -->
<div class="wp-block-group closures-section"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Gym Closures</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Closure &amp; Holiday Dates</h2>
<!-- /wp:heading -->

<!-- wp:table {<?php echo $lock; ?>,"className":"closures-table"} -->
<figure class="wp-block-table closures-table"><table class="has-fixed-layout"><thead><tr><th>Date</th><th>Occasion</th><th>Notes</th></tr></thead><tbody><?php echo $rows; ?></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph {"className":"closures-note"} -->
<p class="closures-note">We are open on holiday weekends - classes run regularly on Saturdays and Sundays (closed Monday). Exceptions: Labour Day Weekend and summer weekends.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:separator {<?php echo $lock; ?>,"className":"section-divider"} -->
<hr class="wp-block-separator has-alpha-channel-opacity section-divider"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Send us a message"},<?php echo $lock; ?>,"className":"contact-form-section","layout":{"type":"default"}} -->
<div class="wp-block-group contact-form-section"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Get in Touch</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Send Us a Message</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact-form-intro"} -->
<p class="contact-form-intro">Have a question about our programs, pricing, or anything else? We’d love to hear from you.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {<?php echo $lock; ?>} -->
<div class="wp-block-buttons"><!-- wp:button {<?php echo $lock; ?>,"className":"btn-email"} -->
<div class="wp-block-button btn-email"><a class="wp-block-button__link wp-element-button" href="mailto:academysportfitness@gmail.com">Email Us →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
