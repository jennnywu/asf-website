<?php
/**
 * Title: Xcel / Advanced page
 * Slug: asf/xcel-page
 * Categories: asf
 * Description: The full Xcel / Advanced page: header, overview, who it is for, program cards, pathway diagram, competitive team promo and how to join.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$lock = '"lock":{"move":true,"remove":true}';
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:group {<?php echo $lock; ?>,"className":"page-hero-inner","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero-inner"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Programs</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Xcel / Advanced</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">A bridge between recreational and competitive gymnastics</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Program overview"},<?php echo $lock; ?>,"className":"intro-banner","layout":{"type":"default"}} -->
<div class="wp-block-group intro-banner"><!-- wp:group {<?php echo $lock; ?>,"className":"intro-banner-inner","layout":{"type":"default"}} -->
<div class="wp-block-group intro-banner-inner"><!-- wp:group {<?php echo $lock; ?>,"className":"intro-text","layout":{"type":"default"}} -->
<div class="wp-block-group intro-text"><!-- wp:heading -->
<h2 class="wp-block-heading">Xcel Program Overview</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Xcel program is a <strong>test or invitation only</strong> advanced pathway designed for dedicated gymnasts who are ready to push beyond recreational training. Athletes gain structured progressions, richer skill development, and — at the competitive level — the opportunity to compete at invitationals across Canada and the United States.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Who is Xcel for"},<?php echo $lock; ?>,"className":"about-section","layout":{"type":"default"}} -->
<div class="wp-block-group about-section"><!-- wp:heading {"className":"section-h2"} -->
<h2 class="wp-block-heading section-h2">Who Is Xcel For?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"about-text"} -->
<p class="about-text">Xcel sits between our recreational stream and our full Ontario Competitive Program. It is ideal for athletes who demonstrate strong potential and commitment but may not yet be ready for — or interested in — the demands of the full OCP schedule. The program builds skill, strength, and a competitive mindset in a structured yet flexible environment.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"about-text"} -->
<p class="about-text">Younger athletes often begin in Pre-Xcel before progressing to Competitive Xcel or moving into the Ontario Competitive Program. All Xcel programs are <strong>by test or invitation only</strong> following a free assessment with our coaching staff.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Programs"},<?php echo $lock; ?>,"className":"programs-section","layout":{"type":"default"}} -->
<div class="wp-block-group programs-section"><!-- wp:heading {"className":"programs-heading"} -->
<h2 class="wp-block-heading programs-heading">Xcel / Advanced Programs</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"programs-intro"} -->
<p class="programs-intro">The Xcel/Advanced stream has two tracks. Pre-Xcel / Showcase Xcel is the entry point for athletes ages 6+; Competitive Xcel is for those ready to train and compete at a higher level. All tracks are by test or invitation only.</p>
<!-- /wp:paragraph -->

<?php
echo asf_xcel_program_card(
    'Pre-Xcel / Showcase Xcel',
    [ 'Ages 6+', 'By test or invitation only' ],
    'Pre-Xcel and Showcase Xcel introduce athletes to the advanced training environment and structured skill progressions of the Xcel program. Athletes develop the strength, technique, and confidence needed to perform in local showcase events and prepare for the Competitive Xcel or Ontario Competitive Program streams.',
    [
        [ 'clock', 'Trains <strong>3.5–7 hours per week</strong>' ],
        [ 'trophy', 'Participates in <strong>local showcase events</strong>' ],
        [ 'trend', 'Natural progression to <strong>Competitive Xcel</strong> or the <strong>Ontario Competitive Program (OCP)</strong>' ],
    ],
    'To provide a structured and encouraging stepping stone for young athletes with advanced potential — developing foundational skills, physical conditioning, and a love for the sport in preparation for higher-level programs.'
);
echo asf_xcel_program_card(
    'Competitive Xcel',
    [ 'Ages 8+', 'By test or invitation only' ],
    'Competitive Xcel is a full competitive stream for athletes ready to train at high intensity and represent ASF at invitational competitions across Canada and the United States. Athletes progress through four levels — Bronze, Silver, Gold, and Platinum — each with increasingly demanding skill requirements.',
    [
        [ 'clock', 'Trains <strong>7–12 hours per week</strong>' ],
        [ 'trophy', 'Competes at <strong>invitational competitions</strong> across Canada and the United States' ],
    ],
    'To challenge committed athletes within a structured competitive framework that develops strength, technical mastery, mental resilience, and a strong team identity — all while building a passion for the sport that lasts a lifetime.'
);
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Pathway diagram"},<?php echo $lock; ?>,"className":"pathway-section","layout":{"type":"default"}} -->
<div class="wp-block-group pathway-section"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Xcel Program Pathway</h3>
<!-- /wp:heading -->

<!-- wp:group {<?php echo $lock; ?>,"className":"pathway-flow","layout":{"type":"default"}} -->
<div class="wp-block-group pathway-flow"><?php
echo asf_xcel_pathway_step( 'Recreational Classes', 'Any age' );
echo asf_xcel_pathway_arrow();
echo asf_xcel_pathway_step( 'Pre-Xcel /<br>Showcase Xcel', 'Ages 6+' );
echo asf_xcel_pathway_arrow();
?><!-- wp:group {"metadata":{"name":"Progresses to"},<?php echo $lock; ?>,"className":"pathway-fork","layout":{"type":"default"}} -->
<div class="wp-block-group pathway-fork"><!-- wp:paragraph {"className":"pathway-fork-label"} -->
<p class="pathway-fork-label">Progresses to:</p>
<!-- /wp:paragraph -->

<?php
echo asf_xcel_pathway_step( 'Competitive Xcel', 'Bronze → Platinum', true );
echo asf_xcel_pathway_step( 'Ontario Competitive<br>Program (OCP)', 'Levels 1–9', true );
?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Competitive Team promo"},<?php echo $lock; ?>,"className":"comp-promo","layout":{"type":"default"}} -->
<div class="wp-block-group comp-promo"><!-- wp:group {<?php echo $lock; ?>,"className":"comp-promo-text","layout":{"type":"default"}} -->
<div class="wp-block-group comp-promo-text"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Ready for the Full Competitive Stream?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Learn about the Ontario Competitive Program (OCP) and National / High Performance programs — including university scholarship pathways.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {<?php echo $lock; ?>} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"comp-promo-btn"} -->
<div class="wp-block-button comp-promo-btn"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>">View Competitive Team</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"How to join"},<?php echo $lock; ?>,"className":"join-section","layout":{"type":"default"}} -->
<div class="wp-block-group join-section"><!-- wp:group {<?php echo $lock; ?>,"className":"join-inner","layout":{"type":"default"}} -->
<div class="wp-block-group join-inner"><!-- wp:heading -->
<h2 class="wp-block-heading">How to Join</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"join-intro"} -->
<p class="join-intro">All Xcel programs are <strong>by test or invitation only</strong>. We offer a <strong>free assessment</strong> for prospective athletes so our coaches can determine the best program fit.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Free assessment steps"},<?php echo $lock; ?>,"className":"assessment-card","layout":{"type":"default"}} -->
<div class="wp-block-group assessment-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Free Assessment</h3>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"assessment-steps"} -->
<ol class="wp-block-list assessment-steps"><!-- wp:list-item -->
<li>Submit your assessment request using the link below. Include your child’s age, current gymnastics experience, and any programs they have previously trained in.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Our coaching staff will review your inquiry and reach out to schedule an assessment session at a time that works for you.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Your child attends an on-floor assessment where our coaches evaluate current skill level, strength, and overall gymnastics readiness.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>If selected, your coach will guide you through next steps for enrolment, training schedules, and program fees.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->

<!-- wp:paragraph {"className":"assessment-note"} -->
<p class="assessment-note">Assessments are held throughout the year. No advanced gymnastics background is required for Pre-Xcel — just enthusiasm and commitment.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"btn-red"} -->
<div class="wp-block-button btn-red"><a class="wp-block-button__link wp-element-button" href="https://docs.google.com/forms/d/e/1FAIpQLSeGI9-S27g814u1JuJN66jXMPEFzDr7q_HO4TTykKR-nlzwiQ/viewform?usp=send_form" target="_blank" rel="noreferrer noopener">Request a Free Assessment</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
