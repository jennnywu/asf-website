<?php
/**
 * Title: Camps page
 * Slug: asf/camp-page
 * Categories: asf
 * Description: The full Camps page: header, intro, summer promo, and the Summer, Winter, March Break, Preparing for Camp and Cancellation Policy tabs.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

// Block builders: asf_camp_*() in inc/camp.php
$jr = 'https://app.jackrabbitclass.com/regv2.asp?id=540626';

/* ── PAGE HEADER ── */
echo asf_camp_group(
    asf_camp_p( 'Programs', 'section-eyebrow' )
    . asf_camp_heading( 1, 'Camps' )
    . asf_camp_p( 'High-energy days packed with gymnastics, games, and fun', 'page-hero-tagline' ),
    'page-hero', 'Page header', true
);

/* ── INTRO ── */
echo asf_camp_group(
    asf_camp_p( 'Our gymnastics camps offer an exciting, skill-building experience for children ages 5 and up. Set in our fully air-conditioned facility in Richmond Hill, each camp is filled with gymnastics activities, themed games, crafts, and new friendships — all in a safe and encouraging environment.' ),
    'about-camp', 'Intro', true
);

/* ── SUMMER PROMO BANNER ── */
echo asf_camp_group(
    asf_camp_group(
        asf_camp_p( '<strong>Summer Camp Promo — Save $30 on Your Second Week!</strong>', 'promo-banner-title' )
        . asf_camp_p( 'Register for 2 weeks and save $30 on your second (max 3 weeks). Valid June 18 – July 31, 2026. Cannot be combined with other promotions.' ),
        'promo-banner-body', 'Promo text', true
    ),
    'promo-banner', 'Promo banner'
);

/* ── TABS (each button links to its panel: #panel-summer, #panel-winter, ...) ── */
echo asf_camp_group(
    asf_camp_buttons( [
        [ 'Summer Camp', '#panel-summer', 'camp-tab ico-sun', false ],
        [ 'Winter Camp', '#panel-winter', 'camp-tab ico-snowflake', false ],
        [ 'March Break', '#panel-marchbreak', 'camp-tab ico-calendar-days', false ],
        [ 'Preparing for Camp', '#panel-prepare', 'camp-tab ico-clipboard-list', false ],
        [ 'Cancellation Policy', '#panel-cancel', 'camp-tab ico-file-text', false ],
    ], 'camp-tab-bar', true, 'Tab buttons' ),
    'camp-tabs-wrap', 'Tabs', true
);

/* ══════════ SUMMER CAMP ══════════ */
$summer  = asf_camp_group(
    asf_camp_fact( 'calendar', [ [ 'title', 'June 29 – Sept 4, 2026' ], [ 'sub', '10 themed weeks' ] ] )
    . asf_camp_fact( 'clock', [ [ 'title', 'Full Day 9:00am–4:00pm (Ages 5+)' ], [ 'title', 'Optional Half-Day AM &amp; PM (Ages 5–6)' ] ] )
    . asf_camp_fact( 'users', [ [ 'title', 'Ages 5 and Up' ], [ 'sub', 'Fully air-conditioned facility' ] ] ),
    'camp-facts camp-facts-3', 'Key facts', true
);
$summer .= asf_camp_group(
    asf_camp_p( '<strong>No camp July 1 (Wed) and August 3 (Mon)</strong> — statutory holidays. These weeks run 4 days at the holiday rate.' ),
    'camp-alert', 'Holiday notice'
);

