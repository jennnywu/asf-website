<?php
// Slides: each is an image set via Customizer (Appearance → Customize → Hero Slideshow)
$slides = [];
for ( $i = 1; $i <= 4; $i++ ) {
    $url = asf_opt( "asf_slide_{$i}_img" );
    if ( $url ) {
        $slides[] = $url;
    }
}
$has_slides = ! empty( $slides );
?>

<section class="hero" id="hero">
  <?php if ( $has_slides ) :
    foreach ( $slides as $idx => $img_url ) : ?>
      <div class="hero-slide <?php echo $idx === 0 ? 'active' : ''; ?>" aria-hidden="<?php echo $idx === 0 ? 'false' : 'true'; ?>">
        <img src="<?php echo esc_url( $img_url ); ?>" alt="" class="hero-slide-bg" loading="<?php echo $idx === 0 ? 'eager' : 'lazy'; ?>">
      </div>
    <?php endforeach;
  else : ?>
    <!-- Placeholder until slides are uploaded in Customizer -->
    <div class="hero-slide active hero-slide-placeholder" aria-hidden="false"></div>
  <?php endif; ?>

  <div class="hero-content">
    <p class="hero-eyebrow"><?php echo esc_html( asf_opt( 'asf_hero_tagline', 'Serving the Greater Toronto Area' ) ); ?></p>
    <h1 class="hero-title"><?php echo esc_html( asf_opt( 'asf_hero_title', 'Where Every Child Finds Their Strength' ) ); ?></h1>
    <p class="hero-sub"><?php echo esc_html( asf_opt( 'asf_hero_sub', 'Recreational gymnastics, competitive programs, and summer camps for kids of all ages in Richmond Hill, Markham & York Region.' ) ); ?></p>
    <div class="hero-btns">
      <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'recreational-classes' ) ) ); ?>" class="btn-primary"><?php esc_html_e( 'View Programs', 'asf' ); ?></a>
      <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'family-portal' ) ) ); ?>" class="btn-outline"><?php esc_html_e( 'Register Now', 'asf' ); ?></a>
    </div>
  </div>

  <?php if ( count( $slides ) > 1 ) : ?>
    <div class="hero-dots" role="tablist" aria-label="Slideshow">
      <?php foreach ( $slides as $idx => $_ ) : ?>
        <button class="hero-dot <?php echo $idx === 0 ? 'active' : ''; ?>"
                role="tab"
                aria-selected="<?php echo $idx === 0 ? 'true' : 'false'; ?>"
                aria-label="<?php printf( esc_attr__( 'Slide %d', 'asf' ), $idx + 1 ); ?>"
                data-slide="<?php echo $idx; ?>"></button>
      <?php endforeach; ?>
    </div>
    <span class="slide-label" aria-hidden="true">01 / <?php echo sprintf( '%02d', count( $slides ) ); ?></span>
  <?php endif; ?>
</section>
