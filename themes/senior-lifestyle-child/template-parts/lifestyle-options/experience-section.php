<?php
    $experience_section_fields = get_field('experience_section');
    $experience_title = $experience_section_fields['title'];
?>

<section id="section-daily-life" class="experience-section">
	<div class="container">
		<div class="row pb-0 pb-md-5">
			<div class="col-sm-12 mb-4">
				<div class="section-title-with-line line-top">
					<h2><?php echo $experience_title; ?></h2>
					<span class="line-top"></span>
				</div>
			</div>
		</div>
		<div class="row pt-0 pt-sm-5">
			<div class="col-md-5 col-content">
				<?php if ( have_rows('experience_list') ) : ?>
				<div class="exerience-list-container">
					<?php while ( have_rows('experience_list') ): the_row(); ?>
					<div class="experience-list-item">
						<div class="content-container">
							<h4>
								<span class="<?php echo the_sub_field('list_icon'); ?>"></span> 
								<?php the_sub_field('list_title'); ?>
							</h4>
							<p><?php the_sub_field('list_content'); ?></p>
						</div>
					</div>
					<?php endwhile; ?>
				</div> <!-- // .experience-list-container -->
				
				<?php
					$progressbar_h = floor(1 / count(get_field('experience_list')) * 100); 
				?>
				<div class="progress">
					<div class="progress-bar" role="progressbar" style="height: <?php echo $progressbar_h; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-md-7 col-image">
				<?php if ( have_rows('experience_list') ) : ?>
				<div class="experience-image-container">
					<div class="experience-image-slider">
					<?php while ( have_rows('experience_list') ): the_row(); ?>
						<div class="list-img-item">
							<div class="wrap-img">
								<?php $experience_image = get_sub_field('list_image'); ?>
								<img src="<?php echo esc_url($experience_image['url']); ?>" alt="<?php echo esc_attr($experience_image['alt']); ?>" />	
							</div>
						</div>
					<?php endwhile; ?>
					</div>
					<div class="pattern-back"></div>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
		  <defs>
				<filter id="round">
					<feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />    
					<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
					<feComposite in="SourceGraphic" in2="goo" operator="atop"/>
				</filter>
			</defs>
		</svg>	
	</div>
</section>