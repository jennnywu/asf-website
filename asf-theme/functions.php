<?php
/* ── HELPER ── */
// A Customizer value, or its default from asf_defaults() (inc/site.php)
function asf_opt( $key, $fallback = null ) {
    if ( null === $fallback ) {
        $defaults = asf_defaults();
        $fallback = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
    }
    return get_theme_mod( $key, $fallback );
}

/* ── ENQUEUE SCRIPTS & STYLES ── */
// Version = the file's last-modified time, so browsers fetch a fresh copy whenever a file changes
function asf_asset( $path ) {
    return [ get_template_directory_uri() . "/$path", (string) filemtime( get_template_directory() . "/$path" ) ];
}

function asf_scripts() {
    wp_enqueue_style(
        'asf-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap',
        [],
        null
    );
    [ $url, $ver ] = asf_asset( 'assets/css/main.css' );
    wp_enqueue_style( 'asf-main', $url, [ 'asf-fonts' ], $ver );
    [ $url, $ver ] = asf_asset( 'assets/js/nav.js' );
    wp_enqueue_script( 'asf-nav', $url, [], $ver, true );

    // Page-specific script: assets/js/pages/{slug}.js
    $slug = asf_current_page_slug();
    if ( $slug && file_exists( get_template_directory() . "/assets/js/pages/$slug.js" ) ) {
        [ $url, $ver ] = asf_asset( "assets/js/pages/$slug.js" );
        wp_enqueue_script( "asf-page-$slug", $url, [], $ver, true );
    }
}
add_action( 'wp_enqueue_scripts', 'asf_scripts' );

// Block styles and page-specific CSS (assets/css/pages/{slug}.css), on the site and in the page editor
function asf_block_assets() {
    // On the site these load after main.css so page rules win, as in the original HTML
    // (in the editor main.css is an editor style, so there's nothing to wait for)
    [ $url, $ver ] = asf_asset( 'assets/css/blocks.css' );
    wp_enqueue_style( 'asf-blocks', $url, is_admin() ? [] : [ 'asf-main' ], $ver );
    $slug = asf_current_page_slug();
    if ( $slug && file_exists( get_template_directory() . "/assets/css/pages/$slug.css" ) ) {
        [ $url, $ver ] = asf_asset( "assets/css/pages/$slug.css" );
        wp_enqueue_style( "asf-page-$slug", $url, [ 'asf-blocks' ], $ver );
    }
}
add_action( 'enqueue_block_assets', 'asf_block_assets', 20 );

// Slug used to pick page-specific files: "home" on the front page, otherwise the page's slug.
// In the editor it comes from the page being edited.
function asf_current_page_slug() {
    if ( is_admin() ) {
        $post = get_post();
        if ( ! $post || 'page' !== $post->post_type ) {
            return '';
        }
        return (int) get_option( 'page_on_front' ) === $post->ID ? 'home' : $post->post_name;
    }
    if ( is_front_page() ) {
        return 'home';
    }
    return is_page() ? get_post_field( 'post_name', get_queried_object_id() ) : '';
}

// Show text exactly as typed: WordPress would otherwise turn " - " into a dash and "..." into "…"
add_filter( 'run_wptexturize', '__return_false' );

/* ── PAGE HELPERS ── */
// Page-specific pattern builders live in /inc (one file per page)
foreach ( glob( get_template_directory() . '/inc/*.php' ) as $asf_inc ) {
    require_once $asf_inc;
}

/* ── THEME SETUP ── */
function asf_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    // Load the site's own stylesheet in the page editor so it looks like the live page
    add_theme_support( 'editor-styles' );
    add_editor_style( [
        str_replace( ',', '%2C', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap' ),
        'assets/css/main.css',
        'assets/css/editor.css',
    ] );
}
add_action( 'after_setup_theme', 'asf_theme_setup' );

/* ── BLOCK PATTERNS ── */
// Pattern files live in /patterns and are registered by WordPress automatically
function asf_pattern_category() {
    register_block_pattern_category( 'asf', [ 'label' => __( 'ASF Gymnastics', 'asf' ) ] );
}
add_action( 'init', 'asf_pattern_category' );

