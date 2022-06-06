<?php
    global $post;
    $featured_img = get_post_thumbnail_id(get_the_ID(), 'full');
	$background_img =wp_get_attachment_url($featured_img);
	
?>
<style>
	.content-area.persona-page .hero-persona:after {
		content: "";
		background-image: url(<?php echo $background_img; ?>);
	}
</style>
<section class="hero-persona">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="h2"><?php echo get_the_title(); ?></h1>
				<?php the_content() ?>
			</div>
			<div class="col-md-6 mt-3 mt-md-0">

			</div>			
		</div>
	</div>	
</section>

<nav id="navbar" class="in-page-nav-bar d-none d-md-block">
	<div class="in-page-nav-toggle px-3 mobile-only">
		<div>View on this page:</div>
		<div class="active-page-link"></div>
		<i class="fas fa-sort"></i>
	</div>
	<ul class="in-page-links collapse">
		<li>
			<a href="#section-experience">
				<span>Who to Expect?</span>
			</a>
		</li>
		<li>
			<a href="#section-lifestyle-options">
				<span>Levels of Care</span>
			</a>
		</li>
		<li>
			<a href="#section-process">
				<span>The Process</span>
			</a>
		</li>
		<li>
			<a href="#section-resources">
				<span>Resources</span>
			</a>
		</li>		
	</ul>
</nav>