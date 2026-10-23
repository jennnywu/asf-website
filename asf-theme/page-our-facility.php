<?php /* Template Name: Our Facility */ ?>
<?php get_header(); ?>
<main id="main-content">
<?php
// Content is edited in Pages → Our Facility; the theme's default layout shows until that page has content
while ( have_posts() ) : the_post();
    if ( trim( get_the_content() ) ) {
        the_content();
    } else {
        echo asf_pattern_content( 'asf/our-facility-page' );
    }
endwhile;
?>
</main>
<?php get_footer(); ?>
