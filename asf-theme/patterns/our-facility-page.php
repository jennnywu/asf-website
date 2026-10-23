<?php
/**
 * Title: Our Facility page
 * Slug: asf/our-facility-page
 * Categories: asf
 * Description: The full Our Facility page: header, intro photo with equipment and amenities lists, and the photo gallery (opens in a lightbox).
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$photos = get_template_directory_uri() . '/assets/photos/facility/';
$lock   = '"lock":{"move":true,"remove":true}';
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">About Us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Our Facility</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">FIG-regulated equipment and a world-class space for every level of gymnast</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Page content"},<?php echo $lock; ?>,"className":"inner-page","layout":{"type":"default"}} -->
<div class="wp-block-group inner-page"><!-- wp:group {"metadata":{"name":"Facility intro"},<?php echo $lock; ?>,"className":"facility-intro","layout":{"type":"default"}} -->
<div class="wp-block-group facility-intro"><!-- wp:image {"sizeSlug":"full",<?php echo $lock; ?>,"className":"img-placeholder"} -->
<figure class="wp-block-image size-full img-placeholder"><img src="<?php echo esc_url( $photos . '1-facility.jpg' ); ?>" alt="ASF Facility"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Intro text"},<?php echo $lock; ?>,"className":"facility-intro-text","layout":{"type":"default"}} -->
<div class="wp-block-group facility-intro-text"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">World-Class Training Space</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">A Gym Built for Every Level</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"facility-label"} -->
<p class="facility-label">Equipment</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"facility-list"} -->
<ul class="wp-block-list facility-list"><!-- wp:list-item -->
<li><strong>1,200 sq ft</strong> of dedicated training space</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>FIG-regulated gymnastics equipment throughout</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>In-ground trampoline</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>40' Tumbl Trak</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>In-ground foam pit with high bar</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Tumbling strip leading into pit</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>40' × 40' competition sprung floor</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>6 high balance beams</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>2 sets of uneven bars</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>2 strap bars</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>2 adjustable training bars</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph {"className":"facility-label"} -->
<p class="facility-label">Amenities</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"facility-list"} -->
<ul class="wp-block-list facility-list"><!-- wp:list-item -->
<li>Dedicated snack room / kitchen</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>2 washrooms</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Parent viewing area</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"section-divider"} -->
<hr class="wp-block-separator has-alpha-channel-opacity section-divider"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Inside the Gym</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"facility-gallery-title"} -->
<h2 class="wp-block-heading facility-gallery-title">Equipment &amp; Spaces</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"facility-gallery-intro"} -->
<p class="facility-gallery-intro">Our 1,200 sq ft Olympic-level training facility is equipped with FIG-regulated apparatus, competition sprung flooring, and everything athletes need to train and grow at every level - from their first cartwheel to provincial competitions. View our facility’s photo gallery below.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Photo gallery"},<?php echo $lock; ?>,"className":"facility-gallery","layout":{"type":"default"}} -->
<div class="wp-block-group facility-gallery"><?php
foreach ( [ 2, 3, 4, 5, 6, 7, 8, 1 ] as $n ) {
    echo '<!-- wp:image {"sizeSlug":"full","metadata":{"name":"Gallery photo"},"className":"gallery-placeholder"} -->' . "\n";
    echo '<figure class="wp-block-image size-full gallery-placeholder"><img src="' . esc_url( $photos . $n . '-facility.jpg' ) . '" alt="ASF Facility"/></figure>' . "\n";
    echo '<!-- /wp:image -->' . "\n\n";
}
?></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
