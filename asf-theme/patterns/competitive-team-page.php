<?php
/**
 * Title: Competitive Team page
 * Slug: asf/competitive-team-page
 * Categories: asf
 * Description: The full Competitive Team page: header, logo banner, about, competitive programs, Xcel promo and how to join (free assessment).
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$photos = get_template_directory_uri() . '/assets/photos/competitive-team/';
$lock   = '"lock":{"move":true,"remove":true}';
$goal   = 'All ASF competitive athletes are given every opportunity to reach their full potential. These athletes not only reach their goals in their chosen sport, but also acquire the life skills along the way that prepare them to become strong, independent young women.';
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:group {"metadata":{"name":"Page header text"},<?php echo $lock; ?>,"className":"page-hero-inner","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero-inner"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Programs</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Competitive Team</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">Strong and Successful</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Logo banner"},<?php echo $lock; ?>,"className":"comp-logo-banner","layout":{"type":"default"}} -->
<div class="wp-block-group comp-logo-banner"><!-- wp:image {"sizeSlug":"full",<?php echo $lock; ?>,"className":"comp-logo-img"} -->
<figure class="wp-block-image size-full comp-logo-img"><img src="<?php echo esc_url( $photos . '1-competitive-team.png' ); ?>" alt="ASF Competitive Team"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Logo banner text"},<?php echo $lock; ?>,"className":"comp-logo-text","layout":{"type":"default"}} -->
<div class="wp-block-group comp-logo-text"><!-- wp:heading -->
<h2 class="wp-block-heading">ASF Competitive Gymnastics</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our National-level coaching staff works with athletes across every program level — from Pre-Competitive through High Performance — providing consistent, world-class technical instruction from day one.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"About"},<?php echo $lock; ?>,"className":"about-section","layout":{"type":"default"}} -->
<div class="wp-block-group about-section"><!-- wp:group {"metadata":{"name":"About text"},<?php echo $lock; ?>,"className":"about-section-text","layout":{"type":"default"}} -->
<div class="wp-block-group about-section-text"><!-- wp:heading {"className":"section-h2"} -->
<h2 class="wp-block-heading section-h2">About Our Competitive Team</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"about-text"} -->
<p class="about-text">Through our dynamic gymnastics program and the individualization of each athlete, our gymnasts develop life skills such as self-discipline, independence, self-esteem, and the ability to cope with both success and challenge — all in a positive and constructive environment.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"about-text"} -->
<p class="about-text">A team atmosphere is highly encouraged at ASF. Our coaching staff monitors all programs from Pre-Competitive through High Performance, ensuring every athlete receives the same technical foundation throughout the levels. Proper gymnastics development from beginner to elite is at the core of everything we do.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"about-text"} -->
<p class="about-text">All competitive programs are <strong>by test or invitation only</strong>. Prospective athletes are invited to a free assessment to evaluate readiness for the program.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full",<?php echo $lock; ?>,"className":"about-photo"} -->
<figure class="wp-block-image size-full about-photo"><img src="<?php echo esc_url( $photos . '5-competitive-team.jpg' ); ?>" alt="ASF Competitive Team"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Competitive programs"},<?php echo $lock; ?>,"className":"programs-section","layout":{"type":"default"}} -->
<div class="wp-block-group programs-section"><!-- wp:heading {"className":"programs-heading"} -->
<h2 class="wp-block-heading programs-heading">Competitive Programs</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"programs-intro"} -->
<p class="programs-intro">Our competitive stream includes three progressively advanced programs. All are 12-month commitments with consistent training schedules from September through June, with optional summer hours in July and August.</p>
<!-- /wp:paragraph -->

<?php
// Pre-Competitive
echo asf_competitive_team_card(
    'Pre-Competitive Program',
    [ 'Girls Ages 5–7', 'By test or invitation only' ],
    'The Pre-Competitive Program prepares young athletes physically, technically, and mentally for entry into the competitive gymnastics stream. Athletes are introduced to competition in a fun, friendly, and team-oriented environment.',
    [
        asf_competitive_team_icon_row( 'clock', asf_competitive_team_p( 'Trains <strong>4–12 hours per week</strong> depending on selected group' ) ),
        asf_competitive_team_icon_row( 'trophy', asf_competitive_team_p( 'Competes in <strong>Gymnastics Ontario ODP competitions</strong> testing strength, flexibility, endurance, and speed' ) ),
    ],
    'To help young athletes develop strong gymnastics fundamentals — strength, flexibility, and coordination — in a fun and supportive environment that prepares them for future success in the competitive program and the sport as a whole.'
);

// Ontario Competitive Program
echo asf_competitive_team_card(
    'Ontario Competitive Program (Levels 1–9)',
    [ 'Girls Ages 7+', 'By test or invitation only' ],
    'Athletes in the Ontario Competitive Program (OCP) train and compete through Gymnastics Ontario’s official competitive levels. This is a 12-month commitment with consistent training from September through June. Optional summer hours are available in July and August.',
    [
        asf_competitive_team_icon_row( 'clock', asf_competitive_team_p( 'Trains <strong>12–20+ hours per week</strong> based on level — this is a 12-month program' ) ),
        asf_competitive_team_icon_stack( 'trophy',
            asf_competitive_team_p( 'Levels 1–2 compete in <strong>invitational competitions</strong> only' )
            . asf_competitive_team_p( 'Levels 3–9 compete at <strong>Provincial qualifying competitions</strong> with the opportunity to advance to the Ontario Championships, as well as invitational competitions across Canada and the United States', 'program-icon-line' )
            . asf_competitive_team_p( 'Athletes in <strong>Level 7+</strong> have the opportunity to represent <strong>Team Ontario</strong> at Eastern and National Canadian Championships', 'program-icon-line' )
        ),
    ],
    $goal
);

// National / High Performance
$competitions = [ 'Elite Canada', 'Canadian National Championships', 'Pan American Games', 'Commonwealth Games', 'World Cup events', 'Olympic Games' ];
$comp_list    = '<!-- wp:list {"className":"program-comp-list"} -->' . "\n" . '<ul class="wp-block-list program-comp-list">';
$comp_items   = [];
foreach ( $competitions as $c ) {
    $comp_items[] = '<!-- wp:list-item -->' . "\n" . '<li>' . $c . '</li>' . "\n" . '<!-- /wp:list-item -->';
}
$comp_list .= implode( "\n\n", $comp_items ) . '</ul>' . "\n" . '<!-- /wp:list -->' . "\n\n";

echo asf_competitive_team_card(
    'National (Level 10+) / High Performance',
    [ 'Girls Ages 11+', 'By test or invitation only' ],
    'The National Program is for athletes who have developed the skills to compete at a National and International level. This program is demanding while balancing both the physical and mental aspects of elite athletic development.',
    [
        asf_competitive_team_icon_row( 'clock', asf_competitive_team_p( 'Trains <strong>20–30 hours per week</strong> — 12-month program' ) ),
        asf_competitive_team_icon_stack( 'trophy',
            asf_competitive_team_p( 'Competes for the opportunity to represent Ontario and/or Canada nationally and internationally' )
            . asf_competitive_team_p( 'Competitions include:', 'program-icon-line-lg' )
            . $comp_list
            . asf_competitive_team_p( 'ASF is proud to have had athletes represent us at every event listed above.', 'program-proud' )
        ),
        asf_competitive_team_icon_row( 'scholarship', asf_competitive_team_p( '<strong>University Scholarships</strong> — including NCAA D1 scholarships — are available to ASF competitive athletes. Our athletes have attended UCLA, Stanford, University of Arizona, University of Michigan, UC Berkeley, and University of Hawaii.' ) ),
    ],
    $goal
);
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Xcel promo"},<?php echo $lock; ?>,"className":"xcel-promo","layout":{"type":"default"}} -->
<div class="wp-block-group xcel-promo"><!-- wp:group {"metadata":{"name":"Xcel promo text"},<?php echo $lock; ?>,"className":"xcel-promo-text","layout":{"type":"default"}} -->
<div class="wp-block-group xcel-promo-text"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Looking for Xcel or Advanced?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Xcel program is a flexible competitive and advanced recreational stream for athletes ages 6+. See Pre-Xcel, Showcase Xcel, and Competitive Xcel details.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {<?php echo $lock; ?>} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"xcel-promo-btn"} -->
<div class="wp-block-button xcel-promo-btn"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/xcel/' ) ); ?>">View Xcel Programs</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"How to join"},<?php echo $lock; ?>,"className":"join-section","layout":{"type":"default"}} -->
<div class="wp-block-group join-section"><!-- wp:group {"metadata":{"name":"How to join content"},<?php echo $lock; ?>,"className":"join-inner","layout":{"type":"default"}} -->
<div class="wp-block-group join-inner"><!-- wp:heading -->
<h2 class="wp-block-heading">How to Join Our Team</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"join-intro"} -->
<p class="join-intro">All competitive programs are by test or invitation only. We offer <strong>free assessments</strong> for prospective athletes — this is your first step toward joining the ASF competitive family.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Free assessment card"},<?php echo $lock; ?>,"className":"assessment-card","layout":{"type":"default"}} -->
<div class="wp-block-group assessment-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Free Assessment</h3>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"className":"assessment-steps"} -->
<ol class="wp-block-list assessment-steps"><!-- wp:list-item -->
<li>Submit your assessment request using the form below. Include your child’s age, current gymnastics experience, and any programs they’ve previously trained in.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Our coaching staff will review your inquiry and contact you to schedule an assessment session.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Your child attends a free on-floor assessment with our coaches to evaluate their current skills and discuss the best program fit.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>If selected, your coach will walk you through next steps for enrolment, training schedules, and fees.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->

<!-- wp:paragraph {"className":"assessment-note"} -->
<p class="assessment-note">Assessments are held throughout the year, with additional sessions in May and June for the upcoming season. No gymnastics background is required for the Pre-Competitive program.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {<?php echo $lock; ?>} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"btn-red btn-arrow"} -->
<div class="wp-block-button btn-red btn-arrow"><a class="wp-block-button__link wp-element-button" href="https://docs.google.com/forms/d/e/1FAIpQLSeGI9-S27g814u1JuJN66jXMPEFzDr7q_HO4TTykKR-nlzwiQ/viewform?usp=send_form" target="_blank" rel="noreferrer noopener">Request a Free Assessment</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
