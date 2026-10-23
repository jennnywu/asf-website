<?php
/**
 * Title: Recreational Classes page
 * Slug: asf/recreational-classes-page
 * Categories: asf
 * Description: The full Recreational Classes page: header, about bar, tabs (2026–2027 classes, summer classes, preparing for class, cancellation policy) and the "not sure which class" box.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$reg = 'https://app.jackrabbitclass.com/regv2.asp?id=540626';

// Shorthands for the builders in inc/recreational-classes.php
$p       = 'asf_recreational_classes_p';
$h       = 'asf_recreational_classes_heading';
$group   = 'asf_recreational_classes_group';
$ul      = 'asf_recreational_classes_list';
$table   = 'asf_recreational_classes_table';
$buttons = 'asf_recreational_classes_buttons';
$card    = 'asf_recreational_classes_card';
$acc     = 'asf_recreational_classes_accordion';
$date    = 'asf_recreational_classes_date';
$join    = 'asf_recreational_classes_join';
$top     = [ 'locked' => true ];

$blocks = [];

/* ── Page header ── */
$blocks[] = $group( 'page-hero', $join( [
    $p( 'Programs', 'section-eyebrow' ),
    $h( 1, 'Recreational Classes' ),
    $p( 'Structured gymnastics classes for every age and skill level', 'page-hero-tagline' ),
] ), [ 'name' => 'Page header' ] + $top );

/* ── About bar ── */
$blocks[] = $group( 'about-bar', $p( 'Our recreational season runs from September to June. Summer Afternoon Classes run July–August. Join any time — fees are pro-rated.' ), [ 'name' => 'About bar' ] + $top );

/* ── Tabs (each button links to its panel's anchor; assets/js/pages/recreational-classes.js switches panels) ── */
$blocks[] = $group( 'tabs-wrap', $buttons( 'tab-bar', [
    [ '2026–2027 Classes', '#panel-regular', 'tab-btn tab-icon-regular active', false, true ],
    [ 'Summer Classes', '#panel-summer', 'tab-btn tab-icon-summer', false, true ],
    [ 'Preparing for Class', '#panel-preparing', 'tab-btn tab-icon-preparing', false, true ],
    [ 'Cancellation Policy', '#panel-cancellation', 'tab-btn tab-icon-cancellation', false, true ],
], true ), [ 'name' => 'Tabs' ] + $top );

