<?php
/**
 * Template part for displaying Senior Lifestyle Values
 *
 */
?>

<section class="section-wrapper">
    <?php
		if( have_rows('value_sections') ):
			while( have_rows('value_sections') ): the_row();
			$section_image = get_sub_field ('section_image');
			$section_title = get_sub_field ('section_title');
            $section_text = get_sub_field ('text_block');
            $section_testimonial = get_sub_field ('testimonial');
            $section_name = get_sub_field ('testimonial_name');
            $section_relationship = get_sub_field ('testimonial_relationship');
	?>
    <div class="container lifestyle-activities">
        <div class="title-wrap">
            <h2 class="entry-title"><?= $section_title ?></h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mobile-align">
                        <div class="col-md-7 mobile-order pad-right ">
                            <?= $section_text ?>
                        </div>
                        <div class="col-md-5 mobile-order"><img src="<?= $section_image['url']; ?>" alt="<?= $section_image['alt'] ?>" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="testimonials">
        <div class="testimonials-row-container">
            <div class="testimonials-body">
                <?= $section_testimonial ?>
            </div>
            <h3><?= $section_name ?></h3>
            <h4><?= $section_relationship ?></h4>
        </div>
    </div>

    <?php endwhile; endif;
	  wp_reset_postdata();
?>
</section>
