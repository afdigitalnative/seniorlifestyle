<?php
//
// LIFESTYLE OPTIONS
//

$lifestyle_options_section = get_field('lifestyle_options_section') ? get_field('lifestyle_options_section') : '';
$lifestyle_options_header = $lifestyle_options_section['lo_section_header'];

?>
<section id="lifestyle_options" class="lifestyle-options-section">
    <div class="container">
        <h2 class="community-section-title ml-3 text-left">
			<?php echo $lifestyle_options_header; ?>
			<?php if(have_rows('announcement_section')) : ?>
			<span class="line-top"></span>
			<?php endif; ?>
		</h2>
        <?php while (have_rows('lifestyle_options_section')) : the_row(); ?>
            <?php if (have_rows('lo_options_cards')) : ?>
                <?php while (have_rows('lo_options_cards')) : $row = the_row(); ?>
                    <?php
						$i = get_row_index();
						$get_default_content = get_field($row['acf_fc_layout'], 'option');
						
						$default_img = $get_default_content[get_row_layout() . '_image'];
						$default_text = $get_default_content[get_row_layout() . '_text'];
						$render_default_img = wp_get_attachment_image($default_img, 'col-6-img', "");
                    ?>
                    <div class="lo-card-contents row <?php echo get_row_layout(); ?> <?php echo get_sub_field('color_scheme'); ?>">
                        <?php if ($i % 2 !== 0 && $default_img) : ?>
                            <div class="col-md-5 card-bg card-bg-left mobile-hide">
								<div class="card-bg-crop"></div>
                                <?php echo $render_default_img; ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-7 lo-content <?php echo ($i % 2 === 0) ? 'left-content' : 'right-content'; ?>">
							<div class="content-wrap">
								<div class="lo-card-hdr">
									<h3 class=<?php echo ($i % 2 === 0) ? "left-line" : "right-line"; ?>>
										<span class="lo-card-icon">
											<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon_' . get_row_layout() . '.svg'; ?>" width="40" height="40" />                  
										</span>								
										<a href="<?php echo get_sub_field(get_row_layout() . '_link'); ?>" class="lo-link" target="_blank">
											<?php echo  get_sub_field(get_row_layout() . '_title'); ?>
										</a>
									</h3>
								</div>
								<div class="lo-card-content">
								<?php
								if (get_sub_field(get_row_layout() . '_content') !== '') {
									//there is override text instead of using default
									echo '<p>' . get_sub_field(get_row_layout() . '_content') . '</p>';
								} else {

									echo '<p>' . $default_text . '</p>';
									//use default
								}

								echo get_sub_field(get_row_layout() . '_bullets');
								?>
								</div>
							</div>
							<div class="more-content-btn d-none" data-text-more="Learn More">Learn More</div>
                        </div>
                        <?php if ($i % 2 === 0 && $default_img) : ?>
                            <div class="col-md-5 card-bg card-bg-right mobile-hide">
								<div class="card-bg-crop"></div>
                                <?php echo $render_default_img; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($default_img) : ?>
                            <div class="col-md-5 pb-3 pb-md-0 text-sm-center mobile-only">
                                <?php echo $render_default_img; ?>
                            </div>
                        <?php endif; ?>
						
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    </div> <!-- // .lo-cards-container -->
</section>

<svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
  <defs>
        <filter id="round">
            <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />    
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
            <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
        </filter>
    </defs>
</svg>