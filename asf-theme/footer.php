<?php
/**
 * ASF Theme footer (same markup as assets/layout.js in the HTML preview).
 * Link columns come from Appearance → Menus ("Footer: Programs column", "Footer: Quick Links column");
 * everything else from Appearance → Customize → Sidebar & Footer.
 */
$asf_phone = asf_opt( 'asf_phone' );
$asf_email = asf_opt( 'asf_email' );
?>
</div><!-- .site-wrapper -->

<footer id="site-footer">
<div class="footer-inner">
  <div class="footer-brand">
    <div class="footer-logo">
      <div class="footer-logo-icon"><img src="<?php echo esc_url( asf_logo_url() ); ?>" alt="ASF Logo"></div>
      <div class="footer-logo-text"><strong><?php echo nl2br( esc_html( asf_opt( 'asf_logo_text' ) ), false ); ?></strong></div>
    </div>
    <p><?php echo esc_html( asf_opt( 'asf_footer_tagline' ) ); ?></p>
    <div class="footer-logos">
      <?php if ( asf_opt( 'asf_instagram_url' ) ) : ?>
      <a href="<?php echo esc_url( asf_opt( 'asf_instagram_url' ) ); ?>" class="footer-ig-btn" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
      </a>
      <?php endif; ?>
      <?php if ( asf_opt( 'asf_footer_logo_1' ) ) : ?>
      <img src="<?php echo esc_url( asf_opt( 'asf_footer_logo_1' ) ); ?>" alt="Gymnastics Ontario" class="logo-go">
      <?php endif; ?>
      <?php if ( asf_opt( 'asf_footer_logo_2' ) ) : ?>
      <img src="<?php echo esc_url( asf_opt( 'asf_footer_logo_2' ) ); ?>" alt="National Coaching Certification Program" class="logo-nccp">
      <?php endif; ?>
    </div>
  </div>
  <div class="footer-col">
    <h4><?php echo esc_html( asf_menu_heading( 'footer-programs' ) ); ?></h4>
    <?php asf_menu( 'footer-programs' ); ?>
  </div>
  <div class="footer-col">
    <h4><?php echo esc_html( asf_opt( 'asf_contact_heading' ) ); ?></h4>
    <div class="footer-contact-item"><span class="icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg></span><span><a href="<?php echo esc_url( asf_maps_url() ); ?>" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none"><?php echo nl2br( esc_html( asf_opt( 'asf_address' ) ), false ); ?></a></span></div>
    <div class="footer-contact-item"><span class="icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg></span><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $asf_phone ) ); ?>"><?php echo esc_html( $asf_phone ); ?></a></div>
    <div class="footer-contact-item"><span class="icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></span><a href="mailto:<?php echo esc_attr( $asf_email ); ?>"><?php echo esc_html( $asf_email ); ?></a></div>
    <div class="footer-hours">
      <h5><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg> <?php echo esc_html( asf_opt( 'asf_hours_heading' ) ); ?></h5>
      <?php echo nl2br( esc_html( asf_opt( 'asf_hours' ) ), false ); ?>
    </div>
  </div>
  <div class="footer-col">
    <h4><?php echo esc_html( asf_menu_heading( 'footer-quick' ) ); ?></h4>
    <?php asf_menu( 'footer-quick' ); ?>
  </div>
</div>
<div class="footer-bottom">
  <span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( asf_opt( 'asf_business_name' ) ); ?>. All rights reserved.</span>
</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
