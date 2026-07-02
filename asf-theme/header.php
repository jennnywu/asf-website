<?php
/**
 * ASF Theme header — outputs <head>, mobile topbar, sidebar nav, opens .site-wrapper
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/web/logo.png" type="image/png">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $asf_phone = asf_opt( 'asf_phone', '905-780-0913' ); ?>

<!-- ── MOBILE TOPBAR ── -->
<div class="mobile-topbar" id="mobile-topbar">
  <a class="mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/web/logo.png" alt="ASF Logo">
    <span>Academy of<br>Sport &amp; Fitness</span>
  </a>
  <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Open menu" aria-expanded="false">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
      <line x1="3" y1="6"  x2="21" y2="6"/>
      <line x1="3" y1="12" x2="21" y2="12"/>
      <line x1="3" y1="18" x2="21" y2="18"/>
    </svg>
  </button>
</div>

<div class="nav-overlay" id="nav-overlay"></div>

<!-- ── SIDEBAR NAV ── -->
<nav id="site-nav" aria-label="Main navigation">
  <div class="nav-header">
    <a class="nav-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/web/logo.png" alt="ASF Logo">
      <div class="nav-logo-text">
        <span class="nav-logo-name">Academy of Sport &amp; Fitness</span>
        <span class="nav-logo-sub">Richmond Hill Gymnastics</span>
      </div>
    </a>
  </div>

  <div class="nav-body">
    <ul class="nav-links">
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link">Home</a></li>

      <li class="nav-parent">
        <button class="nav-link nav-parent-btn" aria-expanded="false">
          About
          <svg class="nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-sub">
          <li><a href="<?php echo esc_url( home_url( '/our-facility/' ) ); ?>" class="nav-sub-link">Our Facility</a></li>
          <li><a href="<?php echo esc_url( home_url( '/coaching-team/' ) ); ?>" class="nav-sub-link">Coaching Team</a></li>
          <li><a href="<?php echo esc_url( home_url( '/benefits/' ) ); ?>" class="nav-sub-link">Benefits of Gymnastics</a></li>
          <li><a href="<?php echo esc_url( home_url( '/location-contact/' ) ); ?>" class="nav-sub-link">Location &amp; Contact</a></li>
        </ul>
      </li>

      <li class="nav-parent">
        <button class="nav-link nav-parent-btn" aria-expanded="false">
          Programs
          <svg class="nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-sub">
          <li><a href="<?php echo esc_url( home_url( '/recreational-classes/' ) ); ?>" class="nav-sub-link">Recreational Classes</a></li>
          <li><a href="<?php echo esc_url( home_url( '/xcel/' ) ); ?>" class="nav-sub-link">Xcel / Advanced</a></li>
          <li><a href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>" class="nav-sub-link">Competitive Team</a></li>
          <li><a href="<?php echo esc_url( home_url( '/camp/' ) ); ?>" class="nav-sub-link">Camp</a></li>
          <li><a href="<?php echo esc_url( home_url( '/birthday/' ) ); ?>" class="nav-sub-link">Birthday Parties</a></li>
          <li><a href="<?php echo esc_url( home_url( '/which-program/' ) ); ?>" class="nav-sub-link">Which Program?</a></li>
        </ul>
      </li>

      <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="nav-link">Gallery</a></li>
      <li><a href="<?php echo esc_url( home_url( '/location-contact/' ) ); ?>" class="nav-link">Contact</a></li>
    </ul>
  </div>

  <div class="nav-footer">
    <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9]/', '', $asf_phone ) ); ?>" class="nav-phone">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.59 1.22h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6.16 6.16l.87-.87a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      <?php echo esc_html( $asf_phone ); ?>
    </a>
    <a href="<?php echo esc_url( asf_opt( 'asf_registration_url', 'https://app.jackrabbitclass.com/regv2.asp?id=540626' ) ); ?>" class="btn-register" target="_blank" rel="noopener">Register Now</a>
  </div>
</nav>

<div class="site-wrapper">
