<?php
/**
 * Title: Home page
 * Slug: asf/home-page
 * Categories: asf
 * Description: The full home page: photo slideshow, promo banner, video, program tabs, testimonials and Instagram. To add a slideshow photo, duplicate a slide in List View (Slideshow) and replace its image.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$photos = get_template_directory_uri() . '/assets/photos/home/';
$lock   = '"lock":{"move":true,"remove":true}';
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Slideshow"},<?php echo $lock; ?>,"className":"hero","layout":{"type":"default"}} -->
<section class="wp-block-group hero"><!-- wp:group {"metadata":{"name":"Slide (two photos)"},"className":"hero-slide hero-slide-duo","layout":{"type":"default"}} -->
<div class="wp-block-group hero-slide hero-slide-duo"><!-- wp:image {"sizeSlug":"full","className":"duo-img"} -->
<figure class="wp-block-image size-full duo-img"><img src="<?php echo esc_url( $photos . '1-home.jpg' ); ?>" alt="Gymnasts training at Academy of Sport and Fitness"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","className":"duo-img"} -->
<figure class="wp-block-image size-full duo-img"><img src="<?php echo esc_url( $photos . '2-home.jpg' ); ?>" alt="Gymnastics class in action at ASF"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","metadata":{"name":"Slide"},"className":"hero-slide pos-40"} -->
<figure class="wp-block-image size-full hero-slide pos-40"><img src="<?php echo esc_url( $photos . '3-home.jpg' ); ?>" alt="Gymnastics at Academy of Sport and Fitness"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","metadata":{"name":"Slide"},"className":"hero-slide pos-65"} -->
<figure class="wp-block-image size-full hero-slide pos-65"><img src="<?php echo esc_url( $photos . '4-home.jpg' ); ?>" alt="Competitive gymnastics at ASF"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","metadata":{"name":"Slide"},"className":"hero-slide pos-50"} -->
<figure class="wp-block-image size-full hero-slide pos-50"><img src="<?php echo esc_url( $photos . '5-home.jpg' ); ?>" alt="Summer camp at ASF"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Headline and buttons"},<?php echo $lock; ?>,"className":"hero-content","layout":{"type":"default"}} -->
<div class="wp-block-group hero-content"><!-- wp:paragraph {"className":"hero-eyebrow"} -->
<p class="hero-eyebrow">Serving the Greater Toronto Area</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"hero-title"} -->
<h1 class="wp-block-heading hero-title">Where Every Child Finds Their Strength</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-sub"} -->
<p class="hero-sub">Recreational gymnastics, competitive programs, and summer camps for kids of all ages in Richmond Hill, Markham &amp; York Region.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-btns"} -->
<div class="wp-block-buttons hero-btns"><!-- wp:button {"className":"btn-primary"} -->
<div class="wp-block-button btn-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/which-program/' ) ); ?>">View Programs</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"btn-outline"} -->
<div class="wp-block-button btn-outline"><a class="wp-block-button__link wp-element-button" href="https://app.jackrabbitclass.com/regv2.asp?id=540626" target="_blank" rel="noreferrer noopener">Register Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<?php echo asf_home_promo_banner(); ?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Video"},<?php echo $lock; ?>,"className":"video-section","layout":{"type":"default"}} -->
<section class="wp-block-group video-section"><!-- wp:group {"className":"video-inner","layout":{"type":"default"}} -->
<div class="wp-block-group video-inner"><!-- wp:group {"className":"video-text","layout":{"type":"default"}} -->
<div class="wp-block-group video-text"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">See It In Action</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">A Gym Built for Every Child</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>From their first cartwheel to competing at the provincial level — we have a program that grows with your child. Our Olympic-level facility is home to recreational gymnastics, competitive training, and some of the best summer camps in the GTA.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefits-link"} -->
<p class="benefits-link"><a href="<?php echo esc_url( home_url( '/benefits/' ) ); ?>">Why gymnastics? Read about the benefits →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:embed {"url":"https://www.youtube.com/watch?v=hQQETAwkEvo","type":"video","providerNameSlug":"youtube","responsive":true,"className":"video-embed wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube video-embed wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://www.youtube.com/watch?v=hQQETAwkEvo
</div></figure>
<!-- /wp:embed --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","metadata":{"name":"Programs"},<?php echo $lock; ?>,"className":"programs-section","layout":{"type":"default"}} -->
<section class="wp-block-group programs-section"><!-- wp:group {"className":"section-header","layout":{"type":"default"}} -->
<div class="wp-block-group section-header"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">Our Programs</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Gymnastics for Every Stage</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Choose from a full range of programs designed for different ages, goals, and skill levels.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"metadata":{"name":"Program tabs"},<?php echo $lock; ?>,"className":"program-tabs"} -->
<div class="wp-block-buttons program-tabs"><?php
echo asf_home_program_tab( 'Recreational', 'program-recreational', 'cartwheel' );
echo asf_home_program_tab( 'Xcel / Advanced', 'program-xcel', 'star' );
echo asf_home_program_tab( 'Competitive', 'program-competitive', 'trophy' );
echo asf_home_program_tab( 'Camps', 'program-camps', 'sun' );
echo asf_home_program_tab( 'Birthdays', 'program-birthdays', 'balloon' );
?></div>
<!-- /wp:buttons -->

<!-- wp:group {"metadata":{"name":"Program panels"},<?php echo $lock; ?>,"className":"program-panels","layout":{"type":"default"}} -->
<div class="wp-block-group program-panels"><?php
echo asf_home_program_panel( 'program-recreational', 'Recreational', $photos . '6-home.jpg', 'Recreational gymnastics', 'pos-30', 'Recreational Classes',
    'Come join the fun and spark the love of the sport in your child! A variety of recreational classes are offered to suit your needs. Sign your child up for a fabulous learning experience with fun, fitness, and gymnastics development!', '/recreational-classes/' );
echo asf_home_program_panel( 'program-xcel', 'Xcel / Advanced', $photos . '7-home.jpg', 'Xcel and Advanced program', '', 'Xcel / Advanced Program',
    'A program designed for kids who wish to explore gymnastics at a more challenging level and enhance personal confidence. Build skills at your own pace in a supportive environment.', '/xcel/' );
echo asf_home_program_panel( 'program-competitive', 'Competitive', $photos . '8-home.jpg', 'Competitive team', 'pos-30', 'Competitive Team',
    'Our competitive program offers athletes the opportunity to train at a high level and compete provincially and nationally. Advanced programs available for dedicated athletes.', '/competitive-team/' );
echo asf_home_program_panel( 'program-camps', 'Camps', $photos . '9-home.jpg', 'Summer camp', 'pos-65', 'Camps',
    'Weekly programs designed for kids to have fun, learn new skills, get exercise, and meet new friends. We offer Summer, Winter, and March Break camps.', '/camp/' );
echo asf_home_program_panel( 'program-birthdays', 'Birthdays', '', '', '', 'Birthday Parties',
    'Make your child’s birthday unforgettable at ASF! Our gym parties include supervised activities, use of equipment, and a dedicated party space. Book yours today.', '/birthday/' );
?></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","metadata":{"name":"Testimonials"},<?php echo $lock; ?>,"className":"testimonials","layout":{"type":"default"}} -->
<section class="wp-block-group testimonials"><!-- wp:group {"className":"testimonials-inner","layout":{"type":"default"}} -->
<div class="wp-block-group testimonials-inner"><!-- wp:group {"className":"section-header","layout":{"type":"default"}} -->
<div class="wp-block-group section-header"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">What Families Say</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Praise for The Academy</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Testimonial cards"},"className":"testimonials-grid","layout":{"type":"default"}} -->
<div class="wp-block-group testimonials-grid"><?php
echo asf_home_testimonial( '“My family had a fantastic experience at the Academy of Sport and Fitness. I sent my children for summer camp and they loved the variety of activities and equipment they got to try. The facility was large and spacious with excellent Covid protocols in place which made me feel my children were always safe. I was so impressed with the summer camp program that I signed my children up for yearly classes as well. The staff have always been friendly and supportive and allowed my kids to enjoy every minute of gymnastics classes”', '- Sherri Hassard (Parent)' );
echo asf_home_testimonial( '“I signed my children up for classes this past September at the Academy of Sport and Fitness. Unfortunately due to Covid -19, Ontario went into lockdown and the gym had to shut down. I must say the Academy went above and beyond offering free Zoom classes for kids of all ages while the club was closed during Covid lockdowns. I really appreciated that my kids were able to stay active through these fun online classes plus continue to stay connected with other children their age. The coaches put a lot of effort into creating different class activities that incorporated gymnastics in a safe way from home along with games, contests and crafts. The club even ran Christmas and Spring break camps online which my children loved!”', '- Liliana Guzman (Parent)' );
echo asf_home_testimonial( '“My two daughters joined their recreational classes prior to COVID and, when we got back to the gym after lockdown, their protocols for re-opening were well communicated and their top priority was keeping everyone safe and informed. Overall, they have been great with crediting the classes we missed and we look forward to getting started again this summer!”', '- Mahin Namdari (Parent)' );
?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","metadata":{"name":"Instagram"},<?php echo $lock; ?>,"className":"instagram-section","layout":{"type":"default"}} -->
<section class="wp-block-group instagram-section"><!-- wp:heading -->
<h2 class="wp-block-heading">Follow Along</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"instagram-handle"} -->
<p class="instagram-handle"><a href="https://www.instagram.com/asfgymnastics/" target="_blank" rel="noreferrer noopener">@asfgymnastics</a></p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[instagram-feed]
<!-- /wp:shortcode --></section>
<!-- /wp:group -->
