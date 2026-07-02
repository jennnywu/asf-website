<?php get_header(); ?>
<main id="main-content">
<!-- Hero -->
<section class="hero">
  <div class="hero-slide hero-slide-duo active">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/1-home.jpg" class="duo-img" alt="Gymnasts training at Academy of Sport and Fitness">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/2-home.jpg" class="duo-img" alt="Gymnastics class in action at ASF">
  </div>
  <div class="hero-slide" style="background:url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/3-home.jpg') center 40%/cover no-repeat"></div>
  <div class="hero-slide" style="background:url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/4-home.jpg') center 65%/cover no-repeat"></div>
  <div class="hero-slide" style="background:url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/5-home.jpg') center 50%/cover no-repeat"></div>
  <div class="hero-content">
    <p class="hero-eyebrow">Serving the Greater Toronto Area</p>
    <h1 class="hero-title">Where Every Child Finds Their Strength</h1>
    <p class="hero-sub">Recreational gymnastics, competitive programs, and summer camps for kids of all ages in Richmond Hill, Markham &amp; York Region.</p>
    <div class="hero-btns">
      <a href="<?php echo esc_url( home_url( '/which-program/' ) ); ?>" class="btn-primary">View Programs</a>
      <a href="<?php echo esc_url( asf_opt( 'asf_registration_url', 'https://app.jackrabbitclass.com/regv2.asp?id=540626' ) ); ?>" class="btn-outline" target="_blank" rel="noopener noreferrer">Register Now</a>
    </div>
  </div>
  <button class="hero-pause" id="hero-pause" aria-label="Pause slideshow" title="Pause slideshow"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg></button>
  <div class="hero-dots">
    <button class="hero-dot active"></button>
    <button class="hero-dot"></button>
    <button class="hero-dot"></button>
    <button class="hero-dot"></button>
  </div>
</section>

<!-- Promo Banner -->
<div class="promo-banner">
  <div class="promo-banner-inner">
    <div class="promo-label">Limited Time Offer</div>
    <p class="promo-headline">Summer Camp Promo! Register for 2 weeks &amp; <strong>SAVE $30 on your second week!</strong></p>
    <p class="promo-fine">Promo applies to max 3 weeks. Valid June 18 – July 31, 2026. Cannot be combined with other promotions.</p>
    <a href="<?php echo esc_url( home_url( '/camp/' ) ); ?>" class="btn-promo">Register for Summer Camp</a>
  </div>
</div>

<!-- Video -->
<section class="video-section">
  <div class="video-inner">
    <div class="video-text">
      <p class="section-eyebrow">See It In Action</p>
      <h2>A Gym Built for Every Child</h2>
      <p>From their first cartwheel to competing at the provincial level &mdash; we have a program that grows with your child. Our Olympic-level facility is home to recreational gymnastics, competitive training, and some of the best summer camps in the GTA.</p>
      <a href="<?php echo esc_url( home_url( '/benefits/' ) ); ?>" class="benefits-link">Why gymnastics? Read about the benefits &rarr;</a>
    </div>
    <div class="video-embed">
      <iframe
        src="https://www.youtube.com/embed/hQQETAwkEvo"
        title="ASF Gymnastics — Aidan"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
        style="width:100%;aspect-ratio:16/9;border-radius:8px;display:block;">
      </iframe>
    </div>
  </div>
</section>

