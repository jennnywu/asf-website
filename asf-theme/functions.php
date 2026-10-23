<?php
/* ── HELPER ── */
function asf_opt( $key, $fallback = '' ) {
    return get_theme_mod( $key, $fallback );
}

/* ── ENQUEUE SCRIPTS & STYLES ── */
function asf_scripts() {
    $v = wp_get_theme()->get( 'Version' );
    wp_enqueue_style(
        'asf-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'asf-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'asf-fonts' ],
        $v
    );
    wp_enqueue_script(
        'asf-nav',
        get_template_directory_uri() . '/assets/js/nav.js',
        [],
        $v,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'asf_scripts' );

/* ── THEME SETUP ── */
function asf_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'asf' ),
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
    return $pattern ? do_blocks( $pattern['content'] ) : '';
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

    /* Contact Info */
    $wp_customize->add_section( 'asf_contact', [
        'title'    => __( 'Contact Info', 'asf' ),
        'priority' => 30,
    ] );
    $contact_fields = [
        'asf_address'        => [ 'label' => 'Address',         'default' => '40 Vogell Road, Unit 32, Richmond Hill, ON L4B 3N6' ],
        'asf_phone'          => [ 'label' => 'Phone',           'default' => '905-780-0913' ],
        'asf_email'          => [ 'label' => 'Email',           'default' => 'info@academysportfitness.ca' ],
        'asf_footer_tagline' => [ 'label' => 'Footer Tagline',  'default' => 'Richmond Hill\'s gymnastics home since 1998.' ],
    ];
    foreach ( $contact_fields as $key => $args ) {
        $wp_customize->add_setting( $key, [
            'default'           => $args['default'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ] );
        $wp_customize->add_control( $key, [
            'label'   => __( $args['label'], 'asf' ),
            'section' => 'asf_contact',
            'type'    => 'text',
        ] );
    }

    /* Registration */
    $wp_customize->add_section( 'asf_registration', [
        'title'    => __( 'Registration', 'asf' ),
        'priority' => 35,
    ] );
    $wp_customize->add_setting( 'asf_registration_url', [
        'default'           => 'https://app.jackrabbitclass.com/regv2.asp?id=540626',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ] );
    $wp_customize->add_control( 'asf_registration_url', [
        'label'   => __( 'Jackrabbit Registration Base URL', 'asf' ),
        'section' => 'asf_registration',
        'type'    => 'url',
    ] );

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
