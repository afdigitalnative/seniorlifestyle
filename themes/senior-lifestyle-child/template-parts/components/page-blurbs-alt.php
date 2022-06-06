
<?php
	// fields blurb_image,blurb_title,blurb_text,button_text,button_url,
	$post_slug = $post->post_name;
	$section_title = get_field('section_title');
?>

<section class="section-page-blurbs">
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
				$background_color_scheme = get_sub_field('background_color_scheme');
				
				$is_odd = get_row_index() % 2;
				$row_class = ( (get_row_index() % 2) == 0 ) ? 'content-left' : '';
				$id = str_replace(' ', '-', $blurb_title);
	?>

	<div class="page-blurbs <?php echo $background_color_scheme; ?>" id="<?php echo strtolower($id); ?>">
	    <div class="row <?php echo $row_class; ?>">
			<div class="col-md-4 col-image">
				<a href="<?= $button_url ?>"><img src="<?= $blurb_image['url']; ?>" alt="<?= $blurb_image['alt'] ?>" /></a>
			</div>

			<div class="col-md-8 col-content">
				<div class="content-container">
					<h2 class="h3"><a href="<?= $button_url ?>" title="<?= $blurb_title ?>"><?= $blurb_title ?></a></h2>
					<?= $blurb_content ?>
					<a class="btn-primary-lightblue" href="<?= $button_url ?>"><?= $button_label ?></a>
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