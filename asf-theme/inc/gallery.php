<?php
/**
 * Gallery page: block markup builders used by patterns/gallery-page.php.
 * A photo's category is the "cat-<name>" token in its Additional CSS class
 * (e.g. "gallery-item cat-camps"); assets/js/pages/gallery.js reads it.
 */

// One filter button (core/button). $filter is the category name; "all" shows everything.
function asf_gallery_filter_button( $label, $filter ) {
    $out  = '<!-- wp:button {"metadata":{"name":"Filter: ' . esc_attr( $label ) . '"},"className":"filter-btn"} -->' . "\n";
    $out .= '<div class="wp-block-button filter-btn"><a class="wp-block-button__link wp-element-button" href="#' . esc_attr( $filter ) . '">' . esc_html( $label ) . '</a></div>' . "\n";
    $out .= '<!-- /wp:button -->' . "\n\n";
    return $out;
}

// One photo (core/image) in category $cat.
function asf_gallery_photo( $src, $alt, $cat ) {
    $cls  = 'gallery-item cat-' . $cat;
    $out  = '<!-- wp:image {"sizeSlug":"full","metadata":{"name":"Photo"},"className":"' . $cls . '"} -->' . "\n";
    $out .= '<figure class="wp-block-image size-full ' . $cls . '"><img src="' . esc_url( $src ) . '" alt="' . esc_attr( $alt ) . '"/></figure>' . "\n";
    $out .= '<!-- /wp:image -->' . "\n\n";
    return $out;
}

// One grey "photo coming soon" tile. $ratio: 4-3, 3-4 or 1-1. $label (optional) shows with an icon.
function asf_gallery_placeholder( $cat, $ratio, $label = '' ) {
    $cls  = 'gallery-item cat-' . $cat . ' gallery-placeholder ph-' . $ratio . ( $label ? ' ph-icon' : '' );
    $out  = '<!-- wp:group {"metadata":{"name":"Placeholder tile"},"className":"' . $cls . '","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group ' . $cls . '"><!-- wp:paragraph {"className":"placeholder-label"} -->' . "\n";
    $out .= '<p class="placeholder-label">' . esc_html( $label ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph --></div>' . "\n";
    $out .= '<!-- /wp:group -->' . "\n\n";
    return $out;
}
