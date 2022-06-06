<?php
$faq_section = get_field('faq_section');
$faq_title = $faq_section['title'];
$faq_description = $faq_section['description'];
$faq_accordion = $faq_section['faq_accordion'];

?>

<?php while (have_rows('faq_section')) : the_row(); ?>
	<?php if (have_rows('faq_accordion')) : ?>
    <section id="section-faq" class="section-faq">
		<div class="faq-title-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 mb-2">
						<div class="section-title-with-line line-top">
							<h2><?php echo $faq_title; ?></h2>
							<span class="line-top"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="faq-accordion-wrap">
			<div class="container">
				<div class="row">		
					<div class="col-md-12">
						
						<?php 
							$index = 0;
							$section_id = rand();
						?>
						<div class="accordion" id="accordion<?php echo $id; ?>">
							<?php while (have_rows('faq_accordion')) : the_row(); ?>
								<div class="card">
									<div class="card-header" id="heading-<?php echo $section_id . "-" . $index; ?>">
										<div class="mb-0">
											<button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $section_id . "-" . $index; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $section_id . "-" . $index; ?>">
												<?php the_sub_field('accordion_title') ?>
											</button>
										</div>
									</div>

									<div id="collapse-<?php echo $section_id . "-" . $index; ?>" class="collapse" aria-labelledby="heading-<?php echo $section_id . "-" . $index; ?>" data-parent="#accordion<?php echo $id; ?>">
										<div class="card-body">
											<?php the_sub_field('accordion_body') ?>
										</div>
									</div>
								</div>
							<?php
								$index++;
							endwhile;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
	<?php endif; ?>
<?php endwhile; ?>