/* ══════════ PANEL 1: 2026–2027 CLASSES ══════════ */
$regular_cards = [
    [
        'name'     => 'Tot &amp; Adult',
        'tags'     => [ 'Ages 18mo–2.5yr', '45 min', 'Caregiver joins' ],
        'desc'     => 'A gentle, play-based introduction to gymnastics for toddlers with a participating parent or caregiver. Builds coordination, body awareness, and confidence.',
        'sessions' => [ [ 'Per mini-session — 9 classes', '$240' ], [ '4 mini-sessions offered per year', null ] ],
        'schedule' => [ [ 'Saturday', '9:30am–10:15am<br>10:30am–11:15am' ], [ 'Sunday', '10:00am–10:45am' ] ],
    ],
    [
        'name'     => 'Kinder GymFun',
        'tags'     => [ 'Ages 3–4', '55 min' ],
        'desc'     => 'Introduction to gymnastics fundamentals through play-based activities on beam, bars, floor, and vault in a structured but fun environment.',
        'sessions' => [ [ 'Session 1 — 17 classes', '$578' ], [ 'Session 2 — 18 classes', '$612' ] ],
        'schedule' => [
            [ 'Monday', '4:00pm–4:55pm' ],
            [ 'Tuesday', '5:00pm–5:55pm' ],
            [ 'Wednesday', '6:00pm–6:55pm' ],
            [ 'Thursday', '4:00pm–4:55pm<br>5:00pm–5:55pm<br>6:00pm–6:55pm' ],
            [ 'Saturday', '9:30am–10:25am<br>10:30am–11:25am' ],
            [ 'Sunday', '10:00am–10:55am<br>11:00am–11:55am' ],
        ],
    ],
    [
        'name'     => 'Beginner GymFun',
        'tags'     => [ 'Ages 4–5', '55 min' ],
        'desc'     => 'Structured skill development on all four gymnastics apparatus. Builds on Kinder GymFun foundations with greater technical focus and repetition.',
        'sessions' => [ [ 'Session 1 — 17 classes', '$578' ], [ 'Session 2 — 18 classes', '$612' ] ],
        'schedule' => [
            [ 'Monday', '5:00pm–5:55pm' ],
            [ 'Tuesday', '6:00pm–6:55pm' ],
            [ 'Wednesday', '5:00pm–5:55pm' ],
            [ 'Thursday', '5:00pm–5:55pm' ],
            [ 'Saturday', '10:00am–10:55am<br>11:00am–11:55am<br>1:00pm–1:55pm' ],
            [ 'Sunday', '11:00am–11:55am' ],
        ],
    ],
    [
        'name'     => 'Junior GymFun',
        'tags'     => [ 'Ages 5–6.5', '85 min' ],
        'desc'     => 'Skill progression on all four events — vault, bars, beam, and floor. Extended class time allows for more repetition and technical development.',
        'sessions' => [ [ 'Session 1 — 17 classes', '$833' ], [ 'Session 2 — 18 classes', '$882' ] ],
        'schedule' => [
            [ 'Monday', '6:15pm–7:40pm' ],
            [ 'Tuesday', '4:45pm–6:10pm' ],
            [ 'Wednesday', '4:45pm–6:10pm' ],
            [ 'Thursday', '4:45pm–6:10pm' ],
            [ 'Saturday', '9:30am–10:55am<br>11:15am–12:40pm' ],
            [ 'Sunday', '9:30am–10:55am<br>11:15am–12:40pm' ],
        ],
    ],
    [
        'name'     => 'GymFun 7+',
        'tags'     => [ 'Ages 7+', '115 min' ],
        'desc'     => 'Intermediate gymnastics training on all four events. Emphasis on skill refinement, strength, flexibility, and overall performance quality.',
        'sessions' => [ [ 'Session 1 — 17 classes', '$1,054' ], [ 'Session 2 — 18 classes', '$1,116' ] ],
        'schedule' => [
            [ 'Monday', '6:00pm–7:55pm' ],
            [ 'Tuesday', '6:15pm–8:10pm' ],
            [ 'Thursday', '6:15pm–8:10pm' ],
            [ 'Saturday', '11:00am–12:55pm<br>1:00pm–2:55pm' ],
            [ 'Sunday', '9:30am–11:25am<br>11:30am–1:25pm' ],
        ],
    ],
    [
        'name'     => 'Teen GymFun 12+',
        'tags'     => [ 'Ages 12+', '115 min' ],
        'desc'     => 'Gymnastics in a teen-focused environment, welcoming beginners through intermediates. All four events at a pace and atmosphere suited to older gymnasts.',
        'sessions' => [ [ 'Session 1 — 17 classes', '$1,054' ], [ 'Session 2 — 18 classes', '$1,116' ] ],
        'schedule' => [
            [ 'Thursday', '6:15pm–8:10pm' ],
            [ 'Saturday', '1:00pm–2:55pm<br>3:00pm–4:55pm' ],
            [ 'Sunday', '12:00pm–1:55pm' ],
        ],
    ],
    [
        'name'     => 'Ninja Gymnastics',
        'tags'     => [ 'Ages 4.5-8', '55 min' ],
        'desc'     => 'Ninja-inspired obstacle and skills training combining gymnastics, parkour-style movement, and strength challenges. High-energy and open to all levels.',
        'sessions' => [ [ 'Session 1 — 17 classes', '$612' ], [ 'Session 2 — 18 classes', '$648' ] ],
        'schedule' => [ [ 'Saturday', '10:00am–10:55am (Ages 4.5–7)<br>11:00am–11:55am (Ages 6.5–8)' ] ],
    ],
];
$regular_list = [];
foreach ( $regular_cards as $c ) {
    $regular_list[] = $card( $c + [ 'url' => $reg ] );
}

