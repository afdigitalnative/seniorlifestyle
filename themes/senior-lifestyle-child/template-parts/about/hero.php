<?php
    global $post;
    $featured_img = get_the_post_thumbnail_url();
    $hero_content = get_the_content();
    $hero_title = get_the_title();
?>
<section class="hero">
	<div class="container">
		<div class="row py-5 mb-5">
			<div class="col-md-6 center-items">
				<h2><?php echo $hero_title; ?></h2>
				<?php echo $hero_content; ?>
			</div>
			<div class="col-md-6 mt-3 mt-md-0">
				<?php if( $featured_img ){ ?>
                	<img class="hero-img-right" src="<?php echo $featured_img; ?>" alt="Hero Image"/>
				<?php }; ?>
			</div>			
		</div>
	</div>
</section>