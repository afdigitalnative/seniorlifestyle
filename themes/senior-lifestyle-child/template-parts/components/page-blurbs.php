
<?php
	// fields blurb_image,blurb_title,blurb_text,button_text,button_url,
	$post_slug = $post->post_name;
	$section_title = get_field('section_title');

	if ($post_slug == 'about') {
		$Htag = 'h4';
	} else if (!empty($section_title)) {
		$Htag ='h3';
	} else {
		$Htag = 'h2';
	}

?>

<section class="section-wrapper">
	<?php if ($section_title): ?>
		<h3><?php the_field('section_title'); ?></h3>
	<?php endif; ?>
	<?php if (!empty(get_field('section_body'))): ?>
		<?php the_field('section_body'); ?>
	<?php endif; ?>
	<?php
		
		if( have_rows('page_blurb_repeater') ):

			while( have_rows('page_blurb_repeater') ): the_row();
				// vars
				$blurb_image = get_sub_field ('blurb_image');
				$blurb_title = get_sub_field ('blurb_title');
				$blurb_content = get_sub_field ('blurb_content');
				$button_label = get_sub_field ('button_label');
				$button_url = get_sub_field ('button_url');
	?>

	<div class="page-blurbs">
	    <div class="row">
			<div class="content-wrapper">
				<div class="Grid-cell">
					<div class="Grid Grid--gutters Grid--1of3 Grid--nested">
						<div class="Grid-cell">
							<a href="<?= $button_url ?>"><img src="<?= $blurb_image['url']; ?>" alt="<?= $blurb_image['alt'] ?>" /></a>
						</div>

						<div class="Grid-cell">
							<div class="content-container">
					            <<?= $Htag ?>><a href="<?= $button_url ?>" title="<?= $blurb_title ?>"><?= $blurb_title ?></a></<?= $Htag ?>>
								<?= $blurb_content ?>
								<a class="btn-primary-navy" href="<?= $button_url ?>"><?= $button_label ?></a>
							</div>
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</div>

<?php
		endwhile;
	endif;
	wp_reset_postdata();

?>
</section>