$regular = $join( [
    $h( 2, '2026–2027 Classes', 'section-h2' ),
    $p( 'Registration opens each year for Session 1 (September–January) and Session 2 (February–June). An Annual Recreational Registration Fee of $64 + HST per student is required — valid July 1, 2026 to June 30, 2027.', 'section-intro-text' ),
    $group( 'age-guide-box', $join( [
        $h( 3, 'Which class is right for my child?' ),
        $table( 'age-guide-table', [], [
            [ '18 months - 2.5 years', 'Tot &amp; Adult <em>(parent or caregiver joins)</em>' ],
            [ 'Age 3', 'Kinder GymFun' ],
            [ 'Age 4', 'Kinder GymFun or Beginner GymFun' ],
            [ 'Ages 5-6.5', 'Junior GymFun' ],
            [ 'Ages 7-11', 'GymFun 7+' ],
            [ 'Ages 12+', 'Teen GymFun 12+' ],
            [ 'Ages 4.5-8 (any level)', 'Ninja Gymnastics' ],
        ] ),
    ] ), [ 'name' => 'Age guide' ] ),
    $h( 2, 'Programs', 'section-h2' ),
    $p( 'All programs are co-ed unless otherwise noted. Prices listed are per session and do not include HST.', 'section-intro-text' ),
    $group( 'class-grid', $join( $regular_list ), [ 'name' => 'Classes', 'locked' => true ] ),
    $group( 'full-schedule', $join( [
        $h( 3, 'Class Schedule — Quick Reference', 'full-schedule-title' ),
        $table( 'full-schedule-scroll full-schedule-table', [ 'Class', 'Ages', 'Length', 'Available Times' ], [
            [ 'Tot &amp; Adult', '18mo–2.5yr', '45 min', 'Sat 9:30am–10:15am · 10:30am–11:15am<br>Sun 10:00am–10:45am' ],
            [ 'Kinder GymFun', 'Ages 3–4', '55 min', 'Mon 4:00pm–4:55pm<br>Tue 5:00pm–5:55pm<br>Wed 6:00pm–6:55pm<br>Thu 4:00pm–4:55pm · 5:00pm–5:55pm · 6:00pm–6:55pm<br>Sat 9:30am–10:25am · 10:30am–11:25am<br>Sun 10:00am–10:55am · 11:00am–11:55am' ],
            [ 'Beginner GymFun', 'Ages 4–5', '55 min', 'Mon 5:00pm–5:55pm<br>Tue 6:00pm–6:55pm<br>Wed 5:00pm–5:55pm<br>Thu 5:00pm–5:55pm<br>Sat 10:00am–10:55am · 11:00am–11:55am · 1:00pm–1:55pm<br>Sun 11:00am–11:55am' ],
            [ 'Junior GymFun', 'Ages 5–6.5', '85 min', 'Mon 6:15pm–7:40pm<br>Tue 4:45pm–6:10pm<br>Wed 4:45pm–6:10pm<br>Thu 4:45pm–6:10pm<br>Sat 9:30am–10:55am · 11:15am–12:40pm<br>Sun 9:30am–10:55am · 11:15am–12:40pm' ],
            [ 'GymFun 7+', 'Ages 7+', '115 min', 'Mon 6:00pm–7:55pm<br>Tue 6:15pm–8:10pm<br>Thu 6:15pm–8:10pm<br>Sat 11:00am–12:55pm · 1:00pm–2:55pm<br>Sun 9:30am–11:25am · 11:30am–1:25pm' ],
            [ 'Teen GymFun 12+', 'Ages 12+', '115 min', 'Thu 6:15pm–8:10pm<br>Sat 1:00pm–2:55pm · 3:00pm–4:55pm<br>Sun 12:00pm–1:55pm' ],
            [ 'Ninja Gymnastics', 'Ages 4.5–8', '55 min', 'Sat 10:00am–10:55am (Ages 4.5–7) · 11:00am–11:55am (Ages 6.5–8)' ],
        ] ),
    ] ), [ 'name' => 'Quick reference schedule' ] ),
    '<!-- wp:separator {"className":"section-divider"} -->' . "\n" . '<hr class="wp-block-separator has-alpha-channel-opacity section-divider"/>' . "\n" . '<!-- /wp:separator -->',
    $group( 'accordion-group', $join( [
        $acc( 'How to Register', $ul( [
            '<strong>Existing families:</strong> Log in to the Family Portal and select a class to enrol.',
            '<strong>New families:</strong> Click Register Now on any class card and create your account during checkout.',
            'Payment is processed by our office staff — you will not be charged immediately at checkout.',
            'Spots are held once your registration is submitted.',
            '<strong>Trial classes</strong> are available for select programs in limited spots. Trials are not offered in the first few weeks of a session. Contact the gym to check current availability.',
        ] ) ),
        $acc( 'Pricing &amp; Discounts', $ul( [
            'The <strong>Annual Recreational Registration Fee</strong> of $64 + HST per student is required before enrolment and is valid July 1, 2026 – June 30, 2027.',
            'Fees are <strong>pro-rated</strong> if you join mid-session — you pay only for the remaining classes.',
            '<strong>5% sibling discount</strong> for a 2nd or 3rd child enrolled from the same family.',
            '<strong>25% discount</strong> on a second class for the same child within the same session.',
        ] ) ),
        $acc( 'Gym Closure Dates 2025–2026', $join( [
            $p( 'The gym is closed and no classes run on the following dates. These days are not counted in session totals.' ),
            $group( 'dates-group', $join( [
                $p( 'Fall 2025', 'dates-term' ),
                $ul( [
                    $date( 'September 1, 2025', 'Labour Day — gym closed' ),
                    $date( 'October 13, 2025', 'Thanksgiving — no classes' ),
                    $date( 'October 31, 2025', 'Halloween — no classes' ),
                    $date( 'December 19, 2025 – January 4, 2026', 'Winter Break — gym closed' ),
                ], 'dates-list' ),
                $p( 'Winter / Spring 2026', 'dates-term' ),
                $ul( [
                    $date( 'January 13–21, 2026', 'Last Session 1 classes (date varies by day of week)' ),
                    $date( 'February 2, 2026', 'Session 2 begins' ),
                    $date( 'February 16, 2026', 'Family Day — no classes' ),
                    $date( 'March 3–8, 2026', 'Competition week — no classes' ),
                    $date( 'March 16–22, 2026', 'March Break — no classes' ),
                    $date( 'April 3, 2026', 'Good Friday — gym closed' ),
                    $date( 'May 18, 2026', 'Victoria Day — no classes' ),
                    $date( 'June 9–10, 2026', 'End of Year Showcase — no classes' ),
                    $date( 'June 18–24, 2026', 'Last Session 2 classes (date varies by day of week)' ),
                ], 'dates-list' ),
            ] ), [ 'name' => 'Closure dates' ] ),
        ] ) ),
        $acc( '2026–2027 Annual Registration Fee', $join( [
            $p( 'An Annual Recreational Registration Fee of <strong>$64 + HST per student</strong> is required once per school year. This fee is valid July 1, 2026 to June 30, 2027 and applies to all recreational programs including summer classes.' ),
            $p( 'This fee is non-refundable and is separate from class session fees.' ),
        ] ) ),
    ] ), [ 'name' => 'Accordions', 'locked' => true ] ),
] );

