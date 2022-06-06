<?php if (have_rows('accordions_section')) :
    $section_index = 0; ?>
    <?php while (have_rows('accordions_section')) : the_row(); ?>
        <section class="section-market-accordion">
			<div class="container">
				<div class="section-title-with-line">
					<h2><?php the_sub_field('section_title'); ?></h2>
				</div>		
				<?php the_sub_field('section_description'); ?>
			</div>
			
			<div class="accordion-wrapper">
				<div class="container">
				<?php if (have_rows('section_accordion')) :
					$index = 0;
					$section_id = rand();
				?>
						<h3>Senior Living in <?php echo get_field('market_name'); ?></h3>
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
				</div>
			</div>
        </section>
        <?php $section_index++; ?>
    <?php endwhile; ?>
<?php endif; ?>
