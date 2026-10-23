<?php
/**
 * Block markup builders for the Recreational Classes page pattern
 * (patterns/recreational-classes-page.php). Every function returns core block markup
 * that the block editor accepts as valid, so the client can edit all text and links.
 */

// Block comment attributes: '' or ' {"a":...}'
function asf_recreational_classes_attrs( $attrs ) {
    return $attrs ? ' ' . wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) : '';
}

// Attributes that stop a block from being moved or deleted (its text stays editable)
function asf_recreational_classes_lock() {
    return [ 'lock' => [ 'move' => true, 'remove' => true ] ];
}

// Wraps rendered inner blocks in a block comment pair
function asf_recreational_classes_wrap( $name, $attrs, $html ) {
    return '<!-- wp:' . $name . asf_recreational_classes_attrs( $attrs ) . ' -->' . "\n" . $html . "\n" . '<!-- /wp:' . $name . ' -->';
}

// Joins sibling blocks the way the editor saves them
function asf_recreational_classes_join( $blocks ) {
    return implode( "\n\n", array_filter( $blocks ) );
}

function asf_recreational_classes_p( $html, $class = '', $locked = false ) {
    $attrs = $locked ? asf_recreational_classes_lock() : [];
    if ( $class ) {
        $attrs['className'] = $class;
    }
    $open = $class ? '<p class="' . $class . '">' : '<p>';
    return asf_recreational_classes_wrap( 'paragraph', $attrs, $open . $html . '</p>' );
}

function asf_recreational_classes_heading( $level, $html, $class = '', $locked = false ) {
    $attrs = $locked ? asf_recreational_classes_lock() : [];
    if ( 2 !== $level ) {
        $attrs['level'] = $level;
    }
    if ( $class ) {
        $attrs['className'] = $class;
    }
    $cls = trim( 'wp-block-heading ' . $class );
    return asf_recreational_classes_wrap( 'heading', $attrs, '<h' . $level . ' class="' . $cls . '">' . $html . '</h' . $level . '>' );
}

/**
 * Group block.
 * $opts: name (List View name), locked (bool), anchor (id), tag (div|section)
 */
function asf_recreational_classes_group( $class, $inner, $opts = [] ) {
    $attrs = [];
    if ( ! empty( $opts['name'] ) ) {
        $attrs['metadata'] = [ 'name' => $opts['name'] ];
    }
    if ( ! empty( $opts['locked'] ) ) {
        $attrs += asf_recreational_classes_lock();
    }
    $tag = ! empty( $opts['tag'] ) ? $opts['tag'] : 'div';
    if ( 'div' !== $tag ) {
        $attrs['tagName'] = $tag;
    }
    if ( ! empty( $opts['anchor'] ) ) {
        $attrs['anchor'] = $opts['anchor'];
    }
    $attrs['className'] = $class;
    $attrs['layout']    = [ 'type' => 'default' ];
    $id = ! empty( $opts['anchor'] ) ? ' id="' . $opts['anchor'] . '"' : '';
    return asf_recreational_classes_wrap( 'group', $attrs, '<' . $tag . $id . ' class="wp-block-group ' . $class . '">' . $inner . '</' . $tag . '>' );
}

// Bulleted list; $items are inline HTML strings (strong / a / br allowed)
function asf_recreational_classes_list( $items, $class = '', $locked = false ) {
    $attrs = $locked ? asf_recreational_classes_lock() : [];
    if ( $class ) {
        $attrs['className'] = $class;
    }
    $lis = [];
    foreach ( $items as $item ) {
        $lis[] = asf_recreational_classes_wrap( 'list-item', [], '<li>' . $item . '</li>' );
    }
    $cls = trim( 'wp-block-list ' . $class );
    return asf_recreational_classes_wrap( 'list', $attrs, '<ul class="' . $cls . '">' . implode( "\n\n", $lis ) . '</ul>' );
}

// Table; $head = array of header cells (or empty), $rows = array of arrays of cell HTML
function asf_recreational_classes_table( $class, $head, $rows, $locked = false ) {
    $attrs = $locked ? asf_recreational_classes_lock() : [];
    $attrs['className'] = $class;
    $html = '<figure class="wp-block-table ' . $class . '"><table class="has-fixed-layout">';
    if ( $head ) {
        $html .= '<thead><tr><th>' . implode( '</th><th>', $head ) . '</th></tr></thead>';
    }
    $html .= '<tbody>';
    foreach ( $rows as $row ) {
        $html .= '<tr><td>' . implode( '</td><td>', $row ) . '</td></tr>';
    }
    $html .= '</tbody></table></figure>';
    return asf_recreational_classes_wrap( 'table', $attrs, $html );
}

// Details (accordion) block; $open = shown expanded on page load
function asf_recreational_classes_details( $class, $summary, $inner, $open = false, $locked = false ) {
    $attrs = $locked ? asf_recreational_classes_lock() : [];
    if ( $open ) {
        $attrs['showContent'] = true;
    }
    $attrs['className'] = $class;
    $html = '<details class="wp-block-details ' . $class . '"' . ( $open ? ' open' : '' ) . '><summary>' . $summary . '</summary>' . $inner . '</details>';
    return asf_recreational_classes_wrap( 'details', $attrs, $html );
}

