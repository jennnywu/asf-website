<?php
/**
 * Title: Which Program page
 * Slug: asf/which-program-page
 * Categories: asf
 * Description: The full Which Program page: header, intro, program finder (questions with answer buttons), program cards, no-match message, help prompt, birthday callout and closing call to action. Finder rules: each answer button links to "#question-value" (e.g. #age-toddler, #exp-first, #goal-fun; "-any" = no preference). Each program card's Advanced → Additional CSS class lists the answers it suits with the same words (e.g. "prog-card status-open age-young age-child exp-first goal-fun"); status-open / status-assessment / status-invite sets its colour. Edit any text freely; keep those links and classes.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$lock = '"lock":{"move":true,"remove":true}';

$cards = [
    [
        'title'   => 'Recreational Classes',
        'status'  => 'open',
        'badge'   => 'Open Enrollment',
        'ages'    => 'Ages 2+',
        'hours'   => '1–2 hrs/week',
        'desc'    => 'Our weekly classes are the perfect starting point for any child. From Parent & Tot for toddlers to advanced recreational levels, every class is skill-focused, fun, and confidence-building. No prior experience needed — enroll anytime throughout the year.',
        'bestfor' => 'First-timers, kids who love gymnastics casually, and families wanting consistent weekly classes without a major time commitment.',
        'url'     => home_url( '/recreational-classes/' ),
        'link'    => 'View Recreational Classes',
        'tokens'  => 'age-toddler age-young age-child age-teen exp-first exp-some exp-regular goal-fun goal-skills',
    ],
    [
        'title'   => 'Seasonal Camps',
        'status'  => 'open',
        'badge'   => 'Open Enrollment',
        'ages'    => 'Ages 5+',
        'hours'   => 'Full days, seasonal',
        'desc'    => 'Week-long day camps over Summer, Winter, and March Break. A high-energy mix of gymnastics, games, and activities led by our coaching staff. A great way to try gymnastics for the first time — or for current gymnasts to keep skills sharp during breaks.',
        'bestfor' => 'Kids looking for a fun, active break experience. No gymnastics background required.',
        'url'     => home_url( '/camp/' ),
        'link'    => 'View Camps',
        'tokens'  => 'age-young age-child age-teen exp-first exp-some exp-regular goal-fun',
    ],
    [
        'title'   => 'Ninja Gymnastics',
        'status'  => 'open',
        'badge'   => 'Open Enrollment',
        'ages'    => 'Ages 4.5–8',
        'hours'   => '1–2 hrs/week',
        'desc'    => 'High-energy classes combining gymnastics fundamentals with obstacle courses, climbing, jumping, and action-packed movement challenges. Ninja Gymnastics builds strength, coordination, and confidence in a fun, non-competitive setting that kids absolutely love.',
        'bestfor' => 'Kids who love action and adventure. No gymnastics background needed — perfect for active kids who want to move, jump, and have fun.',
        'url'     => home_url( '/recreational-classes/' ),
        'link'    => 'View Recreational Classes',
        'tokens'  => 'age-toddler age-young age-child exp-first exp-some goal-fun goal-skills',
    ],
    [
        'title'   => 'Pre-Xcel / Showcase Xcel',
        'status'  => 'assessment',
        'badge'   => 'By Assessment',
        'ages'    => 'Ages 6+',
        'hours'   => '3.5–7 hrs/week',
        'desc'    => 'A bridge between recreational and competitive gymnastics — more structured training, without the pressure of competition. Showcase Xcel athletes develop polished routines and advanced skills in a focused environment. Entry is based on a coach assessment.',
        'bestfor' => 'Kids who’ve completed recreational levels and are ready for more, but aren’t interested in competing.',
        'url'     => home_url( '/xcel/' ),
        'link'    => 'View Xcel / Advanced',
        'tokens'  => 'age-young age-child age-teen exp-some exp-regular goal-skills',
    ],
    [
        'title'   => 'Competitive Xcel',
        'status'  => 'assessment',
        'badge'   => 'By Assessment',
        'ages'    => 'Ages 8+',
        'hours'   => '7–12 hrs/week',
        'desc'    => 'Train and compete through defined Xcel levels — Bronze, Silver, Gold, and Platinum. Athletes participate in regional meets with structured judging, working toward higher levels over time. A rewarding competition pathway that doesn’t require Olympic-level hours.',
        'bestfor' => 'Gymnasts ready to take their training seriously and experience competitive meets, without the full commitment of the provincial stream.',
        'url'     => home_url( '/xcel/' ),
        'link'    => 'View Xcel / Advanced',
        'tokens'  => 'age-child age-teen exp-regular goal-skills goal-compete',
    ],
    [
        'title'   => 'Pre-Competitive',
        'status'  => 'assessment',
        'badge'   => 'By Assessment',
        'ages'    => 'Ages 5–7',
        'hours'   => '4–12 hrs/week',
        'desc'    => 'The entry point into competitive gymnastics for young girls showing talent and drive. Pre-Competitive builds the fundamental skills and physical conditioning needed for the Ontario Competitive Program, setting athletes up for long-term success in the sport.',
        'bestfor' => 'Young girls with natural ability and a love for gymnastics who are ready to commit to structured training and the competitive pathway.',
        'url'     => home_url( '/competitive-team/' ),
        'link'    => 'View Competitive Team',
        'tokens'  => 'age-young age-child exp-some exp-regular goal-compete',
    ],
    [
        'title'   => 'Ontario Competitive Program',
        'status'  => 'assessment',
        'badge'   => 'By Assessment',
        'ages'    => 'Ages 7+',
        'hours'   => '12–20+ hrs/week',
        'desc'    => 'The main competitive stream at ASF. Athletes progress through OCP Levels 1–9 and compete at provincial championships. This program develops well-rounded gymnasts with strong technique and the discipline to compete at a high level year after year.',
        'bestfor' => 'Committed athletes who want to compete provincially and have the time and dedication to train seriously.',
        'url'     => home_url( '/competitive-team/' ),
        'link'    => 'View Competitive Team',
        'tokens'  => 'age-child age-teen exp-regular goal-compete',
    ],
    [
        'title'   => 'National / High Performance',
        'status'  => 'invite',
        'badge'   => 'By Invitation',
        'ages'    => 'Elite Level',
        'hours'   => '20–30 hrs/week',
        'desc'    => 'Elite-level training for athletes competing nationally and pursuing the Olympic pathway. Athletes in this stream represent ASF at national championships and train under a high-performance coaching model. Selection is based on current competitive standing and coach recommendation.',
        'bestfor' => 'Elite gymnasts already competing at high levels who are pursuing national-level goals.',
        'url'     => home_url( '/competitive-team/' ),
        'link'    => 'View Competitive Team',
        'tokens'  => 'age-child age-teen exp-regular goal-compete',
    ],
];
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Programs</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Which Program is Best for My Child?</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">Answer a few quick questions — we’ll help you find the perfect fit</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro"},<?php echo $lock; ?>,"className":"finder-intro","layout":{"type":"default"}} -->
<div class="wp-block-group finder-intro"><!-- wp:paragraph -->
<p>We offer programs for every age, skill level, and goal — from toddler tumbling to national competition. Use the filters below to narrow down your options, or scroll to browse everything we offer.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Program finder questions"},<?php echo $lock; ?>,"className":"finder-filters","layout":{"type":"default"}} -->
<div class="wp-block-group finder-filters"><?php
echo asf_which_program_question( 'Question: age', 'My child is...', 'age', [
    [ 'Any age', 'any' ], [ '2–4 years', 'toddler' ], [ '5–7 years', 'young' ], [ '8–12 years', 'child' ], [ '13+ years', 'teen' ],
] );
echo asf_which_program_question( 'Question: background', 'Gymnastics background...', 'exp', [
    [ 'Any level', 'any' ], [ 'Brand new', 'first' ], [ 'Some classes', 'some' ], [ 'Training regularly', 'regular' ],
] );
echo asf_which_program_question( 'Question: goal', 'What matters most...', 'goal', [
    [ 'Any goal', 'any' ], [ 'Fun & fitness', 'fun' ], [ 'Skill development', 'skills' ], [ 'Competition', 'compete' ],
] );
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Results heading"},<?php echo $lock; ?>,"className":"finder-results-header","layout":{"type":"default"}} -->
<div class="wp-block-group finder-results-header"><!-- wp:heading -->
<h2 class="wp-block-heading">Recommended Programs</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Program cards"},<?php echo $lock; ?>,"className":"prog-grid","layout":{"type":"default"}} -->
<div class="wp-block-group prog-grid"><?php
foreach ( $cards as $card ) {
    echo asf_which_program_card( $card );
}
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"No match message (shows only when no card matches)"},<?php echo $lock; ?>,"className":"no-results","layout":{"type":"default"}} -->
<div class="wp-block-group no-results"><!-- wp:group {<?php echo $lock; ?>,"className":"no-results-inner","layout":{"type":"default"}} -->
<div class="wp-block-group no-results-inner"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">No exact match — let’s chat</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Every child is different, and sometimes the best fit isn’t obvious on paper. Reach out to us and we’ll help you figure it out — we’re happy to answer questions or arrange a free assessment.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"btn-red"} -->
<div class="wp-block-button btn-red"><a class="wp-block-button__link wp-element-button" href="mailto:academysportfitness@gmail.com">Contact Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Not sure prompt"},<?php echo $lock; ?>,"className":"finder-stuck","layout":{"type":"default"}} -->
<div class="wp-block-group finder-stuck"><!-- wp:paragraph -->
<p>Not sure which class is right for your child? <strong>Contact us</strong> – we’re happy to help you find the best fit.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"btn-red"} -->
<div class="wp-block-button btn-red"><a class="wp-block-button__link wp-element-button" href="mailto:academysportfitness@gmail.com">Email Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Birthday callout"},<?php echo $lock; ?>,"className":"birthday-callout","layout":{"type":"default"}} -->
<div class="wp-block-group birthday-callout"><!-- wp:group {<?php echo $lock; ?>,"className":"birthday-callout-text","layout":{"type":"default"}} -->
<div class="wp-block-group birthday-callout-text"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Planning a birthday party?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Celebrate your child’s big day with an action-packed gymnastics party at ASF. Available Sundays from September to June — open to all families, no enrollment required.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"btn-red"} -->
<div class="wp-block-button btn-red"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/birthday/' ) ); ?>">See Birthday Packages</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Closing call to action"},<?php echo $lock; ?>,"className":"finder-cta-section","layout":{"type":"default"}} -->
<div class="wp-block-group finder-cta-section"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Still Deciding?</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">We’re happy to help you choose</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Not sure which program fits best? Our coaches can answer your questions, walk you through each option, or arrange a free assessment to see where your child would thrive.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"finder-cta-btns"} -->
<div class="wp-block-buttons finder-cta-btns"><!-- wp:button {"className":"btn-white"} -->
<div class="wp-block-button btn-white"><a class="wp-block-button__link wp-element-button" href="mailto:academysportfitness@gmail.com">Email Us</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"btn-outline"} -->
<div class="wp-block-button btn-outline"><a class="wp-block-button__link wp-element-button" href="tel:9057800913">905-780-0913</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
