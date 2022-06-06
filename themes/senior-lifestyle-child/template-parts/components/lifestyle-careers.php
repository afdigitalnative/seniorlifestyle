<?php
/**
 * Template part for displaying Senior Lifestyle Careers ACF fields
 *
 */

$rows = get_field('career_section');
$row_count = count($rows);

if ( $row_count > 1 ) {
?>

<section class="section-wrapper">
	<?php
		if( have_rows('career_section') ):
			while( have_rows('career_section') ): the_row();
			$career_section_title 	= get_sub_field ('career_section_title');
			$career_section_text 	= get_sub_field ('career_section_text');
			$benefits_title 		= get_sub_field ('benefits_title');
			$benefits_content 		= get_sub_field ('benefits_content');
			$section_button 		= get_sub_field ('section_button');
			$section_button_url 	= get_sub_field ('section_button_url');
	?>

	<div class="container sl-section-content">
		<div class="title-wrap"><h2 class="entry-title"><?= $career_section_title ?></h2></div>
			<div>
			<p><?=$career_section_text?></p>
			</div>

			<div>
			<h3><?= $benefits_title ?></h3>
				<?= $benefits_content ?>

			<?php if ($section_button_url && $section_button != "") { ?>
				<a class="btn-primary-navy" target="_blank" href="<?= $section_button_url ?>"><?= $section_button ?></a>
			<?php } ?>

			</div>
	</div>

<?php endwhile; endif;
	  wp_reset_postdata();

?>
</section>

<section class="section-wrapper sl-section-content">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<h2><?php the_field('video_title'); ?></h2>
			<?php the_field('video_text'); ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="iframe-container">
				<iframe width="560" height="315" src="<?php the_field('video_url'); ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>

<?php

} else {
	// do nothing, load nothing
}
?>

<section class="section-wrapper careers-testimonial">
 	<?php echo do_shortcode('[testimonials-slider]'); ?>
</section>

<section class="section-wrapper">

 	<?php the_field('eoe_statement'); ?>
</section>

