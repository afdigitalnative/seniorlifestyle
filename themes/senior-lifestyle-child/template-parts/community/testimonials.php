<?php if( have_rows('testimonial_section') ): ?>
<?php while( have_rows('testimonial_section') ): the_row(); 
    $carousel_slides = get_sub_field('testimonial_carousel_repeater');
    $carousel_bg_color = get_sub_field('carousel_background_theme');
    $carousel_id = "carousel-" . rand(1, 100);
	
	if($carousel_slides && (count($carousel_slides) > 0)):
?>
<section id="testimonial_section" class="testimonial-section">
	<div class="container ">
		<h2 class="community-section-title ml-3 text-left">
			Testimonials
			<span class="line-top"></span>			
		</h2>	
	</div>
    <div id="<?php echo $carousel_id; ?>" class="carousel carousel-text slide text-white <?php echo $carousel_bg_color; ?>" data-ride="carousel" data-interval="4000">
		<svg class="squares left" width="201px" height="201px" viewBox="0 0 201 201" version="1.1" stroke="#DB3A34" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
		  <g id="squares" transform="matrix(0.70710677 0.70710677 -0.70710677 0.70710677 100.72046 1.4141846)" opacity="0.6390826">
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 0 83.43872)" id="Stroke-1" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 82.02319 83.44043)" id="Stroke-3" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 0.7128906 0.7088623)" id="Stroke-4" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 58L57 58L57 0L0 0L0 58Z" transform="matrix(0.9999999 0 0 0.9999999 42.072266 41.57776)" id="Stroke-6" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 82.025635 0)" id="Stroke-7" fill="none" fill-rule="evenodd" stroke-width="2"></path>
		  </g>
		</svg>        
		<ol class="carousel-indicators">
            <?php foreach ($carousel_slides as $index => $slide) : ?>
                <li data-target="#<?php echo $carousel_id; ?>" data-slide-to="<?php echo $index; ?>" class="<?php echo ($index == 0 ? 'active' : ''); ?>"></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($carousel_slides as $index => $slide) : ?>
                <?php
                $slide_caption = $slide['carousel_slide_caption'];
                ?>
                <div class="carousel-item <?php echo ($index == 0 ? 'active' : ''); ?>">
                    <div class="carousel-caption">
                        <?php echo $slide_caption; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
		<!--
        <a class="carousel-control-prev" href="#<?php echo $carousel_id; ?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#<?php echo $carousel_id; ?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
		-->
		<svg class="squares right" width="201px" height="201px" viewBox="0 0 201 201" version="1.1" stroke="#DB3A34" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
		  <g id="squares" transform="matrix(0.70710677 0.70710677 -0.70710677 0.70710677 100.72046 1.4141846)" opacity="0.6390826">
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 0 83.43872)" id="Stroke-1" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 82.02319 83.44043)" id="Stroke-3" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 0.7128906 0.7088623)" id="Stroke-4" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 58L57 58L57 0L0 0L0 58Z" transform="matrix(0.9999999 0 0 0.9999999 42.072266 41.57776)" id="Stroke-6" fill="none" fill-rule="evenodd" stroke-width="2"></path>
			<path d="M0 57L57 57L57 0L0 0L0 57Z" transform="matrix(0.9999999 0 0 0.9999999 82.025635 0)" id="Stroke-7" fill="none" fill-rule="evenodd" stroke-width="2"></path>
		  </g>
		</svg>  		
    </div>
</section>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