// What to Expect: pricing cards + sample daily schedule
$tag      = 'Vault · Bars · Beam · Floor · Tramp · Tumbl Track';
$schedule = [
    [ '9:00–9:30am', 'Warm-Up Game &amp; Stretch' ],
    [ '9:30–10:20am', 'Gymnastics Events 1 &amp; 2 <em>' . $tag . '</em>' ],
    [ '10:20–10:50am', 'Snack #1' ],
    [ '10:50–11:30am', 'Group Game in the Gym' ],
    [ '11:30–12:00pm', 'Gymnastics Event 3 <em>' . $tag . '</em>' ],
    [ '12:00–1:00pm', 'Lunch' ],
    [ '1:00–1:30pm', 'Gymnastics Event 4 <em>' . $tag . '</em>' ],
    [ '1:30–2:30pm', 'Specialty Activity <em>Arts &amp; Craft · Ninja Warrior · Face Painting · Bracelet Making · Board Games · Themed Activity · Obstacle Course</em>' ],
    [ '2:30–3:00pm', 'Snack #2' ],
    [ '3:00–3:50pm', 'Gymnastics Events 5 &amp; 6 <em>' . $tag . '</em>' ],
    [ '3:50–4:00pm', 'Get Ready to Go Home' ],
];
$rows = '';
foreach ( $schedule as $r ) {
    $rows .= '<tr><td>' . $r[0] . '</td><td>' . $r[1] . '</td></tr>';
}
$table = asf_camp_open( 'table', [ 'lock' => asf_camp_lock(), 'className' => 'info-table' ] )
    . '<figure class="wp-block-table info-table"><table class="has-fixed-layout"><thead><tr><th>Time</th><th>Activity</th></tr></thead><tbody>' . $rows . "</tbody></table></figure>\n"
    . asf_camp_close( 'table' );

$summer .= asf_camp_group(
    asf_camp_heading( 2, 'What to Expect', '', true )
    . asf_camp_p( 'Gymnastics all day — skill development, group games, crafts, and weekly themed activities. Every day is different, every week has a new theme.', 'section-intro' )
    . asf_camp_group(
        asf_camp_group(
            asf_camp_price_card( 'Full-Day Camp (Ages 5+)', '9:00am – 4:00pm', [ [ 'Weekly', '$410' ], [ 'Holiday weeks (4-day)', '$330' ] ], 'Extended care available before &amp; after — must be pre-arranged.' )
            . asf_camp_price_card( 'Half-Day Camp (Ages 5–6)', 'AM: 9–12pm &nbsp;·&nbsp; PM: 1–4pm', [ [ 'Weekly', '$300' ], [ 'Holiday weeks (4-day)', '$265' ] ], 'Specify AM or PM when registering.' ),
            'camp-tables-stack', 'Pricing cards', true
        )
        . asf_camp_group( asf_camp_heading( 4, 'Sample Daily Schedule', '', true ) . $table, 'info-table-wrap', 'Sample daily schedule', true ),
        'camp-what-layout', 'Prices and schedule', true
    ),
    'camp-section', 'What to Expect', true
);

// Registration: one "Camp week" row per week (duplicate a row in List View to add a week)
$weeks = [
    [ 'Week 1', 'June 29–30, July 2–3', 'Dr. Seuss Summer <em>4-day</em>', '21408990', '21409115' ],
    [ 'Week 2', 'July 6–10', 'All Four Seasons', '21409024', '21409138' ],
    [ 'Week 3', 'July 13–17', 'Campfire &amp; Cabin Fever', '21409034', '21409141' ],
    [ 'Week 4', 'July 20–24', 'Sweet Candy Escape', '21409036', '21409142' ],
    [ 'Week 5', 'July 27–31', 'Happily Ever After', '21409038', '21409143' ],
    [ 'Week 6', 'Aug 4–7', 'Summer Splash <em>4-day</em>', '21409041', '21409145' ],
    [ 'Week 7', 'Aug 10–14', 'Colour Competitions', '21409042', '21409147' ],
    [ 'Week 8', 'Aug 17–21', 'Big Top Circus', '21409044', '21409149' ],
    [ 'Week 9', 'Aug 24–28', 'Starship Summit', '21409045', '21409151' ],
    [ 'Week 10', 'Aug 31–Sept 4', 'Mission Impossible', '21409048', '21409133' ],
];
$reg = asf_camp_group(
    asf_camp_p( 'Week &amp; Dates', '', true )
    . asf_camp_p( 'Theme', '', true )
    . asf_camp_p( '<em>Ages 5+ &nbsp;|&nbsp; 9am–4pm</em>Full Day — $410+HST', '', true )
    . asf_camp_p( '<em>Ages 5–6 &nbsp;|&nbsp; AM or PM</em>Half Day — $300+HST', '', true ),
    'reg-row reg-head', 'Column headings', true
);
foreach ( $weeks as $w ) {
    $reg .= asf_camp_reg_row( $w[0], $w[1], $w[2], $w[3], $w[4] );
}