$blocks[] = $group( 'tab-panel active', $group( 'content-section', $regular, [ 'name' => 'Content', 'locked' => true ] ),
    [ 'name' => 'Panel: 2026–2027 Classes', 'anchor' => 'panel-regular' ] + $top );

/* ══════════ PANEL 2: SUMMER CLASSES ══════════ */
$summer_cards = [
    [
        'name'     => 'Kinder GymFun / Beginner',
        'tags'     => [ 'Ages 3–5', '55 min' ],
        'price'    => '$306',
        'schedule' => [
            [ 'Tuesday', '5:00–5:55 pm' ],
            [ 'Tuesday', '6:00–6:55 pm' ],
            [ 'Wednesday', '4:30–5:25 pm' ],
            [ 'Wednesday', '5:00–5:55 pm' ],
            [ 'Wednesday', '5:30–6:25 pm' ],
        ],
    ],
    [
        'name'     => 'Junior GymFun',
        'tags'     => [ 'Ages 5–6.5', '85 min' ],
        'price'    => '$441',
        'schedule' => [ [ 'Tuesday', '5:00–6:25 pm' ], [ 'Wednesday', '6:00–7:25 pm' ] ],
    ],
    [
        'name'     => 'GymFun 7+',
        'tags'     => [ 'Ages 7+', '115 min' ],
        'price'    => '$558',
        'schedule' => [ [ 'Tuesday', '6:00–7:55 pm' ], [ 'Thursday', '6:00–7:55 pm' ] ],
    ],
];
$summer_list = [];
foreach ( $summer_cards as $c ) {
    $summer_list[] = $card( $c + [ 'price_sub' => '9 classes · July 6 – September 3', 'url' => $reg ] );
}

