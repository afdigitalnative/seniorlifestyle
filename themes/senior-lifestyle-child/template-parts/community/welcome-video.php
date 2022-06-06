<?php

$main_content_video = get_field('main_content_video');


$mcv_section_header = $main_content_video['mcv_section_header'];
$mcv_intro_text = $main_content_video['mcv_intro_text'];

//more/lest logic
/*
$has_more = false;

$pos = strpos($mcv_intro_text, '<p><!--more--></p>');
if (!($pos > 0)) {
    $length = 11;
    $pos = strpos($mcv_intro_text, '<!--more-->');
} else {
    $length = 18;
}
if ($pos > 0) {
    $has_more = true;
    $mcv_intro_text1 = substr($mcv_intro_text, 0, $pos);
    $mcv_intro_text2 = substr($mcv_intro_text, $pos + $length);
    //    $mcv_intro_text1 = str_replace("<p></p>", "", $mcv_intro_text1);
    //    $mcv_intro_text2 = str_replace("<p></p>", "", $mcv_intro_text2);
} else {
    $mcv_intro_text1 = $mcv_intro_text;
}
*/

$mcv_video = $main_content_video['mcv_video'];
$events_code = get_field('events_facebook_embed');
$events_header = get_field('events_header');
?>

<section id="welcome_video" class="welcome-video-section <?php if(!have_rows('announcement_section')) echo 'pb-0'; ?> <?php if ($mcv_video) echo 'has-video'; ?>">
    <div class="video-content-container">
        <div class="container">
            <?php if ($mcv_video) : //  || ($events_code && $oak_brook_comm) ?>
				<div class="row mb-4">
					<div class="col-lg-12">
						<h2 class="community-section-title">
							<?php the_field('main_content_video_mcv_section_header'); ?>
							<span class="line-top"></span>
						</h2>
					</div>
				</div>
                <div class="row">
                    <div class="col-lg-6 col-md-5 order-lg-last">
                        <?php if ($mcv_video) : ?>
                            <div class="mcv-video-container">
                                <?php // lazy loaded */  
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-7 order-lg-first">
                        <div class="mcv-content-container">
                            <div class="mcv-intro-text">
                                <?php
									echo $mcv_intro_text;
									
									/*
									echo $mcv_intro_text1;
									if ($has_more == true) {
										echo '<div id="more-intro">' . $mcv_intro_text2 . '</div>';
									}
									*/
                                ?>
                            </div>
                            <?php /*if ($has_more == true) { ?>
                                <div class="more-content-btn">MORE</div>
                            <?php } */?>
							
							<?php if($mcv_video): ?>
							<div class="more-content-btn d-none" data-text-more="Learn More">Learn More</div>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="mcv-content-container">
                            <h2 class="community-section-title">
								<?php the_field('main_content_video_mcv_section_header'); ?>
								<span class="line-top"></span>
							</h2>
                            <div class="mcv-intro-text">
                                <?php
                                echo $mcv_intro_text;
								
								/*
                                if ($has_more == true) {
                                    echo '<div id="more-intro">' . $mcv_intro_text2 . '</div>';
                                }
								*/
                                ?>
                            </div>
                            <?php /*if ($has_more == true) { ?>
                                <div class="more-content-btn">MORE</div>
                            <?php } */?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
	<svg class="squares <?php if ($mcv_video) echo 'has-video'; ?> <?php if(have_rows('announcement_section')) echo 'has-announce'; ?>" width="201px" height="201px" viewBox="0 0 201 201" stroke="#DB3A34" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
	  <g id="squares" transform="matrix(0.70710677 0.70710677 -0.70710677 0.70710677 100.71924 1.4141846)" opacity="0.6390826">
		<path d="M0 140.439L57 140.439L57 83.4387L0 83.4387L0 140.439Z" id="Stroke-1" fill="none" fill-rule="evenodd" stroke="#DB3A34" stroke-width="2" />
		<path d="M82.0242 140.439L139.024 140.439L139.024 83.4387L82.0242 83.4387L82.0242 140.439Z" id="Stroke-3" fill="none" fill-rule="evenodd" stroke="#DB3A34" stroke-width="2" />
		<path d="M0.707275 57.7071L57.7073 57.7071L57.7073 0.707153L0.707275 0.707153L0.707275 57.7071Z" id="Stroke-4" fill="none" fill-rule="evenodd" stroke="#DB3A34" stroke-width="2" />
		<path d="M42.0732 99.5727L99.0732 99.5727L99.0732 41.5728L42.0732 41.5728L42.0732 99.5727Z" id="Stroke-6" fill="none" fill-rule="evenodd" stroke="#DB3A34" stroke-width="2" />
		<path d="M82.0242 57.0001L139.024 57.0001L139.024 0.00012207L82.0242 0.00012207L82.0242 57.0001Z" id="Stroke-7" fill="none" fill-rule="evenodd" stroke="#DB3A34" stroke-width="2" />
	  </g>
	</svg>	
</section>

<script>
    var mcvVideoEmbed = '<?= $mcv_video; ?>';
</script>