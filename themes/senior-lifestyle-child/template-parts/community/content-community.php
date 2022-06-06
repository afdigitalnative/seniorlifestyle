<?php

//
// BANNER HERO SECTION
//
get_template_part('template-parts/community/hero');

//
//
//
get_template_part('template-parts/community/alerts');

//
// CONTENT VIDEO SECTION
//
get_template_part('template-parts/community/welcome-video');

get_template_part('template-parts/community/announcements');

$valid_terms = ['assisted-living', 'memory-care'];
$show_award = has_term($valid_terms, 'community_category');
//$show_sa_award = is_single('the-carlisle-palm-beach');
$show_chester_award = is_single('wellington-at-hersheys-mill');
$show_five_start_award = is_single('lincolnwood-place');
?>

<?php

//
// LIFESTYLE OPTIONS SECTION
//
get_template_part('template-parts/community/lifestyle-options');

//
// BLOG EVENTS
//
get_template_part('template-parts/community/blog-events');

//
// FLOOR PLANS SECTION
//
get_template_part('template-parts/community/floor-plans');

//
// VIRTUAL TOURS
//
get_template_part('template-parts/community/virtual-tour');

//
// IMAGE GALLERY SECTION
//
get_template_part('template-parts/community/photo-gallery');

//
// SERVICES SECTION
//
get_template_part('template-parts/community/experience');

//
// REVIEWS
//
//    get_template_part( 'template-parts/community/reviews' );

//
// TESTIMONIALS SECTION
//
get_template_part('template-parts/community/testimonials');

//
// SCHEDULE TOUR SECTION
//
get_template_part('template-parts/community/schedule-tour');

//
// RENT CAFE
//
// get_template_part('template-parts/community/rent-cafe');

?>