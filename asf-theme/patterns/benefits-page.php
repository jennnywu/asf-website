<?php
/**
 * Title: Benefits page
 * Slug: asf/benefits-page
 * Categories: asf
 * Description: The full Benefits of Gymnastics page: header, intro, four benefit sections with Read More panels, and references.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$photos = get_template_directory_uri() . '/assets/photos/benefits/';
$lock   = '"lock":{"move":true,"remove":true}';
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">About Us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Benefits of Gymnastics</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">Why gymnastics is one of the best activities for growing children</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro"},<?php echo $lock; ?>,"className":"intro-band","layout":{"type":"default"}} -->
<div class="wp-block-group intro-band"><!-- wp:paragraph -->
<p>Gymnastics is one of the most <strong>complete physical activities</strong> a child can pursue. Beyond the sport itself, it builds a foundation that carries into every aspect of life - from focus and discipline to confidence and teamwork.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Benefit sections"},<?php echo $lock; ?>,"className":"benefits-list","layout":{"type":"default"}} -->
<div class="wp-block-group benefits-list"><?php

// 1: Physical development
echo asf_benefits_block(
    false,
    'Physical Development',
    'The Best Advantage You Can Give Your Child',
    asf_benefits_p( 'What do vault, parallel bars, the balance beam, and floor exercises have to teach a child about potential and kinetic energy, centripetal force, and geometry?' )
    . asf_benefits_p( 'Recreational gymnastics develops a broad range of skills that benefit children both inside and outside the gym.' )
    . asf_benefits_bullets( [
        'Creativity and spatial awareness',
        'Strength, power and coordination',
        'Goal setting and perseverance',
        'Work ethic and self-discipline',
    ] ),
    'more-1',
    asf_benefits_h4( 'What each apparatus teaches' )
    . '<!-- wp:group {"metadata":{"name":"Apparatus grid"},"className":"apparatus-grid","layout":{"type":"default"}} -->' . "\n"
    . '<div class="wp-block-group apparatus-grid">'
    . asf_benefits_apparatus( 'Vault', 'Physics, acceleration &amp; mechanics. <em>“You can get past any obstacle.”</em>' )
    . asf_benefits_apparatus( 'Uneven Bars', 'Momentum &amp; potential/kinetic energy. <em>“Go with the flow; don’t be afraid to let go.”</em>' )
    . asf_benefits_apparatus( 'Balance Beam', 'Centre of gravity &amp; focus. <em>“Mind over matter.”</em>' )
    . asf_benefits_apparatus( 'Floor &amp; All-Around', 'Creativity, resilience &amp; goal setting. <em>“Let your personality shine.”</em>' )
    . '</div>' . "\n" . '<!-- /wp:group -->' . "\n\n",
    $photos . '1-benefits.jpg',
    'Gymnastics physical development'
);

// 2: Holistic well-being (photo on the left)
echo asf_benefits_block(
    true,
    'Holistic Well-Being',
    'Physical and Emotional Well-Being at Every Age',
    asf_benefits_p( 'The benefits of recreational gymnastics for youth span both physical and emotional development, and they evolve as children grow.' )
    . asf_benefits_p( '<strong>For younger children,</strong> the sport develops flexibility, strength, grace, and discipline while promoting positive self-esteem in a supportive environment.' )
    . asf_benefits_p( '<strong>For adolescents and youth,</strong> gymnastics supports cross-training - improving body strength, stamina, and the ability to make quick, independent decisions under pressure.' ),
    'more-2',
    asf_benefits_h4( 'How it develops the whole child' )
    . asf_benefits_bullets( [
        'Through sports participation, children develop social and emotional skills, moral values, and a better sense of self through increased confidence and perceived competence.<sup> [1]</sup>',
        'Group classes teach children to communicate, cooperate, and resolve issues with peers in a supervised environment. Children who believe they are physically competent are also perceived as more interpersonally competent by their teachers.<sup> [2]</sup>',
        'High-level gymnasts learn to stay poised under stress and make real-time adjustments mid-performance - qualities found in strong leaders.',
        'Sports involvement influences the total child - physical, social, and emotional competence develop together.<sup> [3]</sup>',
    ] ),
    $photos . '2-benefits.jpg',
    'Gymnastics holistic well-being'
);

// 3: Active fitness
echo asf_benefits_block(
    false,
    'Active Fitness',
    'A Fun Way to Stay Active and Healthy',
    asf_benefits_p( 'Aerobic activity raises your child’s heart rate and keeps it elevated - increasing oxygen delivered to their heart and muscles throughout every session.' )
    . asf_benefits_p( 'Over time, children who stay active through gymnastics show improvements in:' )
    . asf_benefits_bullets( [
        'Mood and emotional regulation',
        'Self-esteem and body confidence',
        'Overall energy levels and focus',
        'Sleep quality and daily well-being',
    ] ),
    'more-3',
    asf_benefits_h4( 'Why gymnastics specifically' )
    . asf_benefits_bullets( [
        'Gymnastics engages the whole brain, stimulating cognitive growth and encouraging rounded thinking from an early age.',
        'Safe weight-bearing movement builds strong, healthy bones - especially beneficial for toddlers and young children.',
        'Committing to a regular training schedule instills discipline, consistency, and follow-through.',
        'There is always a new skill to learn, so children stay engaged and challenged in every single class.',
    ] )
    . asf_benefits_p( 'Health Canada recommends at least 60 minutes of moderate-to-vigorous activity daily for children aged 6–17.', 'benefit-note' ),
    $photos . '3-benefits.jpg',
    'Gymnastics active fitness'
);

// 4: Social growth (photo on the left)
echo asf_benefits_block(
    true,
    'Social Growth',
    'Building Interpersonal Skills Through Shared Experience',
    asf_benefits_p( 'Interactive camp and class experiences are integral to developing a complete child. Interpersonal skills - not just academic ones - determine long-term success.' )
    . asf_benefits_p( 'At ASF, children build these skills every day:' )
    . asf_benefits_bullets( [
        'Active listening and communication',
        'Self-regulation and patience',
        'Empathy and understanding others’ needs',
        'Meaningful, lasting friendships',
    ] ),
    'more-4',
    asf_benefits_h4( 'What camp activities practice' )
    . asf_benefits_bullets( [
        'Teamwork through crafts and collaborative group challenges.',
        'Patience from waiting for turns on equipment in a structured setting.',
        'Leadership by helping set up gymnastics circuits and guiding peers.',
        'Responsibility through managing belongings and regulating behaviour throughout the day.',
        'Cooperation by engaging with a diverse group of children from different backgrounds.',
    ] )
    . asf_benefits_h4( 'Research support', 'benefit-more-sub' )
    . asf_benefits_bullets( [
        'Developing socially appropriate behaviours at a young age prevents challenges that become harder to alter as children age.<sup> [4]</sup>',
        'Working on social skills as early as kindergarten has lasting positive effects on academic performance.<sup> [5,6]</sup>',
        'Camp counsellors help children build social consciousness by teaching feelings management and problem-solving strategies.<sup> [7,8]</sup>',
    ] ),
    $photos . '4-benefits.jpg',
    'Gymnastics social growth'
);
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"References"},<?php echo $lock; ?>,"className":"references-section","layout":{"type":"default"}} -->
<div class="wp-block-group references-section"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">References</h3>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true} -->
<ol class="wp-block-list"><!-- wp:list-item -->
<li>Seefeldt, V. D. (1987). <em>Handbook for Youth Sports Coaches.</em> Reston, VA: National Association for Sport and Physical Education.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Weiss, M. R., &amp; Duncan, S. C. (1992). The relation between physical competence and peer acceptance in the context of children’s sport participation. <em>Journal of Sport and Exercise Psychology,</em> 14, 177-191.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Ewing, M. E., Gano-Overway, L. A., Branta, C. F., &amp; Seefeldt, V. D. (2002). The role of sports in youth development. <em>Paradoxes of Youth and Sport,</em> 14-48.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Renck Jalongo, M. (Ed.). (2014). <em>Teaching Compassion: Humane Education in Early Childhood</em> (Vol. 8). Netherlands: Springer.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>McClelland, M. M., Morrison, F. J., &amp; Holmes, D. L. (2000). Children at risk for early academic problems: the role of learning-related social skills. <em>Early Childhood Research Quarterly,</em> 15(3), 307-29.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>McClelland, M. M., &amp; Morrison, F. J. (2003). The emergence of learning-related social skills in preschool children. <em>Early Childhood Research Quarterly,</em> 18(2), 206-24.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Khusnidakhon, K. (2021). The importance of enhancing social skills of preschoolers. <em>European Science Journal,</em> 2(3), 75-8.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Mathieson, K. (2005). Grown-ups make a difference! In <em>Social Skills in the Early Years: Supporting Social and Behavioural Learning.</em> London: Sage Publications.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --></div>
<!-- /wp:group -->