$summer = $join( [
    $h( 2, 'Summer Classes', 'section-h2' ),
    $p( '<strong>July 6 – September 3, 2026 · 9 weeks</strong><br>Summer afternoon classes run on weekday evenings. Join at any point during the summer — fees are pro-rated for the remaining classes. The gym is closed the Labour Day weekend (August 30 – September 1, 2026).', 'summer-intro' ),
    $group( 'info-note', $p( 'The Annual Recreational Registration Fee of <strong>$64 + HST per student</strong> (valid July 1, 2026 – June 30, 2027) is required for summer enrolment.' ), [ 'name' => 'Info note' ] ),
    $group( 'class-grid', $join( $summer_list ), [ 'name' => 'Classes', 'locked' => true ] ),
    '<!-- wp:separator {"className":"section-divider"} -->' . "\n" . '<hr class="wp-block-separator has-alpha-channel-opacity section-divider"/>' . "\n" . '<!-- /wp:separator -->',
    $group( 'accordion-group', $join( [
        $acc( 'How to Register', $ul( [
            '<strong>Existing families:</strong> Log in to the Family Portal and select your preferred class time.',
            '<strong>New families:</strong> Click Register Now and create your account during checkout.',
            'Payment is processed by our office staff after you submit your registration.',
            'If joining mid-summer, fees will be pro-rated to the remaining classes.',
        ] ) ),
        $acc( 'Gym Closure Dates — Summer 2026', $ul( [
            $date( 'August 30 – September 1, 2026', 'Labour Day Weekend — gym closed' ),
            $date( 'September 3, 2026', 'Last class of the summer' ),
        ], 'dates-list' ) ),
    ] ), [ 'name' => 'Accordions', 'locked' => true ] ),
] );

$blocks[] = $group( 'tab-panel', $group( 'content-section', $summer, [ 'name' => 'Content', 'locked' => true ] ),
    [ 'name' => 'Panel: Summer Classes', 'anchor' => 'panel-summer' ] + $top );

/* ══════════ PANEL 3: PREPARING FOR CLASS ══════════ */
$preparing = $join( [
    $h( 2, 'Preparing for Class', 'section-h2' ),
    $p( 'Everything you need to know before your child’s first class — from what to bring to what to expect at drop-off and pick-up.', 'section-intro-text' ),
    $group( 'accordion-group', $join( [
        $acc( 'Arrival', $ul( [
            'Please arrive <strong>5 minutes before class</strong> begins.',
            'We do not offer curb-side drop-off. All students must be checked in with a coach inside the gym.',
            'Wait in the lobby until a coach comes to greet your child.',
        ] ), true ),
        $acc( 'Pick-Up &amp; Departure', $ul( [
            'Please arrive for pick-up <strong>5 minutes before class ends</strong>.',
            'Children will only be released to adults who are listed as authorized pick-up persons in the Family Portal.',
            'A coach will release your child at the lobby door. You may be asked to show photo ID.',
        ] ) ),
        $acc( 'What to Bring', $ul( [
            'A labelled <strong>water bottle</strong> (water only inside the gym)',
            '<strong>Athletic attire</strong> — fitted shorts or leggings, a T-shirt or fitted top',
            'No skirts, dresses, or loose-fitting clothing',
            'No hoodies or sweatshirts during class',
            'No jewellery of any kind, including stud earrings',
            'Long hair must be tied back securely (bun or braid recommended)',
            'Gymnasts work <strong>barefoot</strong> — no socks, no shoes on the gym floor',
            'A <strong>nut-free snack</strong> for classes 2 hours or longer',
        ] ) ),
        $acc( 'Gym Policies', $ul( [
            '<strong>No photography or video recording</strong> inside the gym without prior written consent.',
            'Shoes must be removed before entering the gym floor.',
            'Viewing areas are limited — please keep accompanying siblings quiet and supervised.',
            'This is a <strong>nut-free facility</strong>. No nuts or nut products are permitted anywhere on site.',
            'Students are expected to listen to coaches, respect teammates, and follow gym rules. Disruptive or unsafe behaviour may result in removal from class without a refund.',
        ] ) ),
        $acc( 'Tot &amp; Adult — Additional Notes', $ul( [
            'A parent or caregiver <strong>must actively participate</strong> in every Tot &amp; Adult class. Non-participating adults are not permitted on the gym floor during class.',
            'One adult per child maximum.',
            'Caregivers must be barefoot on the gym floor.',
            'Please avoid using your phone during class — your child benefits from your full attention.',
        ] ) ),
        $acc( 'Communicating with the Gym', $ul( [
            'Coaches are not available to speak with parents during class time.',
            'For questions about your child’s progress, scheduling, or your account, please email or call the front desk.',
            'Emergency contacts and authorized pick-up persons are managed through your Family Portal account — please keep them up to date.',
        ] ) ),
        $acc( 'Health &amp; Safety', $ul( [
            'Please <strong>keep your child home</strong> if they are unwell. Do not attend class with a fever, vomiting, diarrhea, or within 48 hours of a contagious illness.',
            'This is a <strong>nut-free and anaphylaxis-aware facility</strong>. If your child has a severe allergy, notify our staff and ensure their EpiPen is with them at all times.',
            'Please inform us of any medical conditions, injuries, or special considerations through the Family Portal so our coaches can best support your child.',
        ] ) ),
    ] ), [ 'name' => 'Accordions', 'locked' => true ] ),
] );

