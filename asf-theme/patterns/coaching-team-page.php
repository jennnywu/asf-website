<?php
/**
 * Title: Coaching Team page
 * Slug: asf/coaching-team-page
 * Categories: asf
 * Description: The full Coaching Team page: header, intro, coach list and certification note.
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1200
 */

$photos = get_template_directory_uri() . '/assets/photos/coaching-team/';
$lock   = '"lock":{"move":true,"remove":true}';
?>
<!-- wp:group {"metadata":{"name":"Page header"},<?php echo $lock; ?>,"className":"page-hero","layout":{"type":"default"}} -->
<div class="wp-block-group page-hero"><!-- wp:paragraph {"className":"section-eyebrow"} -->
<p class="section-eyebrow">About Us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Coaching Team</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-tagline"} -->
<p class="page-hero-tagline">Certified coaches who are passionate about every child’s development</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Intro"},"className":"team-intro","layout":{"type":"default"}} -->
<div class="wp-block-group team-intro"><!-- wp:paragraph -->
<p>Our team of professionally trained gymnastics coaches are ready to bring out the best in your child. All our staff have a shared commitment to fostering the development of the complete child. Our company is not just about gymnastics - it’s about the balance of mind and body and creating the foundation for confidence and personal success.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Coach list"},<?php echo $lock; ?>,"className":"team-list","layout":{"type":"default"}} -->
<div class="wp-block-group team-list"><?php
echo asf_coach_block( $photos . '1-coaching-team.jpg', 'Paula Johnson', 'Owner / Head Coach', [
    'In 1995 Paula opened the Academy of Sport and Fitness with a philosophy that all gymnasts should have access to high level coaching and their expertise, no matter what level they aim to achieve. She has maintained this philosophy for over 25 years and runs quality programs focused on personal achievement.',
    'Paula is a fully certified NCCP Level 4 Master Coach and also has a background in sport psychology and certificates in fitness training.',
    'Paula is a former elite gymnast who started her career coaching at the prestigious Seneca College Elite Training Center for Olympic hopefuls in gymnastics, figure skating and tennis.',
    'She has produced many Provincial and National Champions as well as athletes who have proudly represented Canada at the Olympic Games, World Championships, Commonwealth Games and Pan Am Games, to name a few.',
] );
echo asf_coach_block( $photos . '2-coaching-team.jpg', 'Yasmin Salem', 'Coaching Development & Assistant Head Coach', [
    'Yasmin has been coaching at the Academy for 7 years. She did rhythmic and artistic gymnastics growing up which sparked her passion for the sport. She is a full time coach currently studying at Ryerson University. Yasmin brings her knowledge and passion to each child and all our up and coming young coaches.',
] );
echo asf_coach_block( $photos . '3-coaching-team.jpg', 'Quinn McKenney', 'Recreational Program Development & Competitive Coach', [
    'Quinn has been coaching at the Academy for 10 years. She is a former competitive gymnast and Provincial Champion and has represented ASF internationally. Quinn has a BSc in Nutrition and Dietetics and a Masters in Public Health from University of Toronto. Her favourite thing about coaching is seeing the athletes she works with gain confidence in both their gymnastics and themselves as people.',
] );
echo asf_coach_block( $photos . '4-coaching-team.jpg', 'Alondra Arango', 'Recreational Supervisor & Pre-competitive Coach', [
    'Alondra has been coaching for 8 years. She is a former provincial competitive gymnast. Alondra has completed a degree in Children, Childhood and Youth Studies at York University and is currently finishing teacher’s college. She has a caring approach to her coaching and has a soft spot for the youngest ones in the gym. Her passion for gymnastics led her to a career choice in teaching and continued dedication to the sport she loves.',
] );
?></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Certification note"},"className":"cert-note","layout":{"type":"default"}} -->
<div class="wp-block-group cert-note"><!-- wp:paragraph -->
<p>All of our recreational and competitive coaches are certified under the N.C.C.P. (National Coaching Certification Program) for artistic gymnastics and trampoline. They are then required to apprentice with a Senior Staff member prior to receiving their own group. All of our coaches are qualified to teach and spot all gymnastics skills. We select people who have a passion for our sport and train them to use safe and progressive techniques.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