$summer .= asf_camp_group(
    asf_camp_heading( 2, 'Registration', '', true )
    . asf_camp_p( 'Click <strong>Register</strong> next to your preferred week. New families: create a free account when prompted. <strong>No payment is charged at checkout</strong> — staff confirm and process it afterward.', 'reg-intro' )
    . asf_camp_p( 'Choose Your Week — select Full Day (Ages 5+) or Half Day (Ages 5–6)', 'reg-sub' )
    . asf_camp_group( $reg, 'reg-table', 'Registration table', true )
    . asf_camp_p( 'If registering for Half Day, specify <strong>AM (9am–12pm)</strong> or <strong>PM (1pm–4pm)</strong>.', 'reg-note' )
    . asf_camp_group(
        asf_camp_accordion(
            'How to Register',
            asf_camp_p( '<strong>Already have an account?</strong> Click Register above to go directly to that week, or log into the ' . asf_camp_family_portal_link() . ' to browse all options.' )
            . asf_camp_p( '<strong>New family?</strong> Click any Register link — you’ll be prompted to create a free account. Once set up, you can return any time to add more programs.' )
            . asf_camp_acc_no_payment_note()
        )
        . asf_camp_acc_extended_care( 'Maximum $60/week' )
        . asf_camp_acc_payment()
        . asf_camp_acc_annual_fee(),
        'accordion-group mt-36', 'Accordions', true
    ),
    'camp-section', 'Registration', true
);

echo asf_camp_group( $summer, 'camp-panel', 'Summer Camp tab', true, 'panel-summer' );

/* ══════════ WINTER CAMP ══════════ */
$winter  = asf_camp_group(
    asf_camp_fact( 'calendar', [ [ 'title', 'Dec 22–23 &amp; Dec 29–30, Jan 2' ], [ 'sub', '2 short sessions over the holidays' ] ] )
    . asf_camp_fact( 'clock', [ [ 'title', 'Full Day 9am–4pm (Ages 5+)' ], [ 'title', 'Half Day AM 9–12 · PM 1–4 (Ages 5–6)' ] ] )
    . asf_camp_fact( 'user', [ [ 'title', 'Ages 5 and Up' ], [ 'sub', '$90/day + HST' ] ] ),
    'camp-facts camp-facts-3', 'Key facts', true
);
$winter .= asf_camp_group(
    asf_camp_heading( 2, 'Winter Camp 2025–2026', '', true )
    . asf_camp_p( 'Keep the fun going over the holidays! Winter camp runs across two short sessions during the school break — perfect for filling in those in-between days with gymnastics, games, and crafts.', 'section-intro' )
    . asf_camp_group(
        asf_camp_group(
            asf_camp_heading( 3, 'Session 1', '', true )
            . asf_camp_p( 'Monday, December 22, 2025', 'day-row' )
            . asf_camp_p( 'Tuesday, December 23, 2025', 'day-row' )
            . asf_camp_p( '2 days &nbsp;•&nbsp; $180 + HST total', 'schedule-card-note' ),
            'schedule-card', 'Session'
        )
        . asf_camp_group(
            asf_camp_heading( 3, 'Session 2', '', true )
            . asf_camp_p( 'Monday, December 29, 2025', 'day-row' )
            . asf_camp_p( 'Tuesday, December 30, 2025', 'day-row' )
            . asf_camp_p( 'Friday, January 2, 2026', 'day-row' )
            . asf_camp_p( '3 days &nbsp;•&nbsp; $270 + HST total', 'schedule-card-note' ),
            'schedule-card', 'Session'
        ),
        'winter-schedule', 'Sessions', true
    ),
    'camp-section', 'Winter Camp dates', true
);
$winter .= asf_camp_group(
    asf_camp_heading( 2, 'Pricing &amp; Registration', '', true )
    . asf_camp_group(
        asf_camp_price_card( 'Full-Day Camp (Ages 5+)', '9:00am – 4:00pm', [ [ 'Per day', '$90' ], [ 'Session 1 (2 days)', '$180' ], [ 'Session 2 (3 days)', '$270' ] ] )
        . asf_camp_price_card( 'Half-Day Camp (Ages 5–6)', 'AM: 9–12pm &nbsp;·&nbsp; PM: 1–4pm', [ [ 'Per day', 'TBC' ], [ 'Session 1 (2 days)', 'TBC' ], [ 'Session 2 (3 days)', 'TBC' ] ] ),
        'pricing-cards', 'Pricing cards', true
    )
    . asf_camp_group(
        asf_camp_buttons( [ [ 'Register Now', $jr, 'btn-red', true ] ], '', true )
        . asf_camp_p( 'No payment at checkout — staff processes charges after registration. Annual fee of $64 + HST applies (valid July 2025 – June 2026).', 'register-cta-note' ),
        'register-cta', 'Register button', true
    )
    . asf_camp_group(
        asf_camp_accordion(
            'How to Register',
            asf_camp_p( 'Log in to the ' . asf_camp_family_portal_link() . ' to register. New families will be prompted to create a free account. Once set up, you can return any time to add more programs.' )
            . asf_camp_acc_no_payment_note()
        )
        . asf_camp_acc_extended_care( 'Maximum $60/session' )
        . asf_camp_acc_payment()
        . asf_camp_acc_annual_fee(),
        'accordion-group mt-28', 'Accordions', true
    ),
    'camp-section', 'Pricing & Registration', true
);

