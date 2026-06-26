<?php
// Controlled entirely from Appearance → Customize → Promo Banner
if ( ! asf_opt( 'asf_promo_enabled', '1' ) ) {
    return;
}
$headline = asf_opt( 'asf_promo_headline', 'Summer Camp Promo! Register for 2 weeks & SAVE $30 on your second week!' );
$fine     = asf_opt( 'asf_promo_fine',     'Promo applies to max 3 weeks. Valid June 18 – July 31, 2026. Cannot be combined with other promotions.' );
$btn_text = asf_opt( 'asf_promo_btn_text', 'Register for Summer Camp →' );
$btn_url  = asf_opt( 'asf_promo_btn_url',  '#' );
?>

<div class="promo-banner" role="region" aria-label="<?php esc_attr_e( 'Promotion', 'asf' ); ?>">
  <div class="promo-banner-inner">
    <span class="promo-label">🏕 <?php esc_html_e( 'Limited Time Offer', 'asf' ); ?></span>
    <p class="promo-headline"><?php echo esc_html( $headline ); ?></p>
    <?php if ( $fine ) : ?>
      <p class="promo-fine"><?php echo esc_html( $fine ); ?></p>
    <?php endif; ?>
    <?php if ( $btn_text && $btn_url ) : ?>
      <a href="<?php echo esc_url( $btn_url ); ?>" class="btn-promo"<?php echo asf_target( $btn_url ); ?>>
        <?php echo esc_html( $btn_text ); ?>
      </a>
    <?php endif; ?>
  </div>
</div>
