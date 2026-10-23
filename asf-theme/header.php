<?php
/**
 * ASF Theme header: mobile top bar + left sidebar nav (same markup as assets/layout.js in the HTML preview).
 * Links come from Appearance → Menus → "Sidebar Navigation"; contact details from Appearance → Customize → Sidebar & Footer.
 */
$asf_logo  = asf_logo_url();
$asf_phone = asf_opt( 'asf_phone' );
$asf_email = asf_opt( 'asf_email' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ( ! has_site_icon() ) : ?>
<link rel="icon" href="<?php echo esc_url( $asf_logo ); ?>" type="image/png">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── MOBILE TOPBAR ── -->
<div class="mobile-topbar">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-logo">
    <div class="mobile-logo-icon"><img src="<?php echo esc_url( $asf_logo ); ?>" alt="ASF Logo"></div>
    <span class="mobile-logo-name"><?php echo esc_html( asf_opt( 'asf_business_name' ) ); ?></span>
  </a>
  <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</div>

<div id="nav-overlay" class="nav-overlay"></div>

<!-- ── SIDEBAR NAV ── -->
<nav id="site-nav" aria-label="Main navigation">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
    <div class="nav-logo-icon"><img src="<?php echo esc_url( $asf_logo ); ?>" alt="ASF Logo"></div>
    <div class="nav-logo-text"><strong><?php echo nl2br( esc_html( asf_opt( 'asf_logo_text' ) ), false ); ?></strong></div>
  </a>

  <?php asf_menu( 'primary', 'nav-menu' ); ?>

  <div class="nav-contact">
    <p><a href="<?php echo esc_url( asf_maps_url() ); ?>" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none"><?php echo nl2br( esc_html( asf_opt( 'asf_address' ) ), false ); ?></a></p>
    <p><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $asf_phone ) ); ?>"><?php echo esc_html( $asf_phone ); ?></a></p>
    <p><a href="mailto:<?php echo esc_attr( $asf_email ); ?>"><?php echo esc_html( $asf_email ); ?></a></p>
  </div>

  <div class="nav-cta-wrap">
    <a href="<?php echo esc_url( asf_opt( 'asf_registration_url' ) ); ?>" class="nav-cta" target="_blank" rel="noopener noreferrer"><?php echo esc_html( asf_opt( 'asf_cta_text' ) ); ?></a>
  </div>
</nav>

<div class="site-wrapper">