/**
 * Buttons block. $buttons: list of [ text, url, button class, external (bool), locked (bool) ]
 */
function asf_recreational_classes_buttons( $class, $buttons, $locked = false ) {
    $attrs = $locked ? asf_recreational_classes_lock() : [];
    if ( $class ) {
        $attrs['className'] = $class;
    }
    $out = [];
    foreach ( $buttons as $b ) {
        list( $text, $url, $bclass ) = $b;
        $external = ! empty( $b[3] );
        $battrs   = ! empty( $b[4] ) ? asf_recreational_classes_lock() : [];
        $battrs['className'] = $bclass;
        $target = $external ? ' target="_blank" rel="noreferrer noopener"' : '';
        $out[]  = asf_recreational_classes_wrap( 'button', $battrs,
            '<div class="wp-block-button ' . $bclass . '"><a class="wp-block-button__link wp-element-button" href="' . esc_url( $url ) . '"' . $target . '>' . $text . '</a></div>' );
    }
    $cls = trim( 'wp-block-buttons ' . $class );
    return asf_recreational_classes_wrap( 'buttons', $attrs, '<div class="' . $cls . '">' . implode( "\n\n", $out ) . '</div>' );
}

/**
 * One class card (repeated item: the client duplicates or deletes it in List View).
 * $c keys:
 *   name      - class name (inline HTML, use &amp; for &)
 *   tags      - list of tag texts (ages, length, ...)
 *   desc      - italic description (optional)
 *   sessions  - list of [ label, price ] rows; price null = a note row (optional)
 *   price     - featured price, e.g. '$306' (optional, summer cards)
 *   price_sub - line under the featured price (optional)
 *   schedule  - list of [ day, times ] rows for the "View Schedule" dropdown
 *   url       - Register Now link
 */
function asf_recreational_classes_card( $c ) {
    $lock = [ 'locked' => true ];

    $tags = [];
    foreach ( $c['tags'] as $tag ) {
        $tags[] = asf_recreational_classes_p( $tag, 'class-tag' );
    }
    $header = asf_recreational_classes_group( 'class-card-header', asf_recreational_classes_join( [
        asf_recreational_classes_heading( 3, $c['name'], '', true ),
        asf_recreational_classes_group( 'class-tags', asf_recreational_classes_join( $tags ), [ 'name' => 'Tags', 'locked' => true ] ),
    ] ), [ 'name' => 'Class name and tags', 'locked' => true ] );

    $body = [];
    if ( ! empty( $c['desc'] ) ) {
        $body[] = asf_recreational_classes_p( $c['desc'], 'class-desc', true );
    }
    if ( ! empty( $c['sessions'] ) ) {
        $rows = [];
        foreach ( $c['sessions'] as $s ) {
            if ( null === $s[1] ) {
                $row = asf_recreational_classes_p( $s[0], 'session-label' );
                $rows[] = asf_recreational_classes_group( 'session-row session-note', $row, [ 'name' => 'Note row' ] );
            } else {
                $row = asf_recreational_classes_join( [
                    asf_recreational_classes_p( $s[0], 'session-label', true ),
                    asf_recreational_classes_p( '<strong>' . $s[1] . '</strong> + HST', 'session-price', true ),
                ] );
                $rows[] = asf_recreational_classes_group( 'session-row', $row, [ 'name' => 'Price row' ] );
            }
        }
        $body[] = asf_recreational_classes_group( 'class-sessions', asf_recreational_classes_join( $rows ), [ 'name' => 'Prices', 'locked' => true ] );
    }
    if ( ! empty( $c['price'] ) ) {
        $body[] = asf_recreational_classes_p( '<strong>' . $c['price'] . '</strong> + HST', 'class-price-feature', true );
    }
    if ( ! empty( $c['price_sub'] ) ) {
        $body[] = asf_recreational_classes_p( $c['price_sub'], 'class-price-sub', true );
    }
    $body[] = asf_recreational_classes_details( 'card-schedule', 'View Schedule',
        asf_recreational_classes_table( 'card-schedule-table', [ 'Day', 'Time' ], $c['schedule'] ), false, true );
    $body[] = asf_recreational_classes_buttons( 'class-register', [ [ 'Register Now', $c['url'], 'class-register-btn', true, true ] ], true );

    $out  = asf_recreational_classes_group( 'class-card', asf_recreational_classes_join( [
        $header,
        asf_recreational_classes_group( 'class-card-body', asf_recreational_classes_join( $body ), [ 'name' => 'Class details' ] + $lock ),
    ] ), [ 'name' => 'Class card' ] );
    return $out;
}

// One accordion: title + body blocks (wrapped in an .accordion-body group so the original CSS applies)
function asf_recreational_classes_accordion( $title, $body_blocks, $open = false ) {
    $body = asf_recreational_classes_group( 'accordion-body', $body_blocks, [ 'name' => 'Accordion text', 'locked' => true ] );
    return asf_recreational_classes_details( 'accordion', $title, $body, $open );
}

// One dated row for the closure lists: bold date + description
function asf_recreational_classes_date( $date, $what ) {
    return '<strong>' . $date . '</strong> ' . $what;
}
