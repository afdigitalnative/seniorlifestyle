<?php
$faq_section = get_field('faq_section');

?>

<?php if ($faq_section) : ?>
    <section class="additional-info">
        <div class="row">
            <?php while (have_rows('faq_section')) : the_row(); ?>
                <?php if (have_rows('accordion_section')) : ?>
                    <?php while (have_rows('accordion_section')) : the_row(); ?>
                        <div class="col-md-6">
                            <h3><?php the_sub_field('faq_title'); ?></h3>
                            <?php the_sub_field('faq_description'); ?>
                            <?php if (have_rows('faq_accordion')) :
                                $index = 0;
                                $section_id = rand();
                            ?>
                                <div class="accordion" id="accordion<?php echo $id; ?>">
                                    <?php while (have_rows('faq_accordion')) : the_row(); ?>
                                        <div class="card">
                                            <div class="card-header" id="heading-<?php echo $section_id . "-" . $index; ?>">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $section_id . "-" . $index; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $section_id . "-" . $index; ?>">
                                                        <?php the_sub_field('accordion_title') ?>
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapse-<?php echo $section_id . "-" . $index; ?>" class="collapse" aria-labelledby="heading-<?php echo $section_id . "-" . $index; ?>" data-parent="#accordion<?php echo $id; ?>">
                                                <div class="card-body px-3">
                                                    <?php the_sub_field('accordion_body') ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $index++;
                                    endwhile;
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if (have_rows('callout_section')) : ?>
                    <?php while (have_rows('callout_section')) : the_row();
                        $row_num++;
                        $section_title = get_sub_field('section_title');
                        $section_content = get_sub_field('section_content');
                        $callout_title = get_sub_field('callout_title');
                        $content_style = $callout_title ? '6' : '12';
                    ?>
                        <div class="col-md-6">
                            <div class="lo-callout-box-wrapper">
                                <div class="hdr-wrapper">
                                    <h3><?php echo $callout_title ?></h3>
                                </div>
                                <div class="main-wrapper">
                                    <?php $link = get_sub_field('callout_link'); ?>
                                    <?php the_sub_field('callout_list'); ?>
                                    <?php if (isset($link['url']) && $link['url'] != "" && isset($link['title']) && $link['title'] != "") { ?>
                                        <div class="btn-wrapper">
                                            <a href="<?php echo $link['url']; ?>" class="btn-primary"><?php echo $link['title']; ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>