// Rendered pattern markup, used as a page's default until the client saves their own content
function asf_pattern_content( $slug ) {
    $pattern = WP_Block_Patterns_Registry::get_instance()->get_registered( $slug );
    // Same filters as saved page content (blocks, embeds, shortcodes)
    return $pattern ? apply_filters( 'the_content', $pattern['content'] ) : '';
}
// Block markup for one coach card (shared by the Coach and Coaching Team page patterns)
function asf_coach_block( $photo, $name, $title, $bio ) {
    $lock = '"lock":{"move":true,"remove":true}';
    $out  = '<!-- wp:group {"metadata":{"name":"Coach"},"className":"coach-card","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group coach-card">';
    $out .= '<!-- wp:image {"sizeSlug":"full",' . $lock . ',"className":"coach-photo"} -->' . "\n";
    // No photo shows the editor's Upload / Media Library box instead of an image
    $img  = $photo ? '<img src="' . esc_url( $photo ) . '" alt="' . esc_attr( $name ) . '"/>' : '<img alt=""/>';
    $out .= '<figure class="wp-block-image size-full coach-photo">' . $img . '</figure>' . "\n";
    $out .= '<!-- /wp:image -->' . "\n\n";
    $out .= '<!-- wp:group {"metadata":{"name":"Coach details"},' . $lock . ',"className":"coach-info","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group coach-info">';
    $out .= '<!-- wp:heading {' . $lock . ',"className":"coach-name"} -->' . "\n";
    $out .= '<h2 class="wp-block-heading coach-name">' . esc_html( $name ) . '</h2>' . "\n";
    $out .= '<!-- /wp:heading -->' . "\n\n";
    $out .= '<!-- wp:paragraph {' . $lock . ',"className":"coach-title"} -->' . "\n";
    $out .= '<p class="coach-title">' . esc_html( $title ) . '</p>' . "\n";
    $out .= '<!-- /wp:paragraph -->' . "\n\n";
    $out .= '<!-- wp:group {"metadata":{"name":"Coach bio"},' . $lock . ',"className":"coach-bio","layout":{"type":"default"}} -->' . "\n";
    $out .= '<div class="wp-block-group coach-bio">';
    foreach ( $bio as $para ) {
        $out .= '<!-- wp:paragraph -->' . "\n" . '<p>' . esc_html( $para ) . '</p>' . "\n" . '<!-- /wp:paragraph -->' . "\n\n";
    }
    $out .= '</div>' . "\n" . '<!-- /wp:group --></div>' . "\n" . '<!-- /wp:group --></div>' . "\n" . '<!-- /wp:group -->' . "\n\n";
    return $out;
}

/* ── ADMIN BAR OFFSET ── */
function asf_admin_bar_css() {
    if ( is_admin_bar_showing() ) {
        echo '<style>
        #wpadminbar { position: fixed; }
        body.admin-bar #site-nav { top: 32px; }
        @media screen and (max-width:782px) {
            body.admin-bar #site-nav { top: 46px; }
            body.admin-bar .mobile-topbar { top: 46px; }
        }
        </style>';
    }
}
add_action( 'wp_head', 'asf_admin_bar_css' );

