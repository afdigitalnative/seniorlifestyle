<?php
//
// LIFESTYLE OPTIONS
//

$lifestyle_options_section = get_field('lifestyle_options_section') ? get_field('lifestyle_options_section') : '';
$lifestyle_options_header = $lifestyle_options_section['lo_section_header'];

?>
<section id="section-lifestyle-options" class="lifestyle-options">
    <div class="container">
        <h2>
			<span><?php echo $lifestyle_options_header; ?></span>
		</h2>
        <?php while (have_rows('lifestyle_options_section')) : the_row(); ?>
            <?php if (have_rows('lo_options_cards')) : ?>
                <?php while (have_rows('lo_options_cards')) : $row = the_row(); ?>
                    <?php
						$i = get_row_index();
						//$get_default_content = get_field($row['acf_fc_layout'], 'option');
						//$default_text = $get_default_content[get_row_layout() . '_text'];

						$img = get_sub_field(get_row_layout() . '_image');
						//$render_img = wp_get_attachment_image($img, 'col-6-img', "");
                    ?>
                    <div class="row <?php echo get_row_layout(); ?> <?php echo get_sub_field('color_scheme'); ?>">
						<div class="<?php if(get_row_index() == 1) echo 'col-md-6'; else echo 'col-md-4'; ?> col-image">
							<div class="wrap-image">
								<img src="<?php echo $img; ?>" alt="<?php echo  get_sub_field(get_row_layout() . '_title'); ?>" />
							</div>
						</div>
                        <div class="<?php if(get_row_index() == 1) echo 'col-md-6'; else echo 'col-md-8'; ?> col-content">
							<div class="content-wrap">
								<h3 >
									<a href="<?php echo get_sub_field(get_row_layout() . '_link'); ?>" target="_blank"><span><?php echo  get_sub_field(get_row_layout() . '_title'); ?></span></a>
									<span class="lo-card-icon">
										<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon_' . get_row_layout() . '.svg'; ?>" width="40" height="40" />                  
									</span>								
									<!-- <a href="<?php //echo get_sub_field(get_row_layout() . '_link'); ?>" class="lo-link" target="_blank"></a> -->
								</h3>
								<div class="lo-card-content">
								<?php
								if (get_sub_field(get_row_layout() . '_content') !== '') {
									echo '<p>' . get_sub_field(get_row_layout() . '_content') . '</p>';
								}
								?>
								</div>
							</div>
                        </div>
						
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    </div> <!-- // .lo-cards-container -->
</section>