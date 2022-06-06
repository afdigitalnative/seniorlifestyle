<?php

$floor_plan_gallery = get_field('floor_plan_gallery') ? get_field('floor_plan_gallery') : '';
$community_rate = get_field('general_information_community_rate') ? get_field('general_information_community_rate') : floatval(0);
$rate_disclaimer = get_field('rate_disclaimer'); // ?: 'Additional fees may apply';
$virtual_map = get_field('virtual_map');

?>

<section id="floor_plans_section" class="floorplans-section">
    <div class="container">
		<div class="icon-wrapper text-center">
			<svg id="icon-two-rect" width="54px" height="53px" viewBox="0 0 54 53" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
			  <g id="Group" transform="translate(1 1)">
				<path d="M0 0L34 0L34 33L0 33L0 0Z" id="Rectangle" fill="none" fill-rule="evenodd" stroke="#FFC857" stroke-width="2" />
				<path d="M0 0L34 0L34 33L0 33L0 0Z" transform="translate(18 18)" id="Rectangle-Copy-7" fill="none" fill-rule="evenodd" stroke="#FFC857" stroke-width="2" />
			  </g>
			</svg>   
		</div>
		<h2 class="text-center">Floor Plans</h2>	
        <div class="starting-at-container">
            <p>
				Rates starting at $<?php echo number_format($community_rate); ?>/Month* 
				<?php if($rate_disclaimer != ''): ?>
					<span style="color: #084C61;">|</span> Floor plans up to <?php echo $rate_disclaimer ?> sq ft
				<?php endif; ?>
			</p>
        </div>
        <div class="fp-gallery-container">
        <?php if ($floor_plan_gallery) : ?>
            <div class="col-md-6 slick nav order-1 order-sm-0">
                    <?php
					/*
                        $groups = array_chunk($floor_plan_gallery, 6);
                        $index = 0;
						$group_index = 0;
                        $items = '';
                        // Loop through a group containing 6 items
                        foreach( $groups as $group ) {
                            $item = '';
                            // Loop through a group of images
                            foreach ( $group as $image ) {			
								if($index == 0) {
									$active_class = "active-thumb";
								} else {
									$active_class = "";
								}
                                $thumb_url = wp_get_attachment_image_url( $image['ID'], 'medium-large', '', ['class' => 'img-display-gallery-item lazy-load'] );
                                $item .= '<div class="thumbnail-img '. $active_class .'" style="background-image: url(' . $thumb_url . ');" data-group="'. $group_index .'" data-slide="' . $index . '"></div>';
                                $index++;
                            }
                            $items .= '<div class="item">' . $item . '</div>';
							
							$group_index++;
                        }
                        echo $items;
						
					*/
					
                        $index = 0;
                        $items = '';
						
						// Loop through a group of images
						foreach ( $floor_plan_gallery as $image ) {			
							if($index == 0) {
								$active_class = "active-thumb";
							} else {
								$active_class = "";
							}
							$thumb_url = wp_get_attachment_image_url( $image['ID'], 'medium-large', '', ['class' => 'img-display-gallery-item lazy-load'] );
							$item = '<div class="thumbnail-img '. $active_class .'" style="background-image: url(' . $thumb_url . ');" data-group="'. $group_index .'" data-slide="' . $index . '"></div>';
							$items .= '<div class="item">' . $item . '</div>';
							$index++;
						}
                            
                        echo $items;					
                    ?>
            </div>
            <div class="col-md-6 order-0 order-sm-1">
				<div class="slick current">
                <?php
                    $items = '';
					$index = 0;
                    // Loop through all images
                    foreach ( $floor_plan_gallery as $image ) {
                        $thumb_url = '<div class="img-wrap">' . wp_get_attachment_image( $image['ID'], 'medium-large', '', ['class' => 'img-display-gallery-item lazy-load'] ) . '</div>';
						$full_img = wp_get_attachment_image_src( $image['ID'], 'full');
                        $caption = '<div class="slide-caption text-center">'.$image['caption'].'</div>';
						$items .= '<div class="item" data-fancybox="gallery-floor-plans" data-caption="'. $image['caption'] .'" data-src="'. $full_img[0] .'">' . $thumb_url . $caption . '</div>';
						$index++;
                    }
                    echo $items;
                ?>
				</div>
            </div>
        <?php endif; ?>
        <?php /* if($virtual_map) : ?>
            <div class="disclaimer-container">
                <p><?php echo $virtual_map; ?></p>
            </div>
        <?php endif; */ ?>  
        </div>
    
    </div>
</section>


<!-- <section id="floor_plan_gallery">
<?php if ($floor_plan_gallery) :
    $gallery="";
    foreach( $floor_plan_gallery as $fp_image ):
        $fp_caption = $fp_image['caption'];
        $data = '<a class="fancy-fp" href="' . wp_get_attachment_image_src( $fp_image['ID'], 'Large' )[0] . '" data-fancybox="fp-gallery" data-caption="'. $fp_caption .'" style="display:none">';
        $data .= wp_get_attachment_image( $fp_image['ID'], 'Large' );
        $data .= '</a>';
        $gallery.=$data;
    endforeach;
    $gallery = preg_replace( "/<br>|\n/", "", $gallery );
 endif; ?>

</section> -->

<script>
    var thumbFloorplan = '<?= $thumb_fp_gallery ?>';
    var contentFloorplan = '<?= $gallery ?>';
</script>