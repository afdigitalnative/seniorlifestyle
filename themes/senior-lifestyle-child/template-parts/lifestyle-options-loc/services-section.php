<?php
    $services_section = get_field('services_section');
    $services_title = $services_section['services_title'];
    $services_content = $services_section['services_content'];
?>

<section class="services-section">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9">
            <div class="services-header-wrapper">
                <h2><?php echo $services_title; ?></h2>
                <div class="services-content"><?php echo $services_content; ?></div>
            </div>

            <?php if ( have_rows('services_list') ) : ?>
            <div class="services-list-container">
                <?php while ( have_rows('services_list') ): the_row(); ?>
                <div class="services-list-item">
                    <div class="icon-wrapper">
                        <span class="<?php echo the_sub_field('list_icon'); ?>"></span>
                    </div>
                    <div class="content-container">
                        <h4><?php the_sub_field('list_title'); ?></h4>
                        <?php the_sub_field('list_content'); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div> <!-- // .experience-list-container -->
            <?php endif; ?>
        </div>
    </div>
</section>