echo asf_camp_group( $winter, 'camp-panel', 'Winter Camp tab', true, 'panel-winter' );

/* ══════════ MARCH BREAK CAMP ══════════ */
$march  = asf_camp_group(
    asf_camp_fact( 'calendar', [ [ 'title', 'March 16–20, 2026' ], [ 'sub', 'Mon – Fri, full week' ] ] )
    . asf_camp_fact( 'clock', [ [ 'title', 'Full Day 9am–4pm (Ages 5+)' ], [ 'title', 'Half Day AM 9–12 · PM 1–4 (Ages 5–6)' ] ] )
    . asf_camp_fact( 'user', [ [ 'title', 'Ages 5 and Up' ], [ 'sub', 'Gymnastics, games &amp; crafts' ] ] )
    . asf_camp_fact( 'home', [ [ 'title', '40 Vogell Rd, Unit 32' ], [ 'sub', 'Richmond Hill, ON' ] ] ),
    'camp-facts camp-facts-4', 'Key facts', true
);
$march .= asf_camp_group(
    asf_camp_heading( 2, 'March Break Camp 2026', '', true )
    . asf_camp_p( 'A full week of gymnastics fun during the March school break — March 16 to 20. Choose full-day or half-day to fit your schedule.', 'section-intro' )
    . asf_camp_group(
        asf_camp_price_card( 'Full-Day Camp (Ages 5+)', '9:00am – 4:00pm', [ [ 'Weekly rate', '$410' ], [ 'Daily drop-in', '$90' ] ] )
        . asf_camp_price_card( 'Half-Day Camp (Ages 5–6)', 'AM: 9–12pm &nbsp;·&nbsp; PM: 1–4pm', [ [ 'Weekly rate', '$300' ], [ 'Daily drop-in', '$65' ] ] ),
        'pricing-cards', 'Pricing cards', true
    )
    . asf_camp_group(
        asf_camp_buttons( [ [ 'Register Now', $jr, 'btn-red', true ] ], '', true )
        . asf_camp_p( 'No payment at checkout — staff processes charges after confirmation. Annual registration fee of $32 + HST applies for new/returning athletes.', 'register-cta-note' ),
        'register-cta', 'Register button', true
    )
    . asf_camp_group(
        asf_camp_accordion(
            'How to Register',
            asf_camp_p( 'Log in to the ' . asf_camp_family_portal_link() . ' to register for the March Break session. New families will be prompted to create a free account. Once set up, you can return any time to add more programs.' )
            . asf_camp_acc_no_payment_note()
        )
        . asf_camp_acc_extended_care( 'Maximum $60/week' )
        . asf_camp_acc_payment()
        . asf_camp_acc_annual_fee(),
        'accordion-group mt-28', 'Accordions', true
    ),
    'camp-section', 'March Break Camp', true
);

echo asf_camp_group( $march, 'camp-panel', 'March Break tab', true, 'panel-marchbreak' );

