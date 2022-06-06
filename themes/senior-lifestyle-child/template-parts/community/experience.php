<?php

//
// EXPERIENCE BOXES
//

?>

<section id="experience_section" class="experience-section">
    <div class="container">
		<h2 class="community-section-title ml-3 text-left">
			What's Included?
			<span class="line-top"></span>
		</h2>
        <?php if (have_rows('amenity_boxes')) :
			$i = 0;
            while (have_rows('amenity_boxes')) : $row = the_row(); ?>
                <?php
                $box_img = get_sub_field('box_image');
                $box_excerpt = get_sub_field('box_excerpt');
                //Default content
                $get_default_content = get_field($row['acf_fc_layout'], 'option');
                $default_img = $get_default_content[get_row_layout() . '_image'];
                $default_text = $get_default_content[get_row_layout() . '_text'];
                //Choose between custom content or default
                $img = $box_img ? $box_img : $default_img;
                $render_img = wp_get_attachment_image($img, 'col-6-img', "");
                $render_box_excerpt = $box_excerpt ? $box_excerpt : $default_text;
				
                ///$i = get_row_index();
				
				if (get_row_layout() == 'programs') {
					
					continue;
					
				}
				
                ?>
                <div class="amenity-row row">
                    <?php if ($i % 2 !== 0 && $render_img) : ?>
                        <div class="col-md-6 pb-3 pb-md-0 img-wrapper">
                            <?php echo $render_img; ?>
                        </div>
                    <?php endif; ?>
                    <div class="content-wrapper col-md-6">
                        <h3 class=<?php echo ($i % 2 === 0) ? "left-line" : "right-line"; ?>><?php the_sub_field('box_title'); ?></h3>
                        <!-- amenity-excerpt-blur -->
						<div class="amenity-excerpt <?php if (get_row_layout() != 'programs') echo ''; ?>">
							<?php echo $render_box_excerpt; ?>
							 <?php the_sub_field('box_content'); ?>
						</div>
                        <?php if (get_row_layout() == 'programs') :
                            $links = get_sub_field('box_content');
                            if ($links) {
                                if (isset($links) && sizeof($links) > 0) {
                                    if (sizeof($links) == 1) {
                                        $links = array($links);
                                        $links = $links[0];
                                    }
                                    foreach ($links as $link) :
                                        if (isset($link['calendar_link']['url']) && isset($link['calendar_link']['title'])) : ?>
                                            <div class="amenity-content">
                                                <a href="<?php echo $link['calendar_link']['url'] ?>" target="_blank"><?php echo $link['calendar_link']['title']; ?></a>
                                            </div>
                            <?php
                                        endif;
                                    endforeach;
                                }
                            }
                            ?>
                        <?php elseif (get_sub_field('box_content')) : ?>
                            <div class="amenity-content amenity-content-reg">
                                <?php //the_sub_field('box_content'); ?>
                            </div>
                            
                        <?php endif; ?>
						<div class="more-content-btn d-none" data-text-more="Learn More">Learn More</div>
                    </div>
                    <?php if ($i % 2 === 0 && $render_img) : ?>
                        <div class="col-md-6 pb-3 pb-md-0 img-wrapper">
                            <?php echo $render_img; ?>
                        </div>
                    <?php endif; ?>
                </div>
        <?php $i++; endwhile;
        endif; ?>
    </div> <!-- // .container -->
</section> <!-- // .experienc-section -->