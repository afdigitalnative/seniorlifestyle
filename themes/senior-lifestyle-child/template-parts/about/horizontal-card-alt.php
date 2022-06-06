<?php
     /*
        Uses ACF to fill out horizontal card.
        Used on the calculator page
        This can likely be rewritten to take variables and consolidated wiht the standard horizontal card
     */ 

    global $post;
    $featured_img = get_post_thumbnail_id(get_the_ID(), 'full');

    $callout_title = get_field('callout_header');
    $callout_content = get_field('callout_body');
	$callout_image = get_field('callout_image');
	$callout_link = get_field('callout_cta_link');
    $callout_cta = get_field("callout_cta");
?>

<div class="horizontal-card card my-6">
  <div class="row no-gutters">
    <div class="col-md-7 text-box">
        <div class="card-body">
            <h3 class="card-title"><?php echo $callout_title; ?></h3>
            <?php echo $callout_content; ?>
            <?php if($callout_link): ?>	
                <a href="<?php echo esc_url($callout_link) ;?>" class="mt-4 btn-primary-lightblue"><?php echo $callout_cta ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-5 img-box">
        <img class="card-img" src="<?php echo esc_url($callout_image["url"]) ;?>" alt="" />
    </div>
  </div>
</div>