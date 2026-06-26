<?php get_header(); ?>

<main id="main-content">
  <?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'site-page' ); ?>>
        <div class="page-hero">
          <div class="page-hero-inner">
            <h1 class="page-title"><?php the_title(); ?></h1>
          </div>
        </div>
        <div class="page-content container">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile;
  endif; ?>
</main>

<?php get_footer(); ?>
