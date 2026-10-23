<?php
/**
 * Which Program page: block markup builders used by patterns/which-program-page.php.
 *
 * Finder logic (assets/js/pages/which-program.js):
 * - Each answer chip is a Button block whose link is "#<question>-<value>", e.g. "#age-toddler".
 *   "#age-any" means "no preference" for that question.
 * - Each program card's Additional CSS class lists the answers it suits, with the same
 *   tokens, e.g. "prog-card status-open age-toddler age-young exp-first goal-fun".
 *   A card that has no token for a question is shown for every answer to that question.
 * - status-open / status-assessment / status-invite sets the card's top stripe and badge colour.
 */

// One finder question: label + row of answer chips. $chips = [ [ label, value ], ... ]
function asf_which_program_question( $name, $label, $key, $chips ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $out  = '<!-- wp:group {"metadata":{"name":"' . esc_attr( $name ) . '"},' . $lock . ',"className":"filter-group","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group filter-group"><!-- wp:paragraph {' . $lock . ',"className":"filter-label"} -->' . "\n";
    $out .= '<p class="filter-label">' . esc_html( $label ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:buttons {"metadata":{"name":"Answers"},' . $lock . ',"className":"filter-chips"} -->' . "\n";
    $out .= '<div class="wp-block-buttons filter-chips">';
    foreach ( $chips as $chip ) {
        $out .= '<!-- wp:button {"className":"chip"} -->' . "\n";
        $out .= '<div class="wp-block-button chip"><a class="wp-block-button__link wp-element-button" href="#' . esc_attr( $key . '-' . $chip[1] ) . '">' . esc_html( $chip[0] ) . '</a></div>' . "\n";
        $out .= '<!-- /wp:button -->' . "\n\n";
    }
    $out .= '</div>' . "\n" . '<!-- /wp:buttons --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";
    return $out;
}

/**
 * One program card.
 * $p = [ title, status (open|assessment|invite), badge, ages text, hours text, description,
 *        best-for text, link url, link text, tokens (e.g. 'age-young age-child exp-first goal-fun') ]
 */
function asf_which_program_card( $p ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $cls  = 'prog-card status-' . $p['status'] . ' ' . $p['tokens'];
    $out  = '<!-- wp:group {"metadata":{"name":"' . esc_attr( 'Program: ' . $p['title'] ) . '"},"className":"' . esc_attr( $cls ) . '","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group ' . esc_attr( $cls ) . '">';
    $out .= '<!-- wp:group {"metadata":{"name":"Card content"},' . $lock . ',"className":"prog-card-body","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group prog-card-body">';

    // Title + badge
    $out .= '<!-- wp:group {"metadata":{"name":"Title and badge"},' . $lock . ',"className":"prog-card-title-row","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group prog-card-title-row"><!-- wp:heading {"level":3,' . $lock . '} -->' . "\n";
    $out .= '<h3 class="wp-block-heading">' . esc_html( $p['title'] ) . '</h3>' . "\n";
    $out .= '<!-- /wp:heading -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"prog-badge"} -->' . "\n";
    $out .= '<p class="prog-badge">' . esc_html( $p['badge'] ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";

    // Ages + hours (icons drawn by CSS)
    $out .= '<!-- wp:group {"metadata":{"name":"Ages and hours"},' . $lock . ',"className":"prog-meta","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group prog-meta"><!-- wp:paragraph {' . $lock . ',"className":"prog-meta-item meta-age"} -->' . "\n";
    $out .= '<p class="prog-meta-item meta-age">' . esc_html( $p['ages'] ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"prog-meta-item meta-time"} -->' . "\n";
    $out .= '<p class="prog-meta-item meta-time">' . esc_html( $p['hours'] ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";

    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"prog-desc"} -->' . "\n";
    $out .= '<p class="prog-desc">' . esc_html( $p['desc'] ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";

    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"prog-bestfor"} -->' . "\n";
    $out .= '<p class="prog-bestfor"><strong>Best for:</strong> ' . esc_html( $p['bestfor'] ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";

    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"prog-link"} -->' . "\n";
    $out .= '<p class="prog-link"><a href="' . esc_url( $p['url'] ) . '">' . esc_html( $p['link'] ) . '</a></p>' . "\n";
    $out .= '<!-- /wp:paragraph -->';

    $out .= '</div>' . "\n" . '<!-- /wp:group --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";
    return $out;
}
