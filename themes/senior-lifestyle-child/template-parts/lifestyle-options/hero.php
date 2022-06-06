<?php
    global $post;
    $featured_img = get_post_thumbnail_id(get_the_ID(), 'full');

    $hero_section_fields = get_field('hero_section');
    $hero_title = $hero_section_fields['title'];
    $hero_content = $hero_section_fields['content'];
	$hero_video = $hero_section_fields['hero_video'];
	$hero_links = $hero_section_fields['hero_links'];
	
	$background_img = $hero_video ? '' : wp_get_attachment_url($featured_img);
	
	$memory_care = is_page('memory-care-for-seniors');
?>
<style>
	.content-area.lifestyle-options-page .hero-loc.no-video:after {
		content: "";
		background-image: url(<?php echo $background_img; ?>);
	}
</style>
<section class="hero-loc <?php if(!$hero_video) echo 'no-video'; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2><?php echo $hero_title; ?></h2>
				<?php echo $hero_content; ?>
			</div>
			<div class="col-md-6 mt-3 mt-md-0">
				<div class="iframe-container">
					<?php echo $hero_video; ?>
				</div>
				<?php echo $hero_links; ?>
			</div>			
		</div>
	</div>
</section>

<nav id="navbar" class="in-page-nav-bar">
	<div class="in-page-nav-toggle px-3 mobile-only">
		<div>View on this page:</div>
		<div class="active-page-link"></div>
		<i class="fas fa-sort"></i>
	</div>
	<ul class="in-page-links collapse">
		<li>
			<a href="#section-loc-who">
				<span>Who is Right?</span>
			</a>
		</li>
		<?php if(!$memory_care): ?>
		<li>
			<a href="#section-services">
				<span>Services</span>
			</a>
		</li>
		<?php endif; ?>
		<li>
			<a href="#section-daily-life">
				<span>Daily Life</span>
			</a>
		</li>
		<li>
			<a href="#section-loc-how">
				<?php if(!$memory_care): ?>
				<span>How to Find a Community</span>
				<?php else: ?>
				<span>Award Winning Programs</span>
				<?php endif; ?>
			</a>
		</li>
		<li>
			<a href="#section-loc-values">
				<span>Values</span>
			</a>
		</li>
		<?php 
		$faq_section = get_field('faq_section');
		$faq_accordion = $faq_section['faq_accordion'];
		while (have_rows('faq_section')) : the_row();
			if (have_rows('faq_accordion')) :
		?>
		<li>
			<a href="#section-faq">
				<span>FAQ</span>
			</a>
		</li>
		<?php endif; endwhile; ?>
	</ul>
</nav>