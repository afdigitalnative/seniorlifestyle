
<?php
	// fields blurb_image,blurb_title,blurb_text,button_text,button_url,
	$post_slug = $post->post_name;
	$section_title = get_field('section_title');
?>

<section class="section-page-blurbs">
	<div class="section-header">
	<?php if ($section_title): ?>
		<div class="section-title-with-line">
			<h2><?php the_field('section_title'); ?></h2>
		</div>
	<?php endif; ?>
	<?php if (!empty(get_field('section_body'))): ?>
		<p><?php the_field('section_body'); ?></p>
	<?php endif; ?>
	</div>
	<?php
		
		if( have_rows('page_blurb_repeater') ):

			while( have_rows('page_blurb_repeater') ): the_row();
				// vars
				$blurb_image = get_sub_field ('blurb_image');
				$blurb_icon = get_sub_field ('blurb_icon');
				$blurb_title = get_sub_field ('blurb_title');
				$blurb_content = get_sub_field ('blurb_content');
				$button_label = get_sub_field ('button_label');
				$button_url = get_sub_field ('button_url');
				$background_color_scheme = get_sub_field('background_color_scheme');
				
				$is_odd = get_row_index() % 2;
				$row_class = ( (get_row_index() % 2) == 0 ) ? 'content-left' : '';
				$id = str_replace(' ', '-', $blurb_title);
				
				$get_default_content = get_field($blurb_icon, 'option');
				$default_img = $get_default_content[$blurb_icon . '_image'];
				$render_default_img = wp_get_attachment_image($default_img, '', "");

				$image = $render_default_img ? $render_default_img : '<img src="' . $blurb_image['url'] . '" alt="' . $blurb_image['alt'] . '" />';
	?>

	<div class="page-blurbs page-blurbs-alt-2 <?php echo $background_color_scheme; ?>" id="<?php echo strtolower($id); ?>">
	    <div class="row <?php echo $row_class; ?>">
			<div class="col-md-5 col-image">
				<a href="<?= $button_url ?>">
					<?php echo $image; ?>
				</a>
			</div>

			<div class="col-md-7 col-content">
				<div class="content-container">
					<h3>
						<?php if($blurb_icon): ?>
						<span class="lo-card-icon">
							<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon_' . $blurb_icon . '.svg'; ?>" width="40" height="40" />                  
						</span>							
						<?php endif; ?>
						<a href="<?= $button_url ?>" title="<?= $blurb_title ?>"><?= $blurb_title ?></a>
					</h3>
					<?= $blurb_content ?>
					<a class="btn-primary-lightblue btn-small" href="<?= $button_url ?>"><?= $button_label ?></a>
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