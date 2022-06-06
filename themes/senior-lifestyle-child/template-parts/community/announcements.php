<?php

//
// ANNOUNCEMENT BOXES
//

?>
<?php if(have_rows('announcement_section')) : ?>
<?php 
	$general_information = get_field('general_information') ? get_field('general_information') : array();
	$community_type = $general_information['community_type'];
	$background_image = get_stylesheet_directory_uri().'/assets/img/' . $community_type . '_theme.png';
?>

<section id="announcement_section" class="announcement-section" style="background-image: url(<?php echo $background_image; ?>)">
    <div class="container"> 
        <div class="amenities-content-container">
        <?php if( have_rows('announcement_section') ) :
            $i = 0;
            $total_rows = count( get_field('announcement_section'));

            while ( have_rows('announcement_section') ) : the_row(); ?>
            <?php 
            $i++;
            $announcement_heading = get_sub_field('announcement_heading');
            $announcement_description = get_sub_field('announcement_description');
            $announcement_img = get_sub_field('announcement_image', get_the_ID());
            $image_link = get_sub_field('announcement_image_link');
            $content_width = $announcement_img? '-9': '';    
            ?>
            <div class="announcement-row row<?php if($i !== $total_rows) : ?> mb-4<?php endif; ?>">
                <div class="col-md<?php echo $content_width ?> announcement-title">
                    <h4><?php echo $announcement_heading ?></h4>
                    <?php echo $announcement_description; ?>      
                </div>
                <?php if($announcement_img) : ?>
                    <div class="col-md align-self-center">
                        <?php if($image_link): ?>
                        <a href="<?php echo $image_link ?>" target="_blank">
                        <?php endif; ?>
                            <?php echo wp_get_attachment_image($announcement_img['ID'], 'medium-large', "", ["class" => 'size-medium wp-image-21978 alignnone']); ?>
                        <?php if($image_link): ?>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>              
        <?php endwhile; endif; ?>
        </div>
    </div> <!-- // .container -->
</section> <!-- // .announcement-section -->
<?php endif; ?>