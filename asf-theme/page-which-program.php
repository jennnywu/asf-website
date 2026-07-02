<?php /* Template Name: Which Program */ ?>
<?php get_header(); ?>
<main id="main-content">
<!-- Page hero -->
  <div class="page-hero">
    <p class="section-eyebrow">Programs</p>
    <h1>Which Program is Best for My Child?</h1>
    <p class="page-hero-tagline">Answer a few quick questions — we'll help you find the perfect fit</p>
  </div>

  <!-- Intro -->
  <div class="finder-intro">
    <p>We offer programs for every age, skill level, and goal — from toddler tumbling to national competition. Use the filters below to narrow down your options, or scroll to browse everything we offer.</p>
  </div>

  <!-- Filters -->
  <div class="finder-filters">
    <div class="filter-group">
      <span class="filter-label">My child is...</span>
      <div class="filter-chips" data-filter="age">
        <button class="chip selected" data-val="any">Any age</button>
        <button class="chip" data-val="toddler">2–4 years</button>
        <button class="chip" data-val="young">5–7 years</button>
        <button class="chip" data-val="child">8–12 years</button>
        <button class="chip" data-val="teen">13+ years</button>
      </div>
    </div>
    <div class="filter-group">
      <span class="filter-label">Gymnastics background...</span>
      <div class="filter-chips" data-filter="exp">
        <button class="chip selected" data-val="any">Any level</button>
        <button class="chip" data-val="first">Brand new</button>
        <button class="chip" data-val="some">Some classes</button>
        <button class="chip" data-val="regular">Training regularly</button>
      </div>
    </div>
    <div class="filter-group">
      <span class="filter-label">What matters most...</span>
      <div class="filter-chips" data-filter="goal">
        <button class="chip selected" data-val="any">Any goal</button>
        <button class="chip" data-val="fun">Fun &amp; fitness</button>
        <button class="chip" data-val="skills">Skill development</button>
        <button class="chip" data-val="compete">Competition</button>
      </div>
    </div>
  </div>

  <!-- Results header -->
  <div class="finder-results-header">
    <h2>Recommended Programs</h2>
    <span class="result-count" id="result-count"></span>
  </div>

  <!-- Program cards -->
  <div class="prog-grid" id="prog-grid">

    <!-- Recreational Classes -->
    <div class="prog-card" data-age="toddler young child teen" data-exp="first some regular" data-goal="fun skills">
      <div class="prog-card-accent open"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>Recreational Classes</h3>
          <span class="prog-badge open">Open Enrollment</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Ages 2+
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            1–2 hrs/week
          </span>
        </div>
        <p class="prog-desc">Our weekly classes are the perfect starting point for any child. From Parent &amp; Tot for toddlers to advanced recreational levels, every class is skill-focused, fun, and confidence-building. No prior experience needed — enroll anytime throughout the year.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> First-timers, kids who love gymnastics casually, and families wanting consistent weekly classes without a major time commitment.</div>
        <a href="<?php echo esc_url( home_url( '/recreational-classes/' ) ); ?>" class="prog-link">View Recreational Classes <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

    <!-- Camps -->
    <div class="prog-card" data-age="young child teen" data-exp="first some regular" data-goal="fun">
      <div class="prog-card-accent open"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>Seasonal Camps</h3>
          <span class="prog-badge open">Open Enrollment</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Ages 5+
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            Full days, seasonal
          </span>
        </div>
        <p class="prog-desc">Week-long day camps over Summer, Winter, and March Break. A high-energy mix of gymnastics, games, and activities led by our coaching staff. A great way to try gymnastics for the first time — or for current gymnasts to keep skills sharp during breaks.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> Kids looking for a fun, active break experience. No gymnastics background required.</div>
        <a href="<?php echo esc_url( home_url( '/camp/' ) ); ?>" class="prog-link">View Camps <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

    <!-- Ninja Gymnastics -->
    <div class="prog-card" data-age="toddler young child" data-exp="first some" data-goal="fun skills">
      <div class="prog-card-accent open"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>Ninja Gymnastics</h3>
          <span class="prog-badge open">Open Enrollment</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Ages 4.5–8
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            1–2 hrs/week
          </span>
        </div>
        <p class="prog-desc">High-energy classes combining gymnastics fundamentals with obstacle courses, climbing, jumping, and action-packed movement challenges. Ninja Gymnastics builds strength, coordination, and confidence in a fun, non-competitive setting that kids absolutely love.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> Kids who love action and adventure. No gymnastics background needed — perfect for active kids who want to move, jump, and have fun.</div>
        <a href="<?php echo esc_url( home_url( '/recreational-classes/' ) ); ?>" class="prog-link">View Recreational Classes <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

    <!-- Pre-Xcel / Showcase -->
    <div class="prog-card" data-age="young child teen" data-exp="some regular" data-goal="skills">
      <div class="prog-card-accent assessment"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>Pre-Xcel / Showcase Xcel</h3>
          <span class="prog-badge assessment">By Assessment</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Ages 6+
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            3.5–7 hrs/week
          </span>
        </div>
        <p class="prog-desc">A bridge between recreational and competitive gymnastics — more structured training, without the pressure of competition. Showcase Xcel athletes develop polished routines and advanced skills in a focused environment. Entry is based on a coach assessment.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> Kids who've completed recreational levels and are ready for more, but aren't interested in competing.</div>
        <a href="<?php echo esc_url( home_url( '/xcel/' ) ); ?>" class="prog-link">View Xcel / Advanced <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

    <!-- Competitive Xcel -->
    <div class="prog-card" data-age="child teen" data-exp="regular" data-goal="skills compete">
      <div class="prog-card-accent assessment"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>Competitive Xcel</h3>
          <span class="prog-badge assessment">By Assessment</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Ages 8+
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            7–12 hrs/week
          </span>
        </div>
        <p class="prog-desc">Train and compete through defined Xcel levels — Bronze, Silver, Gold, and Platinum. Athletes participate in regional meets with structured judging, working toward higher levels over time. A rewarding competition pathway that doesn't require Olympic-level hours.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> Gymnasts ready to take their training seriously and experience competitive meets, without the full commitment of the provincial stream.</div>
        <a href="<?php echo esc_url( home_url( '/xcel/' ) ); ?>" class="prog-link">View Xcel / Advanced <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

    <!-- Pre-Competitive -->
    <div class="prog-card" data-age="young child" data-exp="some regular" data-goal="compete">
      <div class="prog-card-accent assessment"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>Pre-Competitive</h3>
          <span class="prog-badge assessment">By Assessment</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Ages 5–7
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            4–12 hrs/week
          </span>
        </div>
        <p class="prog-desc">The entry point into competitive gymnastics for young girls showing talent and drive. Pre-Competitive builds the fundamental skills and physical conditioning needed for the Ontario Competitive Program, setting athletes up for long-term success in the sport.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> Young girls with natural ability and a love for gymnastics who are ready to commit to structured training and the competitive pathway.</div>
        <a href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>" class="prog-link">View Competitive Team <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

    <!-- OCP -->
    <div class="prog-card" data-age="child teen" data-exp="regular" data-goal="compete">
      <div class="prog-card-accent assessment"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>Ontario Competitive Program</h3>
          <span class="prog-badge assessment">By Assessment</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Ages 7+
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            12–20+ hrs/week
          </span>
        </div>
        <p class="prog-desc">The main competitive stream at ASF. Athletes progress through OCP Levels 1–9 and compete at provincial championships. This program develops well-rounded gymnasts with strong technique and the discipline to compete at a high level year after year.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> Committed athletes who want to compete provincially and have the time and dedication to train seriously.</div>
        <a href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>" class="prog-link">View Competitive Team <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

    <!-- National / High Performance -->
    <div class="prog-card" data-age="child teen" data-exp="regular" data-goal="compete">
      <div class="prog-card-accent invite"></div>
      <div class="prog-card-body">
        <div class="prog-card-title-row">
          <h3>National / High Performance</h3>
          <span class="prog-badge invite">By Invitation</span>
        </div>
        <div class="prog-meta">
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Elite Level
          </span>
          <span class="prog-meta-item">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
            20–30 hrs/week
          </span>
        </div>
        <p class="prog-desc">Elite-level training for athletes competing nationally and pursuing the Olympic pathway. Athletes in this stream represent ASF at national championships and train under a high-performance coaching model. Selection is based on current competitive standing and coach recommendation.</p>
        <div class="prog-bestfor"><strong>Best for:</strong> Elite gymnasts already competing at high levels who are pursuing national-level goals.</div>
        <a href="<?php echo esc_url( home_url( '/competitive-team/' ) ); ?>" class="prog-link">View Competitive Team <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

  </div><!-- /prog-grid -->

  <!-- No results state -->
  <div class="no-results" id="no-results">
    <div class="no-results-inner">
      <h3>No exact match — let's chat</h3>
      <p>Every child is different, and sometimes the best fit isn't obvious on paper. Reach out to us and we'll help you figure it out — we're happy to answer questions or arrange a free assessment.</p>
      <a href="mailto:academysportfitness@gmail.com" class="btn-red">Contact Us</a>
    </div>
  </div>

  <!-- Not sure which class? -->
  <div class="finder-stuck">
    <p>Not sure which class is right for your child? <strong>Contact us</strong> – we're happy to help you find the best fit.</p>
    <a href="mailto:academysportfitness@gmail.com" class="btn-red">Email Us</a>
  </div>

  <!-- Birthday callout -->
  <div class="birthday-callout">
    <div class="birthday-callout-icon">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 12V22H4V12"/><path d="M22 7H2v5h20V7z"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
    </div>
    <div>
      <h3>Planning a birthday party?</h3>
      <p>Celebrate your child's big day with an action-packed gymnastics party at ASF. Available Sundays from September to June — open to all families, no enrollment required.</p>
      <a href="<?php echo esc_url( home_url( '/birthday/' ) ); ?>" class="btn-red">See Birthday Packages</a>
    </div>
  </div>

  <!-- Bottom CTA -->
  <div class="finder-cta-section">
    <p class="section-eyebrow">Still Deciding?</p>
    <h2>We're happy to help you choose</h2>
    <p>Not sure which program fits best? Our coaches can answer your questions, walk you through each option, or arrange a free assessment to see where your child would thrive.</p>
    <div class="finder-cta-btns">
      <a href="mailto:academysportfitness@gmail.com" class="btn-white">Email Us</a>
      <a href="tel:9057800913" class="btn-outline">905-780-0913</a>
    </div>
  </div>
</main>
<?php get_footer(); ?>

