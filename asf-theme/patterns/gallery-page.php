<?php
/**
 * Title: Gallery page
 * Slug: asf/gallery-page
 * Categories: asf
 * Description: The full Gallery page: header, category filter buttons and the photo grid with lightbox. Each photo is an Image block; its category is set in Block sidebar → Advanced → Additional CSS class, e.g. "gallery-item cat-camps" (categories: cat-facility, cat-camps, cat-recreational, cat-competitive). Add a photo by duplicating one in List View and replacing the image. Filter buttons link to #facility, #camps, etc.; keep those links so filtering works (only the button text is meant to change).
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$fac  = get_template_directory_uri() . '/assets/photos/facility/';
$lock = '"lock":{"move":true,"remove":true}';
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">ASF in Action</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Gallery</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">A look inside the gym and our programs</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Gallery"},<?php echo $lock; ?>,"className":"gallery-section","layout":{"type":"default"}} -->
<div class="wp-block-group gallery-section"><!-- wp:buttons {"metadata":{"name":"Filter buttons"},<?php echo $lock; ?>,"className":"filter-bar"} -->
<div class="wp-block-buttons filter-bar"><?php
echo asf_gallery_filter_button( 'All', 'all' );
echo asf_gallery_filter_button( 'Facility', 'facility' );
echo asf_gallery_filter_button( 'Camps', 'camps' );
echo asf_gallery_filter_button( 'Recreational', 'recreational' );
echo asf_gallery_filter_button( 'Competitive', 'competitive' );
?></div>
<!-- /wp:buttons -->

<!-- wp:group {"metadata":{"name":"Photo grid"},<?php echo $lock; ?>,"className":"gallery-grid","layout":{"type":"default"}} -->
<div class="wp-block-group gallery-grid"><?php
// Facility (real photos)
echo asf_gallery_photo( $fac . '2-facility.jpg', 'ASF gymnasium overview showing floor and equipment', 'facility' );
echo asf_gallery_photo( $fac . '3-facility.jpg', 'Gymnastics bars and beam apparatus at ASF', 'facility' );
echo asf_gallery_photo( $fac . '4-facility.jpg', 'ASF gym floor and spring floor area', 'facility' );
echo asf_gallery_photo( $fac . '5-facility.jpg', 'Foam pit and high bar at Academy of Sport and Fitness', 'facility' );
echo asf_gallery_photo( $fac . '6-facility.jpg', 'Balance beams and training area at ASF', 'facility' );
echo asf_gallery_photo( $fac . '7-facility.jpg', 'Vault and runway at Academy of Sport and Fitness', 'facility' );
echo asf_gallery_photo( $fac . '8-facility.jpg', 'ASF gymnasium — full view of training facility', 'facility' );
echo asf_gallery_photo( $fac . '1-facility.jpg', 'Entrance and lobby of Academy of Sport and Fitness', 'facility' );
// Camps (placeholders until photos are added)
echo asf_gallery_placeholder( 'camps', '4-3', 'Camps' );
echo asf_gallery_placeholder( 'camps', '3-4' );
echo asf_gallery_placeholder( 'camps', '4-3' );
echo asf_gallery_placeholder( 'camps', '1-1' );
echo asf_gallery_placeholder( 'camps', '4-3' );
echo asf_gallery_placeholder( 'camps', '3-4' );
// Recreational (placeholders)
echo asf_gallery_placeholder( 'recreational', '4-3', 'Recreational' );
echo asf_gallery_placeholder( 'recreational', '1-1' );
echo asf_gallery_placeholder( 'recreational', '3-4' );
echo asf_gallery_placeholder( 'recreational', '4-3' );
echo asf_gallery_placeholder( 'recreational', '4-3' );
// Competitive (placeholders)
echo asf_gallery_placeholder( 'competitive', '3-4', 'Competitive' );
echo asf_gallery_placeholder( 'competitive', '4-3' );
echo asf_gallery_placeholder( 'competitive', '1-1' );
echo asf_gallery_placeholder( 'competitive', '4-3' );
echo asf_gallery_placeholder( 'competitive', '3-4' );
?></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
