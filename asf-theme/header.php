<?php
/**
 * ASF Theme header — matches layout.js HTML structure exactly
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
<?php
$asf_phone = asf_opt( 'asf_phone', '905-780-0913' );
$asf_email = asf_opt( 'asf_email', 'academysportfitness@gmail.com' );
$asf_reg   = asf_opt( 'asf_registration_url', 'https://app.jackrabbitclass.com/regv2.asp?id=540626' );
$asf_addr  = asf_opt( 'asf_address', "40 Vogell Road, Unit #32\nRichmond Hill, Ontario L4B 3N6" );
?>

<!-- ── MOBILE TOPBAR ── -->
<div class="mobile-topbar">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-logo">
    <div class="mobile-logo-icon"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/web/logo.png" alt="ASF Logo"></div>
    <span class="mobile-logo-name">Academy of Sport and Fitness</span>
  </a>
  <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</div>

<div id="nav-overlay" class="nav-overlay"></div>

<!-- ── SIDEBAR NAV ── -->
<nav id="site-nav" aria-label="Main navigation">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
    <div class="nav-logo-icon"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/web/logo.png" alt="ASF Logo"></div>
    <div class="nav-logo-text"><strong>Academy of Sport<br>and Fitness</strong></div>
  </a>

  <ul class="nav-menu">
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>

    <li>
      <button class="nav-parent" aria-expanded="false">
        About
        <span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10l5 5 5-5H7z"/></svg></span>
      </button>
      <ul class="nav-dropdown">
        <li><a href="<?php echo esc_url( home_url( '/our-facility/' ) ); ?>">Our Facility</a></li>
        <li><a href="<?php echo esc_url( home_url( '/location-contact/' ) ); ?>">Location &amp; Contact</a></li>
        <li><a href="<?php echo esc_url( home_url( '/benefits/' ) ); ?>">Benefits</a></li>
        <li><a href="<?php echo esc_url( home_url( '/coaching-team/' ) ); ?>">Coaching Team</a></li>
        <li><a href="https://academysportfitness.ca/wp-content/uploads/2025/06/Academy-Policies-25-26.pdf" target="_blank" rel="noopener noreferrer">Policies (PDF)&nbsp;<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a></li>
      </ul>
    </li>

    <li>
      <button class="nav-parent" aria-expanded="false">
        Programs
        <span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10l5 5 5-5H7z"/></svg></span>
      </button>
      <ul class="nav-dropdown">
        <li><a href="<?php echo esc_url( home_url( '/which-program/' ) ); ?>">Find the Right Program</a></li>
        <li><a href="<?php echo esc_url( home_url( '/camp/' ) ); ?>">Camps</a></li>
        <li><a href="<?php echo esc_url( home_url( '/recreational-classes/' ) ); ?>">Recreational Classes</a></li>
        <li><a href="<?php echo esc_url( home_url( '/xcel/' ) ); ?>">Xcel / Advanced</a></li>
        <li><a href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>">Competitive Team</a></li>
        <li><a href="<?php echo esc_url( home_url( '/birthday/' ) ); ?>">Birthday Parties</a></li>
      </ul>
    </li>

    <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a></li>

    <li>
      <button class="nav-parent" aria-expanded="false">
        Family Portal
        <span class="nav-chevron"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10l5 5 5-5H7z"/></svg></span>
      </button>
      <ul class="nav-dropdown">
        <li><a href="<?php echo esc_url( $asf_reg ); ?>" target="_blank" rel="noopener noreferrer">Sign Up&nbsp;<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a></li>
        <li><a href="https://app.jackrabbitclass.com/jr3.0/ParentPortal/Login?orgID=540626" target="_blank" rel="noopener noreferrer">Log In&nbsp;<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a></li>
      </ul>
    </li>
  </ul>

  <div class="nav-contact">
    <p><a href="https://maps.google.com/?q=40+Vogell+Road+Unit+32+Richmond+Hill+ON+L4B+3N6" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none"><?php echo nl2br( esc_html( $asf_addr ) ); ?></a></p>
    <p><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $asf_phone ) ); ?>"><?php echo esc_html( $asf_phone ); ?></a></p>
    <p><a href="mailto:<?php echo esc_attr( $asf_email ); ?>"><?php echo esc_html( $asf_email ); ?></a></p>
  </div>

  <div class="nav-cta-wrap">
    <a href="<?php echo esc_url( $asf_reg ); ?>" class="nav-cta" target="_blank" rel="noopener noreferrer">Register Now</a>
  </div>
</nav>

<div class="site-wrapper">