<!-- Programs -->
<section class="programs-section">
  <div class="section-header">
    <p class="section-eyebrow">Our Programs</p>
    <h2>Gymnastics for Every Stage</h2>
    <p>Choose from a full range of programs designed for different ages, goals, and skill levels.</p>
  </div>

  <div class="program-tabs">
    <button class="program-tab active" onclick="switchTab(0)">
      <span class="tab-icon">
        <span class="icon-cartwheel"></span>
      </span>
      Recreational
    </button>
    <button class="program-tab" onclick="switchTab(1)">
      <span class="tab-icon">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
      </span>
      Xcel / Advanced
    </button>
    <button class="program-tab" onclick="switchTab(2)">
      <span class="tab-icon">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"/><path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"/><path d="M18 9h1.5a1 1 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"/><path d="M6 9H4.5a1 1 0 0 1 0-5H6"/></svg>
      </span>
      Competitive
    </button>
    <button class="program-tab" onclick="switchTab(3)">
      <span class="tab-icon">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
      </span>
      Camps
    </button>
    <button class="program-tab" onclick="switchTab(4)">
      <span class="tab-icon">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 16v1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v1"/><path d="M12 6a2 2 0 0 1 2 2"/><path d="M18 8c0 4-3.5 8-6 8s-6-4-6-8a6 6 0 0 1 12 0"/></svg>
      </span>
      Birthdays
    </button>
  </div>

  <div class="program-panels">
    <div class="program-panel active"><div class="program-panel-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/6-home.jpg" alt="Recreational gymnastics" style="object-position:center 30%"></div><div class="program-panel-content"><h3>Recreational Classes</h3><p>Come join the fun and spark the love of the sport in your child! A variety of recreational classes are offered to suit your needs. Sign your child up for a fabulous learning experience with fun, fitness, and gymnastics development!</p><a href="<?php echo esc_url( home_url( '/recreational-classes/' ) ); ?>" class="btn-red">Learn More</a></div></div>
    <div class="program-panel"><div class="program-panel-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/7-home.jpg" alt="Xcel and Advanced program"></div><div class="program-panel-content"><h3>Xcel / Advanced Program</h3><p>A program designed for kids who wish to explore gymnastics at a more challenging level and enhance personal confidence. Build skills at your own pace in a supportive environment.</p><a href="<?php echo esc_url( home_url( '/xcel/' ) ); ?>" class="btn-red">Learn More</a></div></div>
    <div class="program-panel"><div class="program-panel-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/8-home.jpg" alt="Competitive team" style="object-position:center 30%"></div><div class="program-panel-content"><h3>Competitive Team</h3><p>Our competitive program offers athletes the opportunity to train at a high level and compete provincially and nationally. Advanced programs available for dedicated athletes.</p><a href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>" class="btn-red">Learn More</a></div></div>
    <div class="program-panel"><div class="program-panel-img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/photos/home/9-home.jpg" alt="Summer camp" style="object-position:center 65%"></div><div class="program-panel-content"><h3>Camps</h3><p>Weekly programs designed for kids to have fun, learn new skills, get exercise, and meet new friends. We offer Summer, Winter, and March Break camps.</p><a href="<?php echo esc_url( home_url( '/camp/' ) ); ?>" class="btn-red">Learn More</a></div></div>
    <div class="program-panel"><div class="program-panel-img">Photo coming soon</div><div class="program-panel-content"><h3>Birthday Parties</h3><p>Make your child's birthday unforgettable at ASF! Our gym parties include supervised activities, use of equipment, and a dedicated party space. Book yours today.</p><a href="<?php echo esc_url( home_url( '/birthday/' ) ); ?>" class="btn-red">Learn More</a></div></div>
  </div>
</section>

<!-- Testimonials -->
<section class="testimonials">
  <div class="testimonials-inner">
    <div class="section-header">
      <p class="section-eyebrow">What Families Say</p>
      <h2>Praise for The Academy</h2>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial-card"><p>"My family had a fantastic experience at the Academy of Sport and Fitness. I sent my children for summer camp and they loved the variety of activities and equipment they got to try. The facility was large and spacious with excellent Covid protocols in place which made me feel my children were always safe. I was so impressed with the summer camp program that I signed my children up for yearly classes as well. The staff have always been friendly and supportive and allowed my kids to enjoy every minute of gymnastics classes"</p><div class="testimonial-author">- Sherri Hassard (Parent)</div></div>
      <div class="testimonial-card"><p>"I signed my children up for classes this past September at the Academy of Sport and Fitness. Unfortunately due to Covid -19, Ontario went into lockdown and the gym had to shut down. I must say the Academy went above and beyond offering free Zoom classes for kids of all ages while the club was closed during Covid lockdowns. I really appreciated that my kids were able to stay active through these fun online classes plus continue to stay connected with other children their age. The coaches put a lot of effort into creating different class activities that incorporated gymnastics in a safe way from home along with games, contests and crafts. The club even ran Christmas and Spring break camps online which my children loved!"</p><div class="testimonial-author">- Liliana Guzman (Parent)</div></div>
      <div class="testimonial-card"><p>"My two daughters joined their recreational classes prior to COVID and, when we got back to the gym after lockdown, their protocols for re-opening were well communicated and their top priority was keeping everyone safe and informed. Overall, they have been great with crediting the classes we missed and we look forward to getting started again this summer!"</p><div class="testimonial-author">- Mahin Namdari (Parent)</div></div>
    </div>
  </div>
</section>

<!-- Instagram -->
<section class="instagram-section">
  <h2>Follow Along</h2>
  <a href="https://www.instagram.com/asfgymnastics/" class="instagram-handle" target="_blank" rel="noopener noreferrer">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
    @asfgymnastics
  </a>
  <div class="instagram-grid">
    <div class="insta-thumb"></div><div class="insta-thumb"></div><div class="insta-thumb"></div>
    <div class="insta-thumb"></div><div class="insta-thumb"></div><div class="insta-thumb"></div>
    <div class="insta-thumb"></div><div class="insta-thumb"></div><div class="insta-thumb"></div>
    <div class="insta-thumb"></div><div class="insta-thumb"></div><div class="insta-thumb"></div>
  </div>
  <p class="instagram-note">Instagram feed plugin connects here</p>
</section>
</main>
<?php get_footer(); ?>