/* ── CUSTOMIZER ── */
function asf_customize_register( $wp_customize ) {

    $defaults = asf_defaults();

    /* Sidebar & Footer (contact details, hours, logos) */
    $wp_customize->add_section( 'asf_contact', [
        'title'       => __( 'Sidebar & Footer', 'asf' ),
        'description' => __( 'Details shown in the left sidebar and the footer on every page. Links in the sidebar and footer columns are edited in Appearance → Menus. The main logo is under Site Identity.', 'asf' ),
        'priority'    => 30,
    ] );
    $fields = [
        'asf_logo_text'        => [ 'Name next to the logo (new line = line break)', 'textarea', 'sanitize_textarea_field' ],
        'asf_business_name'    => [ 'Business name (mobile top bar and copyright line)', 'text', 'sanitize_text_field' ],
        'asf_address'          => [ 'Address (also used for the Google Maps link)', 'textarea', 'sanitize_textarea_field' ],
        'asf_phone'            => [ 'Phone', 'text', 'sanitize_text_field' ],
        'asf_email'            => [ 'Email', 'email', 'sanitize_email' ],
        'asf_contact_heading'  => [ 'Footer contact column heading', 'text', 'sanitize_text_field' ],
        'asf_hours_heading'    => [ 'Open hours heading', 'text', 'sanitize_text_field' ],
        'asf_hours'            => [ 'Open hours (one line per row)', 'textarea', 'sanitize_textarea_field' ],
        'asf_footer_tagline'   => [ 'Footer description', 'textarea', 'sanitize_textarea_field' ],
        'asf_instagram_url'    => [ 'Instagram link (footer button)', 'url', 'esc_url_raw' ],
        'asf_cta_text'         => [ 'Sidebar button text', 'text', 'sanitize_text_field' ],
        'asf_registration_url' => [ 'Sidebar button link (Jackrabbit registration)', 'url', 'esc_url_raw' ],
    ];
    foreach ( $fields as $key => $field ) {
        $wp_customize->add_setting( $key, [
            'default'           => $defaults[ $key ],
            'sanitize_callback' => $field[2],
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( $key, [
            'label'   => $field[0],
            'section' => 'asf_contact',
            'type'    => $field[1],
        ] );
    }
    $logos = [
        'asf_footer_logo_1' => 'Footer logo 1 (Gymnastics Ontario)',
        'asf_footer_logo_2' => 'Footer logo 2 (NCCP)',
    ];
    foreach ( $logos as $key => $label ) {
        $wp_customize->add_setting( $key, [
            'default'           => $defaults[ $key ],
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, [
            'label'   => $label,
            'section' => 'asf_contact',
        ] ) );
    }

    /* Brand Colors */
    $wp_customize->add_section( 'asf_colors', [
        'title'    => __( 'Brand Colors', 'asf' ),
        'priority' => 40,
    ] );
    $colors = [
        'asf_color_seashell'      => [ 'label' => 'Seashell',      'default' => '#FCF0EE' ],
        'asf_color_almond_silk'   => [ 'label' => 'Almond Silk',   'default' => '#DAC9C6' ],
        'asf_color_brick_red'     => [ 'label' => 'Brick Red',     'default' => '#A93D2B' ],
        'asf_color_oxidized_iron' => [ 'label' => 'Oxidized Iron', 'default' => '#9B2616' ],
        'asf_color_dark_garnet'   => [ 'label' => 'Dark Garnet',   'default' => '#581409' ],
    ];
    foreach ( $colors as $key => $args ) {
        $wp_customize->add_setting( $key, [
            'default'           => $args['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, [
            'label'   => __( $args['label'], 'asf' ),
            'section' => 'asf_colors',
        ] ) );
    }
}
add_action( 'customize_register', 'asf_customize_register' );

/* ── OUTPUT CSS VARIABLES ── */
function asf_output_colors() {
    $seashell      = asf_opt( 'asf_color_seashell',      '#FCF0EE' );
    $almond_silk   = asf_opt( 'asf_color_almond_silk',   '#DAC9C6' );
    $brick_red     = asf_opt( 'asf_color_brick_red',     '#A93D2B' );
    $oxidized_iron = asf_opt( 'asf_color_oxidized_iron', '#9B2616' );
    $dark_garnet   = asf_opt( 'asf_color_dark_garnet',   '#581409' );
    echo '<style id="asf-brand-colors">:root{';
    echo '--seashell:'      . esc_attr( $seashell )      . ';';
    echo '--almond-silk:'   . esc_attr( $almond_silk )   . ';';
    echo '--brick-red:'     . esc_attr( $brick_red )     . ';';
    echo '--oxidized-iron:' . esc_attr( $oxidized_iron ) . ';';
    echo '--dark-garnet:'   . esc_attr( $dark_garnet )   . ';';
    echo '}</style>' . "\n";
}
add_action( 'wp_head', 'asf_output_colors' );
