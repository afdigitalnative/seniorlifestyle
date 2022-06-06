<?php
    $experience_section_fields = get_field('experience_section');
    $experience_title = $experience_section_fields['title'];
    $experience_content = $experience_section_fields['content'];
    $location_callout_image = $experience_section_fields['location_callout_image'];
    $location_callout_button_text = $experience_section_fields['location_callout_button_text'];
    $location_callout_button_lifestyle = $experience_section_fields['location_callout_button_lifestyle'];

    $has_location_callout = $experience_section_fields['location_callout_box'];

     $search_text="";
     global $MYSTATE;
     global $MYCITY;

     if($MYSTATE!="" && $MYCITY!=""){
         $search_text.='<h3>Find a Community in <br>'. stripslashes($MYCITY) . ', ' . $MYSTATE . '</h3>';
         $search_text.='<p class="txt-small">or another location</p>';
         $search_link = '/find-community/?place=' . urlencode(strtolower($MYCITY) . ',' . strtolower($MYSTATE)) . '&select-lifestyle=' . rawurlencode($location_callout_button_lifestyle);
     }else if($MYSTATE!=""){
         $search_text.='<h3>Find a Community in ' . $MYSTATE . '</h3>';
         $search_text.='<p class="txt-small">or another location</p>';
         $search_link = '/find-community/?place=' . urlencode(strtolower($MYSTATE)) . '&select-lifestyle=' . rawurlencode($location_callout_button_lifestyle);
     }else{
         $search_text.='<h3>Find a Community</h3>';
         $search_link = '/find-community/?select-lifestyle=' . rawurlencode($location_callout_button_lifestyle);
     }
?>

<section class="experience-section">
        <div class="row">
            <?php if ($has_location_callout) : ?>
            <div class="col-md-6">
                <div class="experience-content-wrapper pt-3">
                    <h2><?php echo $experience_title; ?></h2>
                    <?php echo $experience_content; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="location-callout-box">

                    <a href="<?php echo $search_link ?>"><img src="<?= $location_callout_image['url'] ?>" alt="<?= $location_callout_image['alt']; ?>" ></a>

                    <div class="callout-content">
                        <?= $search_text ?>
                        <a href="<?= $search_link ?>" class="btn-primary-lightblue">Search Now</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php if ( have_rows('experience_list') ) : ?>
    <div class="exerience-list-container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <?php while ( have_rows('experience_list') ): the_row(); ?>
                <div class="experience-list-item">
                    <div class="icon-wrapper">
                        <span class="<?php echo the_sub_field('list_icon'); ?>"></span>
                    </div>
                    <div class="content-container">
                        <h4><?php the_sub_field('list_title'); ?></h4>
                        <p><?php the_sub_field('list_content'); ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div> <!-- // .col -->
        </div> <!-- // .row -->
    </div> <!-- // .experience-list-container -->
    <?php endif; ?>
</section>