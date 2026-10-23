<?php
/* ================================================================
   Site-wide parts the client edits outside the page editor:
   menus (Appearance → Menus) and the nav/footer details (Appearance → Customize)
   ================================================================ */

/* ── DEFAULTS ── */
// One place for every default, so the header, footer and Customizer always agree
function asf_defaults() {
    return [
        'asf_logo_text'      => "Academy of Sport\nand Fitness",
        'asf_business_name'  => 'Academy of Sport and Fitness',
        'asf_address'        => "40 Vogell Road, Unit #32\nRichmond Hill, Ontario L4B 3N6",
        'asf_phone'          => '905-780-0913',
        'asf_email'          => 'academysportfitness@gmail.com',
        'asf_contact_heading' => 'Location & Contact',
        'asf_hours_heading'  => 'Open Hours',
        'asf_hours'          =>"Mon, Tue, Thu: 12pm–8:30pm\nWed: 2:30pm–8:30pm\nFri: 12pm–8pm\nSat–Sun: 9:30am–5pm",
        'asf_footer_tagline' => 'We foster complete child development - physically & emotionally. Serving Richmond Hill, Markham, and the Greater York Region.',
        'asf_instagram_url'  => 'https://www.instagram.com/asfgymnastics/',
        'asf_cta_text'       => 'Register Now',
        'asf_registration_url' => 'https://app.jackrabbitclass.com/regv2.asp?id=540626',
        'asf_footer_logo_1'  => get_template_directory_uri() . '/assets/images/logo-recasf.png',
        'asf_footer_logo_2'  => get_template_directory_uri() . '/assets/images/logo-nccp.png',
    ];
}

// Logo shown in the nav, mobile bar and footer: Customize → Site Identity → Logo, or the theme's logo
function asf_logo_url() {
    $id = get_theme_mod( 'custom_logo' );
    $url = $id ? wp_get_attachment_image_url( $id, 'full' ) : '';
    return $url ? $url : get_template_directory_uri() . '/assets/images/logo.png';
}

// Google Maps link for the address set in the Customizer
function asf_maps_url() {
    return 'https://maps.google.com/?q=' . rawurlencode( preg_replace( '/\s+/', ' ', asf_opt( 'asf_address' ) ) );
}

// Small "opens in a new tab" icon used after external nav links
function asf_external_icon() {
    return '&nbsp;<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>';
}

/* ── MENUS ── */
function asf_register_menus() {
    register_nav_menus( [
        'primary'         => __( 'Sidebar Navigation', 'asf' ),
        'footer-programs' => __( 'Footer: Programs column', 'asf' ),
        'footer-quick'    => __( 'Footer: Quick Links column', 'asf' ),
    ] );
}
add_action( 'after_setup_theme', 'asf_register_menus' );

// Starting links for each menu; used to create the menus on theme activation and
// as a fallback if a menu location is ever left empty. [ title, url, children[] ]
function asf_default_menus() {
    $pdf  = 'https://academysportfitness.ca/wp-content/uploads/2025/06/Academy-Policies-25-26.pdf';
    $jr   = 'https://app.jackrabbitclass.com/regv2.asp?id=540626';
    $port = 'https://app.jackrabbitclass.com/jr3.0/ParentPortal/Login?orgID=540626';
    return [
        'primary' => [ 'Sidebar Navigation', [
            [ 'Home', '/' ],
            [ 'About', '#', [
                [ 'Our Facility', '/our-facility/' ],
                [ 'Location & Contact', '/location-contact/' ],
                [ 'Benefits', '/benefits/' ],
                [ 'Coaching Team', '/coaching-team/' ],
                [ 'Policies (PDF)', $pdf ],
            ] ],
            [ 'Programs', '#', [
                [ 'Find the Right Program', '/which-program/' ],
                [ 'Camps', '/camp/' ],
                [ 'Recreational Classes', '/recreational-classes/' ],
                [ 'Xcel / Advanced', '/xcel/' ],
                [ 'Competitive Team', '/competitive-team/' ],
                [ 'Birthday Parties', '/birthday/' ],
            ] ],
            [ 'Gallery', '/gallery/' ],
            [ 'Family Portal', '#', [
                [ 'Sign Up', $jr ],
                [ 'Log In', $port ],
            ] ],
        ] ],
        'footer-programs' => [ 'Programs', [
            [ 'Recreational Classes', '/recreational-classes/' ],
            [ 'Competitive Team', '/competitive-team/' ],
            [ 'Xcel / Advanced', '/xcel/' ],
            [ 'Summer Camp', '/camp/#panel-summer' ],
            [ 'Winter Camp', '/camp/#panel-winter' ],
            [ 'March Break Camp', '/camp/#panel-marchbreak' ],
        ] ],
        'footer-quick' => [ 'Quick Links', [
            [ 'About ASF', '/our-facility/' ],
            [ 'Coaching Team', '/coaching-team/' ],
            [ 'Family Portal', $port ],
            [ 'Staff Portal', 'https://app.jackrabbitclass.com/jr3.0/TimeClock/StaffLogin?OrgId=540626&sId=6b551da4-ce01-4f84-93cd-3070660bcdcf&loc=ACADEMY' ],
            [ 'Policies (PDF)', $pdf ],
            [ 'Assessment Form', 'https://docs.google.com/forms/d/e/1FAIpQLSeGI9-S27g814u1JuJN66jXMPEFzDr7q_HO4TTykKR-nlzwiQ/viewform?usp=send_form' ],
        ] ],
    ];
}

