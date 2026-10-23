<?php
/**
 * Block markup builders for the Birthday Parties page pattern (patterns/birthday-page.php).
 */

// One highlight in the strip under the intro. $icon: clock | home | calendar (CSS icon class)
function asf_birthday_fact( $icon, $title, $sub ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $out  = '<!-- wp:group {"metadata":{"name":"Highlight"},"className":"bday-fact icon-' . $icon . '","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group bday-fact icon-' . $icon . '">';
    $out .= '<!-- wp:group {"metadata":{"name":"Highlight text"},' . $lock . ',"className":"bday-fact-text","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group bday-fact-text">';
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"bday-fact-title"} -->' . "\n";
    $out .= '<p class="bday-fact-title">' . $title . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"bday-fact-sub"} -->' . "\n";
    $out .= '<p class="bday-fact-sub">' . $sub . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n";
    $out .= '<!-- /wp:group --></div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    return $out;
}

// One party package card. $icon: gift | star. $price: e.g. '$330'. $items: list lines. $extra: line under the list
function asf_birthday_package( $icon, $title, $price, $items, $extra ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $out  = '<!-- wp:group {"metadata":{"name":"Party package"},"className":"bday-block icon-' . $icon . '","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group bday-block icon-' . $icon . '">';
    $out .= '<!-- wp:heading {"level":3,' . $lock . '} -->' . "\n";
    $out .= '<h3 class="wp-block-heading">' . $title . '</h3>' . "\n";
    $out .= '<!-- /wp:heading -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"bday-price"} -->' . "\n";
    $out .= '<p class="bday-price">' . $price . ' <em>+ HST</em></p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:list {' . $lock . ',"className":"bday-list"} -->' . "\n";
    $out .= '<ul class="wp-block-list bday-list">';
    $lis  = [];
    foreach ( $items as $item ) {
        $lis[] = '<!-- wp:list-item -->' . "\n" . '<li>' . $item . '</li>' . "\n" . '<!-- /wp:list-item -->';
    }
    $out .= implode( "\n\n", $lis ) . '</ul>' . "\n";
    $out .= '<!-- /wp:list -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"bday-extra"} -->' . "\n";
    $out .= '<p class="bday-extra">' . $extra . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    return $out;
}

// One "Good to Know" row: label on the left, value on the right
function asf_birthday_info_row( $label, $value ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $out  = '<!-- wp:group {"metadata":{"name":"Info row"},"className":"bday-pricing-row","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group bday-pricing-row">';
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"bday-pricing-label"} -->' . "\n";
    $out .= '<p class="bday-pricing-label">' . $label . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"bday-pricing-value"} -->' . "\n";
    $out .= '<p class="bday-pricing-value">' . $value . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    return $out;
}