/* ══════════ PREPARING FOR CAMP ══════════ */
$prepare = asf_camp_group(
    asf_camp_heading( 2, 'Preparing for Camp', '', true )
    . asf_camp_p( 'Everything you need to know before your first day. Read through before camp starts — it makes drop-off smoother for everyone!', 'section-intro' )
    . asf_camp_group(
        asf_camp_prepare_card( 'drop-off', 'Drop-Off', [
            'Doors open at <strong>8:50am</strong> — please arrive between 8:50 and 9:00am.',
            'Late arrivals are admitted only when a coach can escort them in without disrupting the group.',
            'Parents and caregivers must <strong>sign campers in</strong> at the door with coaching staff.',
            'If your child will be absent, please give us advance notice.',
        ] )
        . asf_camp_prepare_card( 'pick-up', 'Pick-Up', [
            'Pick-up is at <strong>4:00pm</strong> (5:30pm for extended care).',
            'Coaches will sign campers out. Bring photo ID if staff doesn’t know you.',
            '<strong>Only authorized individuals</strong> listed on file may pick up a child.',
        ] )
        . asf_camp_prepare_card( 'bring', 'What to Bring', [
            '<strong>2 nut-free snacks</strong> (morning &amp; afternoon).',
            'A <strong>substantial lunch</strong> — no fridge or microwave available.',
            '<strong>Full water bottle</strong> labeled with your child’s name.',
            'Form-fitting clothing: shorts, t-shirt, or gymnastics leotard.',
            '<strong>No</strong> skirts, dresses, or hoodies.',
            'Long hair pulled back; no necklaces or hanging jewelry.',
            'Campers go <strong>barefoot</strong> in the gym.',
        ] )
        . asf_camp_prepare_card( 'shield', 'Gym Rules &amp; Safety', [
            'Equipment use requires <strong>coach supervision</strong> at all times.',
            'Remove outdoor shoes in the front lobby before the gym.',
            'Only athletes and staff in gym areas — no parent viewing during camp.',
            'Food and drinks in <strong>designated areas only</strong>.',
            '<strong>Peanut &amp; nut-free facility</strong> — no products containing nuts.',
        ] )
        . asf_camp_prepare_card( 'phone', 'Communications', [
            'Coaches are <strong>not available during camp hours</strong>.',
            'Email questions are answered by the head coach as soon as possible.',
            'Please avoid entering the gym during camp operations.',
        ] )
        . asf_camp_prepare_card( 'heart', 'Health &amp; Safety', [
            'If your child is sick or unwell, please keep them home and follow medical guidance.',
            'Health policies may be updated in line with provincial and public health regulations.',
        ] ),
        'prepare-grid', 'Info cards', true
    ),
    'camp-section', 'Preparing for Camp', true
);

echo asf_camp_group( $prepare, 'camp-panel', 'Preparing for Camp tab', true, 'panel-prepare' );

/* ══════════ CANCELLATION POLICY ══════════ */
$cancel = asf_camp_group(
    asf_camp_heading( 2, 'Cancellation Policy', '', true )
    . asf_camp_p( 'A summary of payment and cancellation policies for all camp programs.', 'section-intro' )
    . asf_camp_group(
        asf_camp_accordion( 'Payment Summary', asf_camp_list( [
            'Credit card required at registration — no charge at checkout.',
            'Staff process payment after confirming your registration.',
            'Declined card fee: $10. NSF fee: $30.',
        ] ) )
        . asf_camp_accordion( 'Refunds &amp; Credits', asf_camp_list( [
            'Once paid: <strong>credits only — no cash refunds</strong>, with advance notice and applicable fees.',
            'Annual registration fee is <strong>non-refundable and non-creditable</strong>.',
            '<strong>No refunds, credits, or makeups</strong> for missed days or exceptional closures.',
        ] ) )
        . asf_camp_accordion( 'Extended Care Cancellations', asf_camp_p( 'Extended care must be pre-arranged no later than one week before camp. Email us to change or cancel extended care bookings.' ) ),
        'accordion-group', 'Accordions', true
    )
    . asf_camp_group(
        asf_camp_p( 'For the complete and binding policies covering all programs:', 'policies-box-text' )
        . asf_camp_buttons( [ [ 'View Full Policies (PDF)', asf_camp_policies_pdf_url(), 'btn-red', true ] ], '', true ),
        'policies-box', 'Policies PDF', true
    ),
    'camp-section', 'Cancellation Policy', true
);

echo asf_camp_group( $cancel, 'camp-panel', 'Cancellation Policy tab', true, 'panel-cancel' );
