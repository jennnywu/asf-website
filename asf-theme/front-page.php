<?php get_header(); ?>
<main id="main-content">
<?php
// Content is edited in Pages → Home (Settings → Reading → "A static page", Homepage: Home);
// the theme's default layout shows until that page has content
$asf_front = 'page' === get_option( 'show_on_front' ) ? get_post( get_option( 'page_on_front' ) ) : null;
if ( $asf_front && trim( $asf_front->post_content ) ) {
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
} else {
    echo asf_pattern_content( 'asf/home-page' );
}
?>
</main>
<?php get_footer(); ?>
