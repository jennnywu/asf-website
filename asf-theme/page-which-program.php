<?php /* Template Name: Which Program */ ?>
<?php get_header(); ?>
<main id="main-content">
<?php
// Content is edited in Pages → Which Program; the theme's default layout shows until that page has content
while ( have_posts() ) : the_post();
    if ( trim( get_the_content() ) ) {
        the_content();
    } else {
        echo asf_pattern_content( 'asf/which-program-page' );
    }
endwhile;
?>
</main>
<?php get_footer(); ?>
