<?php
defined( 'ABSPATH' ) || exit;

// ── Theme setup ──────────────────────────────────────────────────────────────
function asf_setup() {
    load_theme_textdomain( 'asf', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ] );

    register_nav_menus( [
        'primary'      => __( 'Primary Navigation', 'asf' ),
        'footer-pages' => __( 'Footer Pages',       'asf' ),
        'footer-quick' => __( 'Footer Quick Links',  'asf' ),
    ] );
}
add_action( 'after_setup_theme', 'asf_setup' );

// ── Enqueue assets ───────────────────────────────────────────────────────────
function asf_enqueue() {
    wp_enqueue_style(
        'asf-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'asf-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'asf-fonts' ],
        wp_get_theme()->get( 'Version' )
    );
    // Lucide icons CDN — required by the Camp page tab icons
    wp_enqueue_script(
        'lucide',
        'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js',
        [],
        null,
        true
    );
    wp_enqueue_script(
        'asf-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [ 'lucide' ],
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'asf_enqueue' );

// ── Customizer settings ──────────────────────────────────────────────────────
function asf_customizer( $wp_customize ) {

    // ── Promo Banner ──
    $wp_customize->add_section( 'asf_promo', [
        'title'    => __( 'Promo Banner', 'asf' ),
        'priority' => 30,
    ] );
    $wp_customize->add_setting( 'asf_promo_enabled', [ 'default' => '1', 'sanitize_callback' => 'absint' ] );
    $wp_customize->add_control( 'asf_promo_enabled', [
        'label'   => __( 'Show promo banner', 'asf' ),
        'section' => 'asf_promo',
        'type'    => 'checkbox',
    ] );
    $wp_customize->add_setting( 'asf_promo_headline', [
        'default'           => 'Summer Camp Promo! Register for 2 weeks & SAVE $30 on your second week!',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'asf_promo_headline', [
        'label'   => __( 'Promo headline', 'asf' ),
        'section' => 'asf_promo',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'asf_promo_fine', [
        'default'           => 'Promo applies to max 3 weeks. Valid June 18 – July 31, 2026. Cannot be combined with other promotions.',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'asf_promo_fine', [
        'label'   => __( 'Fine print', 'asf' ),
        'section' => 'asf_promo',
        'type'    => 'textarea',
    ] );
    $wp_customize->add_setting( 'asf_promo_btn_text', [ 'default' => 'Register for Summer Camp →', 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'asf_promo_btn_text', [
        'label'   => __( 'Button text', 'asf' ),
        'section' => 'asf_promo',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'asf_promo_btn_url', [ 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ] );
    $wp_customize->add_control( 'asf_promo_btn_url', [
        'label'   => __( 'Button URL (external — opens new tab)', 'asf' ),
        'section' => 'asf_promo',
        'type'    => 'url',
    ] );

    // ── Contact info ──
    $wp_customize->add_section( 'asf_contact', [
        'title'    => __( 'Contact Info', 'asf' ),
        'priority' => 40,
    ] );
    foreach ( [
        'asf_address'          => [ 'Address',          '123 Gymnastics Dr, Unit 5, Richmond Hill, ON' ],
        'asf_phone'            => [ 'Phone',             '905-XXX-XXXX' ],
        'asf_email'            => [ 'Email',             'academysportfitness@gmail.com' ],
        'asf_hours'            => [ 'Office Hours',      "Mon–Wed: 9am–9pm\nThu–Fri: 12pm–9pm\nSat: 9am–5pm\nSun: Closed" ],
        'asf_instagram'        => [ 'Instagram URL',     'https://www.instagram.com/asfgymnastics/' ],
        'asf_instagram_handle' => [ 'Instagram Handle',  '@asfgymnastics' ],
    ] as $id => [ $label, $default ] ) {
        $wp_customize->add_setting( $id, [ 'default' => $default, 'sanitize_callback' => 'sanitize_textarea_field' ] );
        $wp_customize->add_control( $id, [
            'label'   => __( $label, 'asf' ),
            'section' => 'asf_contact',
            'type'    => str_contains( $default, "\n" ) ? 'textarea' : 'text',
        ] );
    }

    // ── Hero ──
    $wp_customize->add_section( 'asf_hero', [
        'title'    => __( 'Hero Slideshow', 'asf' ),
        'priority' => 25,
    ] );
    $wp_customize->add_setting( 'asf_hero_tagline', [ 'default' => 'Serving the Greater Toronto Area', 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'asf_hero_tagline', [
        'label'   => __( 'Eyebrow tagline', 'asf' ),
        'section' => 'asf_hero',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'asf_hero_title', [ 'default' => 'Where Every Child Finds Their Strength', 'sanitize_callback' => 'sanitize_text_field' ] );
    $wp_customize->add_control( 'asf_hero_title', [
        'label'   => __( 'Hero headline', 'asf' ),
        'section' => 'asf_hero',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'asf_hero_sub', [
        'default'           => 'Recreational gymnastics, competitive programs, and summer camps for kids of all ages in Richmond Hill, Markham & York Region.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'asf_hero_sub', [
        'label'   => __( 'Hero subheadline', 'asf' ),
        'section' => 'asf_hero',
        'type'    => 'textarea',
    ] );
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "asf_slide_{$i}_img", [ 'default' => '', 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "asf_slide_{$i}_img", [
            'label'   => sprintf( __( 'Slide %d image', 'asf' ), $i ),
            'section' => 'asf_hero',
        ] ) );
    }

    // ── Video ──
    $wp_customize->add_section( 'asf_video', [
        'title'    => __( 'Home Page Video', 'asf' ),
        'priority' => 27,
    ] );
    $wp_customize->add_setting( 'asf_video_url', [
        'default'           => 'https://www.youtube.com/watch?v=hQQETAwkEvo',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'asf_video_url', [
        'label'       => __( 'YouTube or Vimeo URL', 'asf' ),
        'description' => __( 'Paste the full video URL. WordPress embeds it automatically.', 'asf' ),
        'section'     => 'asf_video',
        'type'        => 'url',
    ] );
}
add_action( 'customize_register', 'asf_customizer' );

// ── Helper: get customizer value ─────────────────────────────────────────────
function asf_opt( $key, $fallback = '' ) {
    return get_theme_mod( $key, $fallback );
}

// ── Helper: is a URL external to this site? ──────────────────────────────────
function asf_is_external( $url ) {
    if ( ! $url || $url === '#' ) return false;
    $home = wp_parse_url( home_url() );
    $link = wp_parse_url( $url );
    if ( empty( $link['host'] ) ) return false;
    return $link['host'] !== $home['host'];
}

// ── Helper: link target attribute ────────────────────────────────────────────
// Returns ' target="_blank" rel="noopener noreferrer"' for external URLs only.
function asf_target( $url ) {
    return asf_is_external( $url ) ? ' target="_blank" rel="noopener noreferrer"' : '';
}

// ── Helper: SVG icons ────────────────────────────────────────────────────────
function asf_icon( $name, $size = 24 ) {
    $icons = [
        // Lucide person-standing — recreational
        'gymnastics'  => '<g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8 L6 2 M12 8 L18 2 M12 8 L12 14 M12 14 L4 20 M12 14 L20 20"/><circle cx="12" cy="17" r="1.5"/></g>',
        // Lucide trophy — competitive program
        'trophy'      => '<g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"/><path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"/><path d="M18 9h1.5a1 1 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"/><path d="M6 9H4.5a1 1 0 0 1 0-5H6"/></g>',
        // Lucide star — Xcel / Advanced
        'star'        => '<g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></g>',
        // Lucide sun — summer camps
        'sun'         => '<g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></g>',
        // Lucide balloon — birthdays
        'balloon'     => '<g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 16v1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v1"/><path d="M12 6a2 2 0 0 1 2 2"/><path d="M18 8c0 4-3.5 8-6 8s-6-4-6-8a6 6 0 0 1 12 0"/></g>',
        'location'    => '<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>',
        'phone'       => '<path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z" fill="currentColor"/>',
        'email'       => '<path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/>',
        'clock'       => '<path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z" fill="currentColor"/>',
        'instagram'   => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/>',
        'menu'        => '<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" fill="currentColor"/>',
        'close'       => '<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" fill="currentColor"/>',
        'chevron-down'=> '<path d="M7 10l5 5 5-5H7z" fill="currentColor"/>',
        'pdf'         => '<path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z" fill="currentColor"/>',
        'arrow-right' => '<path d="M8 5v14l11-7z" fill="currentColor"/>',
        'external'    => '<path d="M19 19H5V5h7V3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" fill="currentColor"/>',
    ];
    $path = $icons[ $name ] ?? '';
    return sprintf(
        '<svg xmlns="http://www.w3.org/2000/svg" width="%1$d" height="%1$d" viewBox="0 0 24 24" aria-hidden="true">%2$s</svg>',
        $size,
        $path
    );
}

// ── Walker: sidebar / dropdown nav menu ──────────────────────────────────────
class ASF_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="nav-dropdown">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item         = $data_object;
        $classes      = empty( $item->classes ) ? [] : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes, true );
        $is_active    = in_array( 'current-menu-item', $classes, true )
                     || in_array( 'current-menu-ancestor', $classes, true );

        $li_class = $is_active ? ' class="active"' : '';
        $output  .= "<li{$li_class}>";

        $url    = esc_url( $item->url );
        $title  = esc_html( $item->title );
        // Only open in new tab if the URL is external to this site.
        $target = asf_is_external( $url ) ? ' target="_blank" rel="noopener noreferrer"' : '';

        if ( $depth === 0 && $has_children ) {
            // Parent item: button toggles the sub-menu
            $output .= "<button class=\"nav-parent\" aria-expanded=\"false\">"
                     . $title
                     . '<span class="nav-chevron" aria-hidden="true">' . asf_icon( 'chevron-down', 16 ) . '</span>'
                     . '</button>';
        } else {
            $output .= "<a href=\"{$url}\"{$target}>{$title}</a>";
        }
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
