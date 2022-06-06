<?php

//
// EXPERIENCE BOXES
//

?>

<section id="section-experience" class="experience-section">
    <div class="container">
		<div class="section-title-with-line line-primary-yellow mb-md-5 m-show">
			<h2>
				What to Expect?
			</h2>
		</div>
        <?php if (have_rows('amenity_boxes')) :
			$i = 0;
            while (have_rows('amenity_boxes')) : $row = the_row(); ?>
                <?php
                $box_img = get_sub_field('box_image');
                $render_img = wp_get_attachment_image($box_img, 'col-6-img', "");
				
                ///$i = get_row_index();				
                ?>
                <div class="amenity-row row">
                    <?php if ($i % 2 !== 1 && $render_img) : ?>
                        <div class="col-md-6 pb-3 pb-md-0 img-wrapper">
                            <?php echo $render_img; ?>
                        </div>
                    <?php endif; ?>
                    <div class="content-wrapper col-md-6 <?php if($i % 2 === 1) echo 'content-left'; else echo 'content-right'; ?>">
                        <h3><?php the_sub_field('box_title'); ?></h3>
                        <!-- amenity-excerpt-blur -->
						<div class="amenity-excerpt">
							 <?php the_sub_field('box_content'); ?>
						</div>

						<!-- <div class="more-content-btn d-none" data-text-more="Learn More">Learn More</div> -->
                    </div>
                    <?php if ($i % 2 === 1 && $render_img) : ?>
                        <div class="col-md-6 pb-3 pb-md-0 img-wrapper">
                            <?php echo $render_img; ?>
                        </div>
                    <?php endif; ?>
                </div>
        <?php $i++; endwhile;
        endif; ?>
    </div> <!-- // .container -->
</section> <!-- // .experienc-section -->