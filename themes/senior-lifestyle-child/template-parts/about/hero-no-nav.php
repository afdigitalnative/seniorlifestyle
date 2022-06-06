<?php
    global $post;

    $call_out_overlay = get_field('call_out_overlay') ?: get_the_content();
	
	$background_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
	
?>
<style>
	.hero-loc.no-video:after {
		content: "";
		background-image: url(<?php echo $background_img; ?>);
	}
</style>
<section class="hero-loc <?php if(!$hero_video) echo 'no-video'; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2><?php echo the_title() ?></h2>
				<p><?php echo $call_out_overlay ?></p>
			</div>
			<div class="col-md-6 mt-3 mt-md-0">
				<div class="iframe-container">
				</div>
			</div>			
		</div>
	</div>
</section>