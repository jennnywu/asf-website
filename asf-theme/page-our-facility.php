<?php /* Template Name: Our Facility */ ?>
<?php get_header(); ?>
<main id="main-content">
<div class="page-hero">
    <p class="section-eyebrow">About Us</p>
    <h1>Our Facility</h1>
    <p class="page-hero-tagline">FIG-regulated equipment and a world-class space for every level of gymnast</p>
  </div>

  <div class="inner-page">

    <div class="facility-intro">
      <div class="img-placeholder">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/1-facility.jpg" alt="ASF Facility">
      </div>
      <div class="facility-intro-text">
        <p class="section-eyebrow">World-Class Training Space</p>
        <h2>A Gym Built for Every Level</h2>
        <p style="font-size:13px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--brick-red);margin-bottom:10px">Equipment</p>
        <ul style="list-style:disc;padding-left:18px;font-size:14px;line-height:1.9;color:var(--text-mid);margin-bottom:24px">
          <li><strong>1,200 sq ft</strong> of dedicated training space</li>
          <li>FIG-regulated gymnastics equipment throughout</li>
          <li>In-ground trampoline</li>
          <li>40' Tumbl Trak</li>
          <li>In-ground foam pit with high bar</li>
          <li>Tumbling strip leading into pit</li>
          <li>40' × 40' competition sprung floor</li>
          <li>6 high balance beams</li>
          <li>2 sets of uneven bars</li>
          <li>2 strap bars</li>
          <li>2 adjustable training bars</li>
        </ul>
        <p style="font-size:13px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--brick-red);margin-bottom:10px">Amenities</p>
        <ul style="list-style:disc;padding-left:18px;font-size:14px;line-height:1.9;color:var(--text-mid)">
          <li>Dedicated snack room / kitchen</li>
          <li>2 washrooms</li>
          <li>Parent viewing area</li>
        </ul>
      </div>
    </div>

    <hr class="section-divider">

    <p class="section-eyebrow">Inside the Gym</p>
    <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--dark-garnet);margin-bottom:16px">Equipment &amp; Spaces</h2>
    <p style="font-size:15px;line-height:1.8;color:var(--text-mid);max-width:720px">Our 1,200 sq ft Olympic-level training facility is equipped with FIG-regulated apparatus, competition sprung flooring, and everything athletes need to train and grow at every level - from their first cartwheel to provincial competitions. View our facility's photo gallery below.</p>

    <div class="facility-gallery">
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/2-facility.jpg" alt="ASF Facility"></div>
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/3-facility.jpg" alt="ASF Facility"></div>
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/4-facility.jpg" alt="ASF Facility"></div>
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/5-facility.jpg" alt="ASF Facility"></div>
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/6-facility.jpg" alt="ASF Facility"></div>
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/7-facility.jpg" alt="ASF Facility"></div>
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/8-facility.jpg" alt="ASF Facility"></div>
      <div class="gallery-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/1-facility.jpg" alt="ASF Facility"></div>
    </div>

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
  <button class="lb-close" id="lb-close">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
  </button>
  <button class="lb-prev" id="lb-prev">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
  </button>
  <div class="lb-img-wrap"><img id="lb-img" src="" alt=""></div>
  <button class="lb-next" id="lb-next">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
  </button>
  <div class="lb-counter" id="lb-counter">1 / 8</div>
</div>

  </div>
</main>
<?php get_footer(); ?>