// Site paths become full links on this site; anything starting with http stays as is
function asf_menu_url( $url ) {
    return '/' === $url[0] ? home_url( $url ) : $url;
}

// External links open in a new tab, internal links stay in the same tab
function asf_is_external( $url ) {
    $host = wp_parse_url( $url, PHP_URL_HOST );
    return $host && $host !== wp_parse_url( home_url(), PHP_URL_HOST );
}

// On theme activation, create any menu that isn't set up yet so the client can edit it straight away
function asf_create_default_menus() {
    $locations = get_theme_mod( 'nav_menu_locations', [] );
    foreach ( asf_default_menus() as $location => $menu ) {
        if ( ! empty( $locations[ $location ] ) ) {
            continue;
        }
        $existing = wp_get_nav_menu_object( $menu[0] );
        $menu_id  = $existing ? $existing->term_id : wp_create_nav_menu( $menu[0] );
        if ( is_wp_error( $menu_id ) ) {
            continue;
        }
        if ( ! $existing ) {
            asf_add_menu_items( $menu_id, $menu[1], 0 );
        }
        $locations[ $location ] = $menu_id;
    }
    set_theme_mod( 'nav_menu_locations', $locations );
}
add_action( 'after_switch_theme', 'asf_create_default_menus' );

function asf_add_menu_items( $menu_id, $items, $parent ) {
    foreach ( $items as $item ) {
        $url = asf_menu_url( $item[1] );
        $id  = wp_update_nav_menu_item( $menu_id, 0, [
            'menu-item-title'     => $item[0],
            'menu-item-url'       => $url,
            'menu-item-status'    => 'publish',
            'menu-item-type'      => 'custom',
            'menu-item-parent-id' => $parent,
            'menu-item-target'    => asf_is_external( $url ) ? '_blank' : '',
        ] );
        if ( ! empty( $item[2] ) && ! is_wp_error( $id ) ) {
            asf_add_menu_items( $menu_id, $item[2], $id );
        }
    }
}

// Links set to open in a new tab also get rel="noopener noreferrer"
function asf_menu_link_rel( $atts ) {
    if ( isset( $atts['target'] ) && '_blank' === $atts['target'] ) {
        $atts['rel'] = 'noopener noreferrer';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'asf_menu_link_rel' );

// Sidebar menu markup: items with sub-items become the fold-out buttons the nav script expects
class ASF_Sidebar_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="nav-dropdown">';
    }
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $title = esc_html( $item->title );
        if ( 0 === $depth && $this->has_children ) {
            $output .= '<li><button class="nav-parent" aria-expanded="false">' . $title
                . '<span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5H7z"/></svg></span></button>';
            return;
        }
        $new_tab = '_blank' === $item->target;
        $output .= '<li><a href="' . esc_url( $item->url ) . '"'
            . ( $new_tab ? ' target="_blank" rel="noopener noreferrer"' : '' ) . '>'
            . $title . ( $new_tab && $depth > 0 ? asf_external_icon() : '' ) . '</a>';
    }
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

// Prints a menu location; falls back to the default links if no menu is assigned
function asf_menu( $location, $class = '' ) {
    $wrap = '<ul' . ( $class ? ' class="' . esc_attr( $class ) . '"' : '' ) . '>%3$s</ul>';
    if ( has_nav_menu( $location ) ) {
        wp_nav_menu( [
            'theme_location' => $location,
            'container'      => false,
            'items_wrap'     => $wrap,
            'depth'          => 'primary' === $location ? 2 : 1,
            'walker'         => 'primary' === $location ? new ASF_Sidebar_Walker() : '',
        ] );
        return;
    }
    echo sprintf( $wrap, '', '', asf_default_menu_html( asf_default_menus()[ $location ][1], 'primary' === $location ) );
}

function asf_default_menu_html( $items, $sidebar, $depth = 0 ) {
    $html = '';
    foreach ( $items as $item ) {
        $title = esc_html( $item[0] );
        if ( $sidebar && ! empty( $item[2] ) ) {
            $html .= '<li><button class="nav-parent" aria-expanded="false">' . $title
                . '<span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5H7z"/></svg></span></button>'
                . '<ul class="nav-dropdown">' . asf_default_menu_html( $item[2], true, 1 ) . '</ul></li>';
            continue;
        }
        $url     = asf_menu_url( $item[1] );
        $new_tab = asf_is_external( $url );
        $html .= '<li><a href="' . esc_url( $url ) . '"' . ( $new_tab ? ' target="_blank" rel="noopener noreferrer"' : '' ) . '>'
            . $title . ( $sidebar && $new_tab && $depth > 0 ? asf_external_icon() : '' ) . '</a></li>';
    }
    return $html;
}

// Footer column heading = the menu's name (rename the menu in Appearance → Menus to change it)
function asf_menu_heading( $location ) {
    $name = has_nav_menu( $location ) ? wp_get_nav_menu_name( $location ) : '';
    return $name ? $name : asf_default_menus()[ $location ][0];
}
