<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrapper">

  <!-- ── LEFT SIDEBAR NAV ── -->
  <nav id="site-nav" aria-label="<?php esc_attr_e( 'Main navigation', 'asf' ); ?>">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
      <?php if ( has_custom_logo() ) :
        the_custom_logo();
      else : ?>
        <div class="nav-logo-icon"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.jpg" alt="<?php esc_attr_e( 'Academy of Sport and Fitness', 'asf' ); ?>"></div>
        <div class="nav-logo-text">
          <strong><?php bloginfo( 'name' ); ?></strong>

        </div>
      <?php endif; ?>
    </a>

    <!-- Primary menu -->
    <?php wp_nav_menu( [
      'theme_location' => 'primary',
      'menu_class'     => 'nav-menu',
      'container'      => false,
      'walker'         => new ASF_Nav_Walker(),
      'fallback_cb'    => false,
    ] ); ?>

    <!-- Contact info above Register CTA -->
    <div class="nav-contact">
      <p class="nav-contact-name"><?php echo esc_html( asf_opt( 'asf_gym_name', 'Academy of Sport and Fitness' ) ); ?></p>
      <p><?php echo nl2br( esc_html( asf_opt( 'asf_address', "40 Vogell Road, Unit #32\nRichmond Hill, Ontario L4B 3N6\n(located off Hwy 404 & 16th Ave)" ) ) ); ?></p>
      <p><a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', asf_opt( 'asf_phone', '9057800913' ) ) ); ?>"><?php echo esc_html( asf_opt( 'asf_phone', '905-780-0913' ) ); ?></a></p>
      <p><a href="mailto:<?php echo esc_attr( asf_opt( 'asf_email', 'academysportfitness@gmail.com' ) ); ?>"><?php echo esc_html( asf_opt( 'asf_email', 'academysportfitness@gmail.com' ) ); ?></a></p>
    </div>

    <!-- Register CTA at bottom of sidebar -->
    <div class="nav-cta-wrap">
      <a href="<?php echo esc_url( home_url( '/family-portal' ) ); ?>" class="nav-cta">
        <?php esc_html_e( 'Register Now', 'asf' ); ?>
      </a>
    </div>

  </nav><!-- #site-nav -->

  <!-- Mobile top bar (visible only on small screens) -->
  <div class="mobile-topbar">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-logo">
      <div class="nav-logo-icon">ASF</div>
      <span><?php bloginfo( 'name' ); ?></span>
    </a>
    <button class="nav-hamburger" aria-label="<?php esc_attr_e( 'Open menu', 'asf' ); ?>" aria-expanded="false" aria-controls="site-nav">
      <span class="hamburger-icon"><?php echo asf_icon( 'menu', 24 ); ?></span>
      <span class="close-icon"><?php echo asf_icon( 'close', 24 ); ?></span>
    </button>
  </div>

  <!-- ── MAIN CONTENT ── -->
  <main id="main-content">
