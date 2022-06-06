<?php

/**
 * Template part for displaying Senior Lifestyle Activities ACF fileds
 *
 */
?>

<section class="section-wrapper">
	<?php
	if (have_rows('activity_sections')) :
		while (have_rows('activity_sections')) : the_row();
			$section_image = get_sub_field('section_image');
			$section_title = get_sub_field('section_title');
			$additional_text = get_sub_field('additional_text');
			$width_class = $section_image ? '-md-6' : '';
	?>
			<div class="lifestyle-activities">
				<div class="row mb-5">
					<div class="col<?php echo $width_class ?>">
						<?php
						if (have_rows('text_block')) :
							while (have_rows('text_block')) : the_row();
								$block_text = get_sub_field('block_text');
						?>
								<?php if ($section_title) : ?>
									<h2><?= $section_title ?></h2>
								<?php endif; ?>
								<?php if ($block_text) : ?>
									<?= $block_text ?>
								<?php endif; ?>
						<?php endwhile;
						endif; ?>
					</div>
					<?php if ($section_image) : ?>
						<div class="col-md-6"><img src="<?= $section_image['url']; ?>" alt="<?= $section_image['alt'] ?>" width="498" height="332" /></div>
					<?php endif; ?>
				</div>
				<?php if ($additional_text) : ?>
					<div class="row">
						<?php echo $additional_text; ?>
					</div>
				<?php endif; ?>
			</div>
	<?php endwhile;
	endif;
	wp_reset_postdata();
	?>
</section>