<?php
    $additional_info = get_field('additional_info');

    $ai_banner_img = $additional_info['banner_image'];
    $count = sizeof(get_field('additional_info'));
    $row_num = 0;
?>

<section class="additional-info">
    <?php if($ai_banner_img) : ?>
        <div class="container-full-img">
            <?php echo wp_get_attachment_image( $ai_banner_img["ID"], 'full', '', ["class" => "cover"] ); ?>
        </div>
    <?php endif; ?>
    <?php while (have_rows('additional_info')): the_row(); ?>
    <?php if ( have_rows('block_sections') ) :
        ?>
    <div class="question-blocks">
        <?php while ( have_rows('block_sections') ): the_row(); $row_num++; 
            $section_title = get_sub_field('section_title');
            $section_content = get_sub_field('section_content');
            $callout_title = get_sub_field('callout_title');
            $content_style = $callout_title ? '6' : '12';
        ?>
        <div class="additional-info-block-item">
            <h3 class="text-center mb-5"><?php echo $section_title ?></h3>
            <div class="row">
                <?php if($section_title || $section_content) : ?>
                <div class="col-md-<?php echo $content_style ?>">
                    <div class="left-col-wrapper">
                        <?php echo $section_content ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($callout_title) : ?>
                <div class="col-md-6">
                    <div class="lo-callout-box-wrapper">
                        <div class="hdr-wrapper">
                            <h3><?php echo $callout_title ?></h3>
                        </div>
                        <div class="main-wrapper">
                            <?php $link = get_sub_field('callout_link'); ?>
                            <?php the_sub_field('callout_list'); ?>
                            <?php if(isset($link['url'])&&$link['url']!=""&&isset($link['title'])&&$link['title']!=""){ ?>
                            <div class="btn-wrapper">
                                <a href="<?php echo $link['url']; ?>" class="btn-primary"><?php echo $link['title']; ?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if($row_num<$count){ ?>
        <!-- <div class="container"><hr></div> -->
        <?php }  endwhile; ?>
    </div>

    <?php endif; ?>
    <?php endwhile; ?>
</section>