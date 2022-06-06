<?php
     /*
        Uses ACF to fill out horizontal card.
     */ 

    global $post;
    $featured_img = get_post_thumbnail_id(get_the_ID(), 'full');

    $callout_title = get_field('card_title');
    $callout_content = get_field('card_content');
	$callout_image = get_field('card_image');
	$callout_link = get_field('card_link');
?>

<div class="horizontal-card card my-6" style="max-width: 1000px;">
  <div class="row no-gutters">
    <div class="col-md-8">
        <div class="card-body">
            <h3 class="card-title"><?php echo $callout_title; ?></h3>
            <?php echo $callout_content; ?>
            <?php if($callout_link): ?>	
                <a href="<?php echo $callout_link['url'] ?>" class="btn-primary-lightblue"><?php echo $callout_link['title'] ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-4">
        <img class="card-img" src="<?php echo $callout_image; ?>" alt="" />
    </div>
  </div>
</div>