<?php if (have_rows('accordions_section')) :
    $section_index = 0; ?>
    <?php while (have_rows('accordions_section')) : the_row(); ?>
        <section class="<?php echo $section_index == 0? "my-5" : "mb-5" ?>">
            <h3><?php the_sub_field('section_title'); ?></h3>
            <?php the_sub_field('section_description'); ?>
            <?php if (have_rows('section_accordion')) :
                $index = 0;
                $section_id = rand();
                ?>
                    <div class="accordion" id="accordion<?php echo $id; ?>">
                        <?php while (have_rows('section_accordion')) : the_row(); ?>
                            <div class="card">
                                <div class="card-header" id="heading-<?php echo $section_id . "-" .$index; ?>">
                                    <div class="mb-0">
                                        <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $section_id . "-" .$index; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $section_id . "-" .$index; ?>">
                                            <?php the_sub_field('accordion_title') ?>
                                        </button>
                                    </div>
                                </div>

                                <div id="collapse-<?php echo $section_id . "-" .$index; ?>" class="collapse" aria-labelledby="heading-<?php echo $section_id . "-" .$index; ?>" data-parent="#accordion<?php echo $id; ?>">
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
        </section>
        <?php $section_index++; ?>
    <?php endwhile; ?>
<?php endif; ?>
