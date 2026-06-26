<?php get_header(); ?>

<main id="main-content">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="page-hero">
      <div class="page-hero-inner">
        <h1 class="page-title"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="page-content container">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