$blocks[] = $group( 'tab-panel', $group( 'content-section', $preparing, [ 'name' => 'Content', 'locked' => true ] ),
    [ 'name' => 'Panel: Preparing for Class', 'anchor' => 'panel-preparing' ] + $top );

/* ══════════ PANEL 4: CANCELLATION POLICY ══════════ */
$cancellation = $join( [
    $h( 2, 'Cancellation Policy' ),
    $group( 'policy-block', $join( [
        $h( 3, 'Credits &amp; Refunds' ),
        $ul( [
            'Cancellations are issued as <strong>account credits only</strong> — no cash or card refunds.',
            'Cancellation requests must be submitted in writing to the gym (email or in person).',
            'Cancellation fees may apply depending on how far in advance the request is made. See the full policies document for details.',
            'The Annual Recreational Registration Fee ($64 + HST) is <strong>non-refundable</strong> in all circumstances.',
        ] ),
    ] ), [ 'name' => 'Policy box' ] ),
    $group( 'policy-block', $join( [
        $h( 3, 'Missed Classes' ),
        $ul( [
            'No credits, refunds, or make-up classes are issued for missed classes due to illness, personal scheduling conflicts, or holidays.',
            'No credits or refunds are issued for classes cancelled due to extraordinary circumstances such as gym closures, weather events, or public health requirements.',
        ] ),
    ] ), [ 'name' => 'Policy box' ] ),
    $group( 'policy-block', $join( [
        $h( 3, 'Payment Fees' ),
        $ul( [
            '<strong>Declined payment fee:</strong> $10',
            '<strong>NSF cheque fee:</strong> $30',
        ] ),
    ] ), [ 'name' => 'Policy box' ] ),
    $group( 'policy-cta', $join( [
        $p( 'For the complete and binding policies covering all programs:' ),
        $buttons( '', [ [ 'View Full Policies (PDF)', 'https://academysportfitness.ca/wp-content/uploads/2025/06/Academy-Policies-25-26.pdf', 'btn-red btn-external', true ] ] ),
    ] ), [ 'name' => 'Full policies link' ] ),
] );

$blocks[] = $group( 'tab-panel', $group( 'policy-section', $cancellation, [ 'name' => 'Content', 'locked' => true ] ),
    [ 'name' => 'Panel: Cancellation Policy', 'anchor' => 'panel-cancellation' ] + $top );

/* ── Not sure which class? ── */
$blocks[] = $group( 'finder-stuck', $join( [
    $p( 'Not sure which class is right for your child? <strong>Contact us</strong> – we’re happy to help you find the best fit.' ),
    $buttons( '', [ [ 'Email Us', 'mailto:academysportfitness@gmail.com', 'btn-red' ] ] ),
] ), [ 'name' => 'Not sure which class' ] + $top );

echo $join( $blocks ) . "\n";
