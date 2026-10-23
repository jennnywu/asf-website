<?php
/* ── HOME PAGE: block markup builders used by patterns/home-page.php ── */

// One program tab button; $icon picks the icon drawn by pages/home.css (cartwheel, star, trophy, sun, balloon)
function asf_home_program_tab( $label, $panel_id, $icon ) {
    return '<!-- wp:button {"className":"program-tab tab-icon-' . $icon . '"} -->' . "\n"
        . '<div class="wp-block-button program-tab tab-icon-' . $icon . '"><a class="wp-block-button__link wp-element-button" href="#' . esc_attr( $panel_id ) . '">' . esc_html( $label ) . '</a></div>' . "\n"
        . '<!-- /wp:button -->' . "\n\n";
}

// One program panel: photo (or "Photo coming soon"), title, text and a Learn More button.
// $photo_class adds e.g. "pos-30" to shift the photo's focus point (see pages/home.css)
function asf_home_program_panel( $panel_id, $name, $photo, $alt, $photo_class, $title, $text, $link ) {
    $lock  = '"lock":{"move":true,"remove":true}';
    $class = trim( 'program-photo ' . $photo_class );
    $out   = '<!-- wp:group {"anchor":"' . $panel_id . '","metadata":{"name":"' . $name . ' panel"},"className":"program-panel","layout":{"type":"default"}} -->' . "\n";
    $out  .= '<div id="' . $panel_id . '" class="wp-block-group program-panel">';
    $out  .= '<!-- wp:group {"metadata":{"name":"Photo"},' . $lock . ',"className":"program-panel-img","layout":{"type":"default"}} -->' . "\n";
    $out  .= '<div class="wp-block-group program-panel-img">';
    if ( $photo ) {
        $out .= '<!-- wp:image {"sizeSlug":"full","className":"' . $class . '"} -->' . "\n"
            . '<figure class="wp-block-image size-full ' . $class . '"><img src="' . esc_url( $photo ) . '" alt="' . esc_attr( $alt ) . '"/></figure>' . "\n"
            . '<!-- /wp:image -->';
    } else {
        $out .= '<!-- wp:paragraph -->' . "\n" . '<p>Photo coming soon</p>' . "\n" . '<!-- /wp:paragraph -->';
    }
    $out .= '</div>' . "\n" . '<!-- /wp:group -->' . "\n\n";
    $out .= '<!-- wp:group {"metadata":{"name":"Text"},' . $lock . ',"className":"program-panel-content","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group program-panel-content">';
    $out .= '<!-- wp:heading {"level":3} -->' . "\n" . '<h3 class="wp-block-heading">' . esc_html( $title ) . '</h3>' . "\n" . '<!-- /wp:heading -->' . "\n\n";
    $out .= '<!-- wp:paragraph -->' . "\n" . '<p>' . esc_html( $text ) . '</p>' . "\n" . '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:buttons -->' . "\n" . '<div class="wp-block-buttons"><!-- wp:button {"className":"btn-red"} -->' . "\n"
        . '<div class="wp-block-button btn-red"><a class="wp-block-button__link wp-element-button" href="' . esc_url( home_url( $link ) ) . '">Learn More</a></div>' . "\n"
        . '<!-- /wp:button --></div>' . "\n" . '<!-- /wp:buttons -->';
    $out .= '</div>' . "\n" . '<!-- /wp:group --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";
    return $out;
}

// One testimonial card: quote + author line
function asf_home_testimonial( $quote, $author ) {
    $lock = '"lock":{"move":true,"remove":true}';
    return '<!-- wp:group {"metadata":{"name":"Testimonial"},"className":"testimonial-card","layout":{"type":"default"}} -->' . "\n"
        . '<div class="wp-block-group testimonial-card"><!-- wp:paragraph {' . $lock . '} -->' . "\n"
        . '<p>' . esc_html( $quote ) . '</p>' . "\n"
        . '<!-- /wp:paragraph -->' . "\n\n"
        . '<!-- wp:paragraph {' . $lock . ',"className":"testimonial-author"} -->' . "\n"
        . '<p class="testimonial-author">' . esc_html( $author ) . '</p>' . "\n"
        . '<!-- /wp:paragraph --></div>' . "\n"
        . '<!-- /wp:group -->' . "\n\n";
}

// Promo banner (also offered as its own pattern so the client can add it back after deleting it)
function asf_home_promo_banner() {
    return '<!-- wp:group {"metadata":{"name":"Promo banner"},"className":"promo-banner","layout":{"type":"default"}} -->' . "\n"
        . '<div class="wp-block-group promo-banner"><!-- wp:group {"className":"promo-banner-inner","layout":{"type":"default"}} -->' . "\n"
        . '<div class="wp-block-group promo-banner-inner"><!-- wp:paragraph {"className":"promo-label"} -->' . "\n"
        . '<p class="promo-label">Limited Time Offer</p>' . "\n"
        . '<!-- /wp:paragraph -->' . "\n\n"
        . '<!-- wp:paragraph {"className":"promo-headline"} -->' . "\n"
        . '<p class="promo-headline">Summer Camp Promo! Register for 2 weeks &amp; <strong>SAVE $30 on your second week!</strong></p>' . "\n"
        . '<!-- /wp:paragraph -->' . "\n\n"
        . '<!-- wp:paragraph {"className":"promo-fine"} -->' . "\n"
        . '<p class="promo-fine">Promo applies to max 3 weeks. Valid June 18 – July 31, 2026. Cannot be combined with other promotions.</p>' . "\n"
        . '<!-- /wp:paragraph -->' . "\n\n"
        . '<!-- wp:buttons -->' . "\n"
        . '<div class="wp-block-buttons"><!-- wp:button {"className":"btn-promo"} -->' . "\n"
        . '<div class="wp-block-button btn-promo"><a class="wp-block-button__link wp-element-button" href="' . esc_url( home_url( '/camp/' ) ) . '">Register for Summer Camp</a></div>' . "\n"
        . '<!-- /wp:button --></div>' . "\n"
        . '<!-- /wp:buttons --></div>' . "\n"
        . '<!-- /wp:group --></div>' . "\n"
        . '<!-- /wp:group -->' . "\n\n";
}

/* ── INSTAGRAM FEED SLOT ── */
// The home page has a Shortcode block with [instagram-feed] (Smash Balloon "Instagram Feed" plugin).
// Until that plugin is active, show the placeholder grid instead of the raw shortcode text;
// the "plugin connects here" note is only shown to people who can edit the site.
function asf_instagram_fallback( $content, $block ) {
    if ( 'core/shortcode' !== $block['blockName'] || false === strpos( $content, '[instagram-feed' ) || shortcode_exists( 'instagram-feed' ) ) {
        return $content;
    }
    $grid = '<div class="instagram-grid">' . str_repeat( '<div class="insta-thumb"></div>', 12 ) . '</div>';
    if ( current_user_can( 'edit_pages' ) ) {
        $grid .= '<p class="instagram-note">Instagram feed plugin connects here</p>';
    }
    return $grid;
}
add_filter( 'render_block', 'asf_instagram_fallback', 10, 2 );
