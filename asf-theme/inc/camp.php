<?php
/**
 * Camp page: block markup builders used by patterns/camp-page.php.
 * Each function returns core block markup (strings are the theme's own copy, already HTML-safe).
 */

// Lock that stops a block being moved or deleted by accident
function asf_camp_lock() {
    return [ 'move' => true, 'remove' => true ];
}

// Opening / closing block comments
function asf_camp_open( $block, $attrs = [] ) {
    $json = $attrs ? ' ' . wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) : '';
    return "<!-- wp:$block$json -->\n";
}
function asf_camp_close( $block ) {
    return "<!-- /wp:$block -->\n\n";
}

function asf_camp_p( $html, $class = '', $lock = false ) {
    $a = [];
    if ( $lock ) {
        $a['lock'] = asf_camp_lock();
    }
    if ( $class ) {
        $a['className'] = $class;
    }
    $cls = $class ? ' class="' . esc_attr( $class ) . '"' : '';
    return asf_camp_open( 'paragraph', $a ) . "<p$cls>$html</p>\n" . asf_camp_close( 'paragraph' );
}

function asf_camp_heading( $level, $html, $class = '', $lock = false ) {
    $a = [];
    if ( 2 !== $level ) {
        $a['level'] = $level;
    }
    if ( $lock ) {
        $a['lock'] = asf_camp_lock();
    }
    if ( $class ) {
        $a['className'] = $class;
    }
    $cls = $class ? ' ' . esc_attr( $class ) : '';
    return asf_camp_open( 'heading', $a ) . "<h$level class=\"wp-block-heading$cls\">$html</h$level>\n" . asf_camp_close( 'heading' );
}

function asf_camp_group( $inner, $class, $name = '', $lock = false, $anchor = '' ) {
    $a = [];
    if ( $name ) {
        $a['metadata'] = [ 'name' => $name ];
    }
    if ( $lock ) {
        $a['lock'] = asf_camp_lock();
    }
    if ( $anchor ) {
        $a['anchor'] = $anchor;
    }
    $a['className'] = $class;
    $a['layout']    = [ 'type' => 'default' ];
    $id = $anchor ? ' id="' . esc_attr( $anchor ) . '"' : '';
    return asf_camp_open( 'group', $a ) . "<div$id class=\"wp-block-group " . esc_attr( $class ) . "\">$inner</div>\n" . asf_camp_close( 'group' );
}

function asf_camp_list( $items, $class = '', $lock = false ) {
    $a = [];
    if ( $lock ) {
        $a['lock'] = asf_camp_lock();
    }
    if ( $class ) {
        $a['className'] = $class;
    }
    $cls = $class ? ' ' . esc_attr( $class ) : '';
    $lis = [];
    foreach ( $items as $item ) {
        $lis[] = "<!-- wp:list-item -->\n<li>$item</li>\n<!-- /wp:list-item -->";
    }
    return asf_camp_open( 'list', $a ) . "<ul class=\"wp-block-list$cls\">" . implode( "\n\n", $lis ) . "</ul>\n" . asf_camp_close( 'list' );
}

// $buttons: list of [ text, url, className, external (bool) ]
function asf_camp_buttons( $buttons, $class = '', $lock = false, $name = '' ) {
    $a = [];
    if ( $name ) {
        $a['metadata'] = [ 'name' => $name ];
    }
    if ( $lock ) {
        $a['lock'] = asf_camp_lock();
    }
    if ( $class ) {
        $a['className'] = $class;
    }
    $cls = $class ? ' ' . esc_attr( $class ) : '';
    $out = asf_camp_open( 'buttons', $a ) . "<div class=\"wp-block-buttons$cls\">";
    $btns = [];
    foreach ( $buttons as $b ) {
        list( $text, $url, $bclass, $external ) = $b;
        $ext    = $external ? ' target="_blank" rel="noreferrer noopener"' : '';
        $btns[] = asf_camp_open( 'button', [ 'className' => $bclass ] )
            . '<div class="wp-block-button ' . esc_attr( $bclass ) . '"><a class="wp-block-button__link wp-element-button" href="' . esc_attr( $url ) . '"' . $ext . '>' . $text . "</a></div>\n"
            . '<!-- /wp:button -->';
    }
    return $out . implode( "\n\n", $btns ) . "</div>\n" . asf_camp_close( 'buttons' );
}

// Accordion: core/details with a locked "accordion-body" group inside
function asf_camp_accordion( $summary, $body ) {
    $a = [
        'metadata'  => [ 'name' => html_entity_decode( wp_strip_all_tags( $summary ), ENT_QUOTES, 'UTF-8' ) ],
        'className' => 'accordion',
    ];
    $inner = asf_camp_group( $body, 'accordion-body', 'Accordion text', true );
    return asf_camp_open( 'details', $a ) . '<details class="wp-block-details accordion"><summary>' . $summary . '</summary>' . $inner . "</details>\n" . asf_camp_close( 'details' );
}

/* ── Repeated items ── */

// One fact in the facts strip. $lines: list of [ 'title' | 'sub', text ]
function asf_camp_fact( $icon, $lines ) {
    $inner = '';
    foreach ( $lines as $line ) {
        $inner .= 'title' === $line[0]
            ? asf_camp_p( '<strong>' . $line[1] . '</strong>', 'camp-fact-title', true )
            : asf_camp_p( $line[1], 'camp-fact-sub', true );
    }
    return asf_camp_group( asf_camp_group( $inner, 'camp-fact-text', 'Fact text', true ), 'camp-fact ico-' . $icon, 'Fact' );
}

