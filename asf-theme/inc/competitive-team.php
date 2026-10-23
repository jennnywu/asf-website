<?php
/**
 * Block markup builders for the Competitive Team page pattern (patterns/competitive-team-page.php).
 * Text arguments are trusted theme copy and may contain inline <strong>, <em>, <br> and <a>.
 */

// One paragraph block (optional class, optional lock)
function asf_competitive_team_p( $html, $class = '', $locked = false ) {
    $attrs = [];
    if ( $locked ) {
        $attrs[] = '"lock":{"move":true,"remove":true}';
    }
    if ( $class ) {
        $attrs[] = '"className":"' . $class . '"';
    }
    $json = $attrs ? ' {' . implode( ',', $attrs ) . '}' : '';
    $cls  = $class ? ' class="' . $class . '"' : '';
    return '<!-- wp:paragraph' . $json . ' -->' . "\n" . '<p' . $cls . '>' . $html . '</p>' . "\n" . '<!-- /wp:paragraph -->' . "\n\n";
}

// One "icon row" inside a program card: the icon is drawn by CSS from the row's icon-* class.
// $content is block markup (a paragraph, or a group of several blocks).
function asf_competitive_team_icon_row( $icon, $content ) {
    $out  = '<!-- wp:group {"metadata":{"name":"Detail row"},"className":"program-icon-row icon-' . $icon . '","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-icon-row icon-' . $icon . '">' . $content . '</div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    return $out;
}

// A detail row with several lines of text (each its own paragraph or block)
function asf_competitive_team_icon_stack( $icon, $blocks ) {
    $inner  = '<!-- wp:group {"metadata":{"name":"Detail text"},"className":"program-icon-text","layout":{"type":"default"}} -->' . "\n";
    $inner .= '<div class="wp-block-group program-icon-text">' . $blocks . '</div>' . "\n";
    $inner .= '<!-- /wp:group -->';
    return asf_competitive_team_icon_row( $icon, $inner );
}

// One program card: header (title + tags), description, detail rows, ASF goal
function asf_competitive_team_card( $title, $tags, $desc, $rows, $goal ) {
    $lock = '"lock":{"move":true,"remove":true}';

    $out  = '<!-- wp:group {"metadata":{"name":"Program"},"className":"program-card","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-card">';

    // Header
    $out .= '<!-- wp:group {"metadata":{"name":"Program header"},' . $lock . ',"className":"program-card-header","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-card-header">';
    $out .= '<!-- wp:heading {"level":3,' . $lock . '} -->' . "\n" . '<h3 class="wp-block-heading">' . $title . '</h3>' . "\n" . '<!-- /wp:heading -->' . "\n\n";
    $out .= '<!-- wp:group {"metadata":{"name":"Tags"},' . $lock . ',"className":"program-tags","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-tags">';
    foreach ( $tags as $tag ) {
        $out .= asf_competitive_team_p( $tag, 'program-tag' );
    }
    $out .= '</div>' . "\n" . '<!-- /wp:group --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";

    // Body
    $out .= '<!-- wp:group {"metadata":{"name":"Program details"},' . $lock . ',"className":"program-card-body","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-card-body">';
    $out .= asf_competitive_team_p( $desc, 'program-desc', true );
    $out .= '<!-- wp:group {"metadata":{"name":"Detail rows"},' . $lock . ',"className":"program-icons","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-icons">' . implode( '', $rows ) . '</div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    $out .= asf_competitive_team_p( '<strong>ASF Goal</strong>' . $goal, 'program-goal', true );
    $out .= '</div>' . "\n" . '<!-- /wp:group --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";

    return $out;
}
