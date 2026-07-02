<?php
/**
 * ASF Theme footer — closes .site-wrapper, outputs footer, wp_footer
 */
?>
</div><!-- .site-wrapper -->

<footer id="site-footer">
  <div class="footer-inner">

    <div class="footer-col footer-brand">
      <a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/web/logo.png" alt="ASF Logo">
        <span class="footer-logo-text">Academy of Sport &amp; Fitness</span>
      </a>
      <p class="footer-tagline"><?php echo esc_html( asf_opt( 'asf_footer_tagline', "Richmond Hill's gymnastics home since 1998." ) ); ?></p>
    </div>

    <div class="footer-col">
      <p class="footer-col-heading">Programs</p>
      <ul class="footer-links">
        <li><a href="<?php echo esc_url( home_url( '/recreational-classes/' ) ); ?>">Recreational Classes</a></li>
        <li><a href="<?php echo esc_url( home_url( '/xcel/' ) ); ?>">Xcel / Advanced</a></li>
        <li><a href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>">Competitive Team</a></li>
        <li><a href="<?php echo esc_url( home_url( '/camp/' ) ); ?>">Camp</a></li>
        <li><a href="<?php echo esc_url( home_url( '/birthday/' ) ); ?>">Birthday Parties</a></li>
        <li><a href="<?php echo esc_url( home_url( '/which-program/' ) ); ?>">Which Program?</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <p class="footer-col-heading">About</p>
      <ul class="footer-links">
        <li><a href="<?php echo esc_url( home_url( '/our-facility/' ) ); ?>">Our Facility</a></li>
        <li><a href="<?php echo esc_url( home_url( '/coaching-team/' ) ); ?>">Coaching Team</a></li>
        <li><a href="<?php echo esc_url( home_url( '/benefits/' ) ); ?>">Benefits of Gymnastics</a></li>
        <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a></li>
        <li><a href="<?php echo esc_url( home_url( '/location-contact/' ) ); ?>">Contact</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <p class="footer-col-heading">Hours</p>
      <ul class="footer-hours">
        <li><span>Monday – Friday</span><span>3:00 pm – 8:30 pm</span></li>
        <li><span>Saturday</span><span>9:00 am – 2:00 pm</span></li>
        <li><span>Sunday</span><span>9:00 am – 1:00 pm</span></li>
      </ul>
      <p class="footer-col-heading" style="margin-top:20px">Contact</p>
      <ul class="footer-links">
        <li><?php echo esc_html( asf_opt( 'asf_address', '40 Vogell Road, Unit 32, Richmond Hill, ON L4B 3N6' ) ); ?></li>
        <li><a href="tel:<?php echo esc_attr( preg_replace('/[^0-9]/', '', asf_opt('asf_phone','905-780-0913') ) ); ?>"><?php echo esc_html( asf_opt( 'asf_phone', '905-780-0913' ) ); ?></a></li>
        <li><a href="mailto:<?php echo esc_attr( asf_opt( 'asf_email', 'info@academysportfitness.ca' ) ); ?>"><?php echo esc_html( asf_opt( 'asf_email', 'info@academysportfitness.ca' ) ); ?></a></li>
      </ul>
    </div>

  </div><!-- .footer-inner -->

  <div class="footer-bottom">
    <p>&copy; <?php echo date( 'Y' ); ?> Academy of Sport and Fitness. All rights reserved.</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
