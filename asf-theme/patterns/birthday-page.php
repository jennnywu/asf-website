<?php
/**
 * Title: Birthday Parties page
 * Slug: asf/birthday-page
 * Categories: asf
 * Description: The full Birthday Parties page: header, intro, highlights, party packages, good to know and booking call to action.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$lock = '"lock":{"move":true,"remove":true}';
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Programs</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Birthday Parties</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">Celebrate your child’s big day with an action-packed gymnastics party</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro"},<?php echo $lock; ?>,"className":"birthday-intro","layout":{"type":"default"}} -->
<div class="wp-block-group birthday-intro"><!-- wp:paragraph -->
<p>Celebrate your child’s birthday at Academy of Sport and Fitness! Our gym parties give kids an action-packed gymnastics experience, followed by time in a dedicated party room. Available Sundays from September to June — no enrollment in regular classes required.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Highlights"},<?php echo $lock; ?>,"className":"birthday-highlights","layout":{"type":"default"}} -->
<div class="wp-block-group birthday-highlights"><?php
echo asf_birthday_fact( 'clock', '1 – 1.5 Hours in the Gym', 'Instructor-led gymnastics fun' );
echo asf_birthday_fact( 'home', '1 Hour in the Party Room', 'Your group’s private space to celebrate' );
echo asf_birthday_fact( 'calendar', 'Sundays, September – June', 'Subject to coach availability' );
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Packages and booking"},<?php echo $lock; ?>,"className":"birthday-details","layout":{"type":"default"}} -->
<div class="wp-block-group birthday-details"><!-- wp:heading -->
<h2 class="wp-block-heading">Packages</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Party packages"},<?php echo $lock; ?>,"className":"bday-blocks","layout":{"type":"default"}} -->
<div class="wp-block-group bday-blocks"><?php
echo asf_birthday_package( 'gift', 'Basic Package', '$330', [
    'Up to 10 children',
    '1 hour in the gym with a coach',
    '1 hour in the party room',
], '$16 + HST per additional participant' );
echo asf_birthday_package( 'star', 'Extended Package', '$410', [
    'Up to 10 children',
    '1.5 hours in the gym with a coach',
    '1 hour in the party room',
], '$14 + HST per additional participant' );
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Good to know"},<?php echo $lock; ?>,"className":"bday-pricing","layout":{"type":"default"}} -->
<div class="wp-block-group bday-pricing"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Good to Know</h3>
<!-- /wp:heading -->

<?php
echo asf_birthday_info_row( 'When', 'Sundays, September – June' );
echo asf_birthday_info_row( 'Enrollment required?', 'No — open to all families' );
echo asf_birthday_info_row( 'Availability', 'Subject to coach availability' );
?><!-- wp:paragraph {"className":"bday-pricing-note"} -->
<p class="bday-pricing-note">Spots fill up quickly — reach out early to secure your date. We’ll confirm availability and details by email.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Book now"},<?php echo $lock; ?>,"className":"bday-cta","layout":{"type":"default"}} -->
<div class="wp-block-group bday-cta"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Ready to Book?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Email us with your preferred date and package. We’ll confirm availability and take it from there!</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"btn-email"} -->
<div class="wp-block-button btn-email"><a class="wp-block-button__link wp-element-button" href="mailto:academysportfitness@gmail.com">Email Us to Book</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
