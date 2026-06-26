  </main><!-- #main-content -->

</div><!-- .site-wrapper -->

<footer id="site-footer">
  <div class="footer-inner">

    <!-- Brand -->
    <div class="footer-brand">
      <div class="footer-logo">
        <?php if ( has_custom_logo() ) :
          the_custom_logo();
        else : ?>
          <div class="footer-logo-icon"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.jpg" alt="<?php esc_attr_e( 'Academy of Sport and Fitness', 'asf' ); ?>"></div>
          <div class="footer-logo-text">
            <strong><?php bloginfo( 'name' ); ?></strong>
            <span><?php bloginfo( 'description' ); ?></span>
          </div>
        <?php endif; ?>
      </div>
      <p>We foster complete child development — physically &amp; emotionally. Serving Richmond Hill, Markham, and the Greater York Region.</p>
      <div class="footer-social">
        <?php $ig = asf_opt( 'asf_instagram' ); if ( $ig ) : ?>
          <a href="<?php echo esc_url( $ig ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <?php echo asf_icon( 'instagram', 18 ); ?>
          </a>
        <?php endif; ?>
      </div>
      <div class="footer-logos">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-recasf.png" alt="Gymnastics Ontario" class="logo-go">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-nccp.png" alt="National Coaching Certification Program" class="logo-nccp">
      </div>
    </div>

    <!-- Programs nav -->
    <div class="footer-col">
      <h4><?php esc_html_e( 'Programs', 'asf' ); ?></h4>
      <?php wp_nav_menu( [
        'theme_location' => 'footer-pages',
        'container'      => false,
        'fallback_cb'    => false,
        'depth'          => 1,
        'walker'         => new ASF_Nav_Walker(),
      ] ); ?>
    </div>

    <!-- Contact -->
    <div class="footer-col">
      <h4><?php esc_html_e( 'Location & Contact', 'asf' ); ?></h4>
      <?php $addr = asf_opt( 'asf_address' ); if ( $addr ) : ?>
        <div class="footer-contact-item">
          <span class="icon"><?php echo asf_icon( 'location', 16 ); ?></span>
          <span><?php echo nl2br( esc_html( $addr ) ); ?></span>
        </div>
      <?php endif; ?>
      <?php $phone = asf_opt( 'asf_phone' ); if ( $phone ) : ?>
        <div class="footer-contact-item">
          <span class="icon"><?php echo asf_icon( 'phone', 16 ); ?></span>
          <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
            <?php echo esc_html( $phone ); ?>
          </a>
        </div>
      <?php endif; ?>
      <?php $email = asf_opt( 'asf_email' ); if ( $email ) : ?>
        <div class="footer-contact-item">
          <span class="icon"><?php echo asf_icon( 'email', 16 ); ?></span>
          <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
        </div>
      <?php endif; ?>
      <?php $hours = asf_opt( 'asf_hours' ); if ( $hours ) : ?>
        <div class="footer-hours">
          <h5>
            <?php echo asf_icon( 'clock', 14 ); ?>
            <?php esc_html_e( 'Office Hours', 'asf' ); ?>
          </h5>
          <?php echo nl2br( esc_html( $hours ) ); ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Quick links nav -->
    <div class="footer-col">
      <h4><?php esc_html_e( 'Quick Links', 'asf' ); ?></h4>
      <?php wp_nav_menu( [
        'theme_location' => 'footer-quick',
        'container'      => false,
        'fallback_cb'    => false,
        'depth'          => 1,
        'walker'         => new ASF_Nav_Walker(),
      ] ); ?>
    </div>

  </div><!-- .footer-inner -->

  <div class="footer-bottom">
    <span>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'asf' ); ?></span>
    <div class="footer-bottom-links">
      <?php $pp = get_privacy_policy_url(); if ( $pp ) : ?>
        <a href="<?php echo esc_url( $pp ); ?>"><?php esc_html_e( 'Privacy Policy', 'asf' ); ?></a>
      <?php endif; ?>
      <a href="<?php echo esc_url( home_url( '/staff-portal' ) ); ?>"><?php esc_html_e( 'Staff Portal', 'asf' ); ?></a>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
