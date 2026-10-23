<?php
/**
 * Block markup builders for the Xcel / Advanced page pattern (patterns/xcel-page.php).
 */

// One program card. $tags: list of tag texts. $rows: list of [ icon, html ] where icon is clock | trophy | trend
function asf_xcel_program_card( $title, $tags, $desc, $rows, $goal ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $out  = '<!-- wp:group {"metadata":{"name":"Program card"},"className":"program-card","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-card">';

    // Header: title + tags
    $out .= '<!-- wp:group {"metadata":{"name":"Card header"},' . $lock . ',"className":"program-card-header","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-card-header">';
    $out .= '<!-- wp:heading {"level":3,' . $lock . '} -->' . "\n";
    $out .= '<h3 class="wp-block-heading">' . $title . '</h3>' . "\n";
    $out .= '<!-- /wp:heading -->' . "\n\n";
    $out .= '<!-- wp:group {"metadata":{"name":"Tags"},' . $lock . ',"className":"program-tags","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-tags">';
    $parts = [];
    foreach ( $tags as $tag ) {
        $parts[] = '<!-- wp:paragraph {"metadata":{"name":"Tag"},"className":"program-tag"} -->' . "\n" . '<p class="program-tag">' . $tag . '</p>' . "\n" . '<!-- /wp:paragraph -->';
    }
    $out .= implode( "\n\n", $parts ) . '</div>' . "\n";
    $out .= '<!-- /wp:group --></div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";

    // Body: description, icon rows, goal
    $out .= '<!-- wp:group {"metadata":{"name":"Card body"},' . $lock . ',"className":"program-card-body","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-card-body">';
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"program-desc"} -->' . "\n";
    $out .= '<p class="program-desc">' . $desc . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:group {"metadata":{"name":"Key facts"},' . $lock . ',"className":"program-icons","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-icons">';
    $parts = [];
    foreach ( $rows as $row ) {
        $cls     = 'program-icon-row icon-' . $row[0];
        $parts[] = '<!-- wp:paragraph {"metadata":{"name":"Key fact"},"className":"' . $cls . '"} -->' . "\n" . '<p class="' . $cls . '">' . $row[1] . '</p>' . "\n" . '<!-- /wp:paragraph -->';
    }
    $out .= implode( "\n\n", $parts ) . '</div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    $out .= '<!-- wp:group {"metadata":{"name":"ASF goal"},' . $lock . ',"className":"program-goal","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-goal">';
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"program-goal-label"} -->' . "\n";
    $out .= '<p class="program-goal-label">ASF Goal</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . '} -->' . "\n";
    $out .= '<p>' . $goal . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n";
    $out .= '<!-- /wp:group --></div>' . "\n";
    $out .= '<!-- /wp:group --></div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    return $out;
}

// One box in the pathway diagram. $alt: true for the red "progresses to" boxes
function asf_xcel_pathway_step( $title, $sub, $alt = false ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $cls  = $alt ? 'pathway-step alt' : 'pathway-step';
    $out  = '<!-- wp:group {"metadata":{"name":"Pathway step"},"className":"' . $cls . '","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group ' . $cls . '">';
    $out .= '<!-- wp:paragraph {' . $lock . '} -->' . "\n";
    $out .= '<p>' . $title . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"pathway-step-sub"} -->' . "\n";
    $out .= '<p class="pathway-step-sub">' . $sub . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    return $out;
}

// Arrow between pathway steps
function asf_xcel_pathway_arrow() {
    return '<!-- wp:paragraph {"metadata":{"name":"Arrow"},"className":"pathway-arrow"} -->' . "\n" . '<p class="pathway-arrow">→</p>' . "\n" . '<!-- /wp:paragraph -->' . "\n\n";
}
