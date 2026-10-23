<?php
/**
 * Block markup builders for the Benefits page pattern (patterns/benefits-page.php).
 * Text arguments are trusted theme copy and may contain inline <strong>, <em>, <sup>, <br> and <a>.
 */

// One paragraph block
function asf_benefits_p( $html, $class = '' ) {
    $json = $class ? ' {"className":"' . $class . '"}' : '';
    $cls  = $class ? ' class="' . $class . '"' : '';
    return '<!-- wp:paragraph' . $json . ' -->' . "\n" . '<p' . $cls . '>' . $html . '</p>' . "\n" . '<!-- /wp:paragraph -->' . "\n\n";
}

// One h4 heading block (sub-heading inside a "Read More" panel)
function asf_benefits_h4( $text, $class = '' ) {
    $json = $class ? ',"className":"' . $class . '"' : '';
    $cls  = $class ? ' ' . $class : '';
    return '<!-- wp:heading {"level":4' . $json . '} -->' . "\n" . '<h4 class="wp-block-heading' . $cls . '">' . $text . '</h4>' . "\n" . '<!-- /wp:heading -->' . "\n\n";
}

// A bulleted list with the red-dot style
function asf_benefits_bullets( $items ) {
    $li = [];
    foreach ( $items as $item ) {
        $li[] = '<!-- wp:list-item -->' . "\n" . '<li>' . $item . '</li>' . "\n" . '<!-- /wp:list-item -->';
    }
    return '<!-- wp:list {"className":"benefit-bullets"} -->' . "\n" . '<ul class="wp-block-list benefit-bullets">' . implode( "\n\n", $li ) . '</ul>' . "\n" . '<!-- /wp:list -->' . "\n\n";
}

// One apparatus tile (name + takeaway) for the first "Read More" panel
function asf_benefits_apparatus( $name, $takeaway ) {
    $out  = '<!-- wp:group {"metadata":{"name":"Apparatus"},"className":"apparatus-item","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group apparatus-item">';
    $out .= asf_benefits_p( $name, 'apparatus-name' );
    $out .= asf_benefits_p( $takeaway, 'apparatus-takeaway' );
    $out .= '</div>' . "\n" . '<!-- /wp:group -->' . "\n\n";
    return $out;
}

/**
 * One benefit section: text column (eyebrow, heading, intro blocks, hidden "Read More" panel
 * and its toggle button) plus a photo. The button links to #<panel id>; assets/js/pages/benefits.js
 * turns it into the show/hide toggle.
 */
function asf_benefits_block( $reverse, $eyebrow, $title, $intro, $panel_id, $panel, $photo, $alt ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $cls  = 'benefit-block' . ( $reverse ? ' reverse' : '' );

    $out  = '<!-- wp:group {"metadata":{"name":"Benefit"},"className":"' . $cls . '","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group ' . $cls . '">';

    // Text column
    $out .= '<!-- wp:group {"metadata":{"name":"Benefit text"},' . $lock . ',"className":"benefit-text","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group benefit-text">';
    $out .= asf_benefits_p( $eyebrow, 'section-eyebrow' );
    $out .= '<!-- wp:heading -->' . "\n" . '<h2 class="wp-block-heading">' . $title . '</h2>' . "\n" . '<!-- /wp:heading -->' . "\n\n";
    $out .= $intro;

    // Hidden panel
    $out .= '<!-- wp:group {"metadata":{"name":"Read More panel (hidden until clicked)"},' . $lock . ',"anchor":"' . $panel_id . '","className":"benefit-more","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div id="' . $panel_id . '" class="wp-block-group benefit-more">';
    $out .= '<!-- wp:group {' . $lock . ',"className":"benefit-more-inner","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group benefit-more-inner">' . $panel . '</div>' . "\n";
    $out .= '<!-- /wp:group --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";

    // Toggle button
    $out .= '<!-- wp:buttons {' . $lock . '} -->' . "\n";
    $out .= '<div class="wp-block-buttons"><!-- wp:button {' . $lock . ',"className":"btn-read-more"} -->' . "\n";
    $out .= '<div class="wp-block-button btn-read-more"><a class="wp-block-button__link wp-element-button" href="#' . $panel_id . '">Read More</a></div>' . "\n";
    $out .= '<!-- /wp:button --></div>' . "\n" . '<!-- /wp:buttons --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";

    // Photo
    $out .= '<!-- wp:image {"sizeSlug":"full",' . $lock . ',"className":"benefit-img-placeholder"} -->' . "\n";
    $out .= '<figure class="wp-block-image size-full benefit-img-placeholder"><img src="' . esc_url( $photo ) . '" alt="' . esc_attr( $alt ) . '"/></figure>' . "\n";
    $out .= '<!-- /wp:image --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";

    return $out;
}
