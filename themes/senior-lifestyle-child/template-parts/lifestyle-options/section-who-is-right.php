<?php
    global $post;

    $who_section_fields = get_field('who_is_right');
    $who_title = $who_section_fields['title'];
    $who_content = $who_section_fields['content'];
	$who_image = $who_section_fields['image'];
?>

<section id="section-loc-who" class="section-loc-who <?php if( !$who_image ) echo 'no-image' ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mb-4">
				<div class="section-title-with-line line-top <?php echo $loc_color_scheme; ?>">
					<h2><?php echo $who_title; ?></h2>
					<span class="line-top"></span>
				</div>
			</div>
			<?php if( $who_image ): ?>			
			<div class="col-sm-7">
				<?php echo $who_content; ?>
			</div>
			<div class="col-sm-5 px-5 py-3 py-md-0 px-md-3">
				<div class="wrap-img">
					<img src="<?php echo esc_url($who_image['url']); ?>" alt="<?php echo esc_attr($who_image['alt']); ?>" />
				</div>
			</div>
			<?php else: ?>
			<div class="col-sm-12">
				<?php echo $who_content; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<svg class="square-box" width="327px" height="326px" viewBox="0 0 327 326" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
	  <g id="squares" transform="translate(1 1)" opacity="0.35451373">
		<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(0 192)" id="Stroke-1" fill="none" fill-rule="evenodd" stroke-width="2" />
		<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(191 193)" id="Stroke-3" fill="none" fill-rule="evenodd" stroke-width="2" />
		<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(3 0)" id="Stroke-4" fill="none" fill-rule="evenodd" stroke-width="2" />
		<path d="M0 134L132 134L132 0L0 0L0 134Z" transform="translate(99 95)" id="Stroke-6" fill="none" fill-rule="evenodd" stroke-width="2" />
		<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(193 1)" id="Stroke-7" fill="none" fill-rule="evenodd" stroke-width="2" />
	  </g>
	</svg>	
</section>