// One price line: label, then "<strong>price</strong> + HST" in one paragraph (bold = the big red price).
// Italic "TBC" shows the yellow TBC pill.
function asf_camp_price_row( $label, $price, $sub = '+ HST' ) {
    $price  = 'TBC' === $price ? '<em>TBC</em>' : '<strong>' . $price . '</strong>' . ( $sub ? ' ' . $sub : '' );
    $inner  = asf_camp_p( $label, 'label', true );
    $inner .= asf_camp_p( $price, 'price', true );
    return asf_camp_group( $inner, 'pricing-row', 'Price row' );
}

// Pricing card: dark header (title + hours) and a body with price rows and an optional note
function asf_camp_price_card( $title, $hours, $rows, $note = '' ) {
    $header = asf_camp_heading( 3, $title, '', true ) . asf_camp_p( $hours, 'age-tag', true );
    $body   = '';
    foreach ( $rows as $row ) {
        $body .= asf_camp_price_row( $row[0], $row[1] );
    }
    if ( $note ) {
        $body .= asf_camp_p( $note, 'pricing-note' );
    }
    return asf_camp_group(
        asf_camp_group( $header, 'pricing-card-header', 'Card header', true ) . asf_camp_group( $body, 'pricing-card-body', 'Prices', true ),
        'pricing-card',
        'Pricing card'
    );
}

// One camp week in the registration table, with its Full Day and Half Day Jackrabbit links
function asf_camp_reg_row( $week, $dates, $theme, $full_class_id, $half_class_id ) {
    $base   = 'https://app.jackrabbitclass.com/regv2.asp?id=540626&preLoadClassID=';
    $inner  = asf_camp_group( asf_camp_p( $week, 'td-week', true ) . asf_camp_p( $dates, 'td-dates', true ), 'td-week-cell', 'Week & dates', true );
    $inner .= asf_camp_p( $theme, 'td-theme', true );
    $inner .= asf_camp_buttons( [ [ 'Full Day Registration', $base . $full_class_id, 'register-link', true ] ], 'td-reg', true, 'Full Day link' );
    $inner .= asf_camp_buttons( [ [ 'Half Day Registration', $base . $half_class_id, 'register-link half', true ] ], 'td-reg', true, 'Half Day link' );
    return asf_camp_group( $inner, 'reg-row', 'Camp week' );
}

// Information card under "Preparing for Camp"
function asf_camp_prepare_card( $icon, $title, $items ) {
    return asf_camp_group( asf_camp_heading( 3, $title, '', true ) . asf_camp_list( $items ), 'prepare-card ico-' . $icon, 'Info card' );
}

/* ── Accordions shared by the Summer, Winter and March Break tabs ── */

function asf_camp_family_portal_link() {
    return '<a href="https://app.jackrabbitclass.com/jr3.0/ParentPortal/Login?orgID=540626" target="_blank" rel="noreferrer noopener">Family Portal</a>';
}

function asf_camp_acc_extended_care( $max ) {
    return asf_camp_accordion(
        'Extended Care',
        asf_camp_list( [
            '<strong>Before Care:</strong> 8:15am – 9:00am — $12/day (HST included)',
            '<strong>After Care:</strong> 4:00pm – 5:30pm — $12/day (HST included)',
            $max,
        ] )
        . asf_camp_p( 'Must be pre-arranged no later than one week before camp. Email us after registering to request.' )
    );
}

function asf_camp_policies_pdf_url() {
    return 'https://academysportfitness.ca/wp-content/uploads/2025/06/Academy-Policies-25-26.pdf';
}

function asf_camp_acc_payment() {
    return asf_camp_accordion(
        'Payment &amp; Cancellation Policies',
        asf_camp_list( [
            'Payment processed by staff after registration — not at checkout.',
            'Declined card fee: $10. NSF fee: $30.',
            'Once paid: <strong>credits only — no cash refunds.</strong>',
            '<strong>No refunds, credits, or makeups</strong> for missed days or exceptional closures.',
            'Annual registration fee is non-refundable.',
        ] )
        . asf_camp_p( '<a href="' . asf_camp_policies_pdf_url() . '" target="_blank" rel="noreferrer noopener">View full Policies PDF</a>' )
    );
}

function asf_camp_acc_annual_fee() {
    return asf_camp_accordion(
        '2026–2027 Annual Registration Fee',
        asf_camp_p( 'A one-time <strong>$64 + HST</strong> annual fee applies as of July 1, 2026. Covers Gymnastics Ontario membership, insurance, and admin costs. Valid July 1, 2026 – June 30, 2027.' )
        . asf_camp_list( [
            '<strong>One week only:</strong> Reduced $32 + HST; upgrades to $64 + HST if a second week or program is attended.',
            '<strong>Two or more weeks:</strong> Full $64 + HST applies.',
        ] )
    );
}

function asf_camp_acc_no_payment_note() {
    return asf_camp_p( '<strong>No payment at checkout.</strong> Our staff charges your card on file once registration is confirmed.' );
}
