<?php /* Template Name: Gallery */ ?>
<?php get_header(); ?>
<main id="main-content">
<div class="page-hero">
    <p class="section-eyebrow">ASF in Action</p>
    <h1>Gallery</h1>
    <p class="page-hero-tagline">A look inside the gym and our programs</p>
  </div>

  <div class="gallery-section">

    <!-- Filter Bar -->
    <div class="filter-bar" id="filter-bar">
      <button class="filter-btn active" data-filter="all">All <span class="filter-count" id="count-all"></span></button>
      <button class="filter-btn" data-filter="facility">Facility <span class="filter-count" id="count-facility"></span></button>
      <button class="filter-btn" data-filter="camps">Camps <span class="filter-count" id="count-camps"></span></button>
      <button class="filter-btn" data-filter="recreational">Recreational <span class="filter-count" id="count-recreational"></span></button>
      <button class="filter-btn" data-filter="competitive">Competitive <span class="filter-count" id="count-competitive"></span></button>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-grid" id="gallery-grid">

      <!-- FACILITY (real photos) -->
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/2-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/2-facility.jpg" alt="ASF gymnasium overview showing floor and equipment">
      </div>
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/3-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/3-facility.jpg" alt="Gymnastics bars and beam apparatus at ASF">
      </div>
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/4-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/4-facility.jpg" alt="ASF gym floor and spring floor area">
      </div>
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/5-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/5-facility.jpg" alt="Foam pit and high bar at Academy of Sport and Fitness">
      </div>
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/6-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/6-facility.jpg" alt="Balance beams and training area at ASF">
      </div>
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/7-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/7-facility.jpg" alt="Vault and runway at Academy of Sport and Fitness">
      </div>
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/8-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/8-facility.jpg" alt="ASF gymnasium — full view of training facility">
      </div>
      <div class="gallery-item" data-category="facility" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/1-facility.jpg" data-label="Facility">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/facility/1-facility.jpg" alt="Entrance and lobby of Academy of Sport and Fitness">
      </div>

      <!-- CAMPS (placeholders) -->
      <div class="gallery-item" data-category="camps" data-placeholder data-label="Camps">
        <div class="placeholder-box" style="aspect-ratio:4/3">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" opacity=".45"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          Camps
        </div>
      </div>
      <div class="gallery-item" data-category="camps" data-placeholder data-label="Camps">
        <div class="placeholder-box" style="aspect-ratio:3/4"></div>
      </div>
      <div class="gallery-item" data-category="camps" data-placeholder data-label="Camps">
        <div class="placeholder-box" style="aspect-ratio:4/3"></div>
      </div>
      <div class="gallery-item" data-category="camps" data-placeholder data-label="Camps">
        <div class="placeholder-box" style="aspect-ratio:1/1"></div>
      </div>
      <div class="gallery-item" data-category="camps" data-placeholder data-label="Camps">
        <div class="placeholder-box" style="aspect-ratio:4/3"></div>
      </div>
      <div class="gallery-item" data-category="camps" data-placeholder data-label="Camps">
        <div class="placeholder-box" style="aspect-ratio:3/4"></div>
      </div>

      <!-- RECREATIONAL (placeholders) -->
      <div class="gallery-item" data-category="recreational" data-placeholder data-label="Recreational">
        <div class="placeholder-box" style="aspect-ratio:4/3">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" opacity=".45"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          Recreational
        </div>
      </div>
      <div class="gallery-item" data-category="recreational" data-placeholder data-label="Recreational">
        <div class="placeholder-box" style="aspect-ratio:1/1"></div>
      </div>
      <div class="gallery-item" data-category="recreational" data-placeholder data-label="Recreational">
        <div class="placeholder-box" style="aspect-ratio:3/4"></div>
      </div>
      <div class="gallery-item" data-category="recreational" data-placeholder data-label="Recreational">
        <div class="placeholder-box" style="aspect-ratio:4/3"></div>
      </div>
      <div class="gallery-item" data-category="recreational" data-placeholder data-label="Recreational">
        <div class="placeholder-box" style="aspect-ratio:4/3"></div>
      </div>

      <!-- COMPETITIVE (placeholders) -->
      <div class="gallery-item" data-category="competitive" data-placeholder data-label="Competitive Team">
        <div class="placeholder-box" style="aspect-ratio:3/4">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" opacity=".45"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          Competitive
        </div>
      </div>
      <div class="gallery-item" data-category="competitive" data-placeholder data-label="Competitive Team">
        <div class="placeholder-box" style="aspect-ratio:4/3"></div>
      </div>
      <div class="gallery-item" data-category="competitive" data-placeholder data-label="Competitive Team">
        <div class="placeholder-box" style="aspect-ratio:1/1"></div>
      </div>
      <div class="gallery-item" data-category="competitive" data-placeholder data-label="Competitive Team">
        <div class="placeholder-box" style="aspect-ratio:4/3"></div>
      </div>
      <div class="gallery-item" data-category="competitive" data-placeholder data-label="Competitive Team">
        <div class="placeholder-box" style="aspect-ratio:3/4"></div>
      </div>

    </div>
  </div>
</main>
<?php get_footer(); ?>

