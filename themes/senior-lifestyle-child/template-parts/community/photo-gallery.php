<?php

$photo_gallery_section = get_field('photo_gallery_section');
$photo_gallery_header = $photo_gallery_section['photo_gallery_header'];
$gallery_images = $photo_gallery_section['main_photo_gallery'];

?>

<section id="main_gallery" class="photo-gallery-section">
    <div class="container">
        <h2 class="text-center"><?php echo $photo_gallery_header; ?></h2>
        <div class="img-gallery-container">
        <?php if ($gallery_images) : ?>
            <div class="col-md-6 slick nav order-1 order-sm-0">
				<?php
					/*
					$groups = array_chunk($gallery_images, 6);
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
					foreach ( $gallery_images as $image ) {			
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
                    // Loop through all images
                    foreach ( $gallery_images as $image ) {
                        //$caption = '<div class="slide-caption">'.$image['caption'].'</div>';
                        $thumb_url = '<div class="img-wrap">' . wp_get_attachment_image( $image['ID'], 'medium-large', '', ['class' => 'img-display-gallery-item lazy-load'] ) . '</div>';
                        $full_img = wp_get_attachment_image_src( $image['ID'], 'full');
						$items .= '<div class="item" data-caption="'. $image['caption'] .'" data-fancybox="photo-gallery" data-caption="'. $image['caption'] .'" data-src="'. $full_img[0] .'">' . $thumb_url . '</div>';
                    }
                    echo $items;
                ?>
				</div>
				<?php echo '<div class="slide-caption out">'.$gallery_images[0]['caption'].'</div>' ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</section>

<!-- <section id="main_photo_gallery">
<?php if ($gallery_images) :
    $gallery="";
    foreach( $gallery_images as $image ):
        $data = '<a class="fancy-gallery" href="' . wp_get_attachment_image_src( $image['ID'], 'Large' )[0] . '" data-fancybox="main-gallery" style="display:none">';
        $data .= wp_get_attachment_image( $image['ID'], 'Large' );
        $data .= '</a>';
        $gallery.=$data;
    endforeach;
 endif; ?>
</section> -->

<script>
    var mainThumbGallery = '<?= $thumb_main_gallery ?>';
    var mainContentGallery = '<?= $gallery ?>';
</script>
