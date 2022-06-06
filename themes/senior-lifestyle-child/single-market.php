<?php
/**
 * Template Name: Market Landing Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
global $post;

$featured_img = get_post_thumbnail_id(get_the_ID(), 'full');
$background_img = wp_get_attachment_url($featured_img);

?>

<div id="primary" class="content-area lifestyle-single-market">
    <main id="main" class="site-main py-0" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<style>
					#primary.lifestyle-single-market .single-market-hero:before {
						background-image: url('<?php echo $background_img; ?>');
					}
				</style>
				<section class="single-market-hero">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="h2"><?php echo get_the_title(); ?></h1>
								<?php the_content(); ?>
							</div>
							<div class="col-md-5 hero-back">
							<!-- Hero Background Image -->
							</div>
						</div>
					</div>
				</section>
				
				<div class="container px-0 px-md-3">
				<?php
					get_template_part( 'template-parts/components/market-map' );
				?>
				</div>
				
				<?php
					get_template_part( 'template-parts/components/accordion-market' );
				?>
				
				<div class="container">
				<?php
					get_template_part( 'template-parts/components/page-blurbs-market' );
				?>
				</div>
				
				<section class="section-extra-loc">
					<svg class="d-none d-md-block" width="47px" height="380px" viewBox="0 0 47 380" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
					  <g id="fancy-divider" transform="matrix(-4.371139E-08 1 -1 -4.371139E-08 44.500015 1.5)">
						<g id="flower-line-right" transform="matrix(-1 0 0 1 377 -8.839152E-12)">
						  <g id="flower-shape-right" transform="matrix(-4.371139E-08 -1 1 -4.371139E-08 0 43)">
							<path d="M3.37585 4.25537C2.12335 5.56239 1.68725 7.40873 2.22983 9.10445C3.23133 11.6748 5.69576 13.4555 8.54812 13.6717C14.0906 15.3917 18.3805 19.6359 20.0006 25C19.8536 16.7158 18.8927 8.99999 14.6813 5.31702C12.2067 3.34435 8.92336 2.57423 5.7769 3.22774C4.87428 3.28847 4.02238 3.65045 3.37585 4.25537L3.37585 4.25537ZM22.8643 34L20.2802 33.9753C20.2802 33.9753 17.5782 17.622 8.55766 15.8545C4.82812 15.4466 1.66001 12.9917 0.374222 9.51589C-0.894022 5.75082 1.17126 1.68414 4.98853 0.433237C5.30684 0.329407 5.63268 0.245354 5.96352 0.186022C9.78079 -0.456735 13.6908 0.584037 16.6634 3.03146C23.2402 8.72233 23.2402 22.0521 22.8743 33.4339L22.8643 34Z" transform="translate(-0.0006457356 17)" id="Fill-1" fill="#177E89" fill-rule="evenodd" stroke="none" />
							<path d="M8.31367 16.0474C9.95167 14.3581 12.0749 13.179 14.4174 12.6594C16.2204 12.3866 17.8978 11.5894 19.2254 10.3771C20.8043 9.00339 21.3955 6.86339 20.7329 4.91556C20.2255 3.45647 18.9052 2.39833 17.3214 2.1848C14.0282 1.57032 10.6266 2.50746 8.16834 4.70915C4.18542 8.54549 3.2174 16.3937 3.00065 24C4.23715 21.0486 6.03771 18.3534 8.31367 16.0474L8.31367 16.0474ZM0.049096 32.7905C-0.0953486 22.8949 -0.314506 9.34829 5.89163 3.34685C8.92746 0.632722 13.1164 -0.52566 17.1782 0.223315C19.7683 0.481001 21.9524 2.20533 22.7294 4.60879C23.9422 9.31698 20.9736 14.083 16.1074 15.2534C15.6118 15.3738 15.1087 15.4509 14.6031 15.487C12.688 15.9397 10.9497 16.9151 9.5924 18.295C6.05351 22.5721 3.65025 27.6199 2.58933 33L0.049096 32.7905Z" transform="translate(19.999353 18)" id="Fill-4" fill="#177E89" fill-rule="evenodd" stroke="none" />
							<path d="M2.86581 3.72399C0.709483 5.72274 2.94244 12.0766 5.63785 17C7.79418 12.7184 9.99015 6.75641 8.52617 4.33145C8.08222 3.49864 7.13883 2.99161 6.1373 3.04549C5.01421 2.88138 3.86734 3.16552 2.98208 3.82932L2.86581 3.72399ZM6.11509 22L4.83629 19.8782C3.9963 18.4768 -3.09226 6.10878 1.58413 1.50745C3.01589 0.276319 4.94161 -0.241793 6.80715 0.106082C8.70528 0.165295 10.4179 1.24099 11.2679 2.90882C14.0436 8.01592 8.08845 18.9802 7.39389 20.1644L6.11509 22Z" transform="translate(14.999354 0)" id="Fill-7" fill="#177E89" fill-rule="evenodd" stroke="none" />
						  </g>
						  <path d="M0.5 0.5L160 1" transform="translate(50 21)" id="h1-line-right" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="3" stroke-linecap="round" />
						</g>
						<g id="flower-line-left" transform="matrix(1 0 0 1 0 -8.6402E-12)">
						  <g id="flower-shape-right" transform="matrix(-4.371139E-08 -1 1 -4.371139E-08 0 43)">
							<path d="M3.37585 4.25537C2.12335 5.56239 1.68725 7.40873 2.22983 9.10445C3.23133 11.6748 5.69576 13.4555 8.54812 13.6717C14.0906 15.3917 18.3805 19.6359 20.0006 25C19.8536 16.7158 18.8927 8.99999 14.6813 5.31702C12.2067 3.34435 8.92336 2.57423 5.7769 3.22774C4.87428 3.28847 4.02238 3.65045 3.37585 4.25537L3.37585 4.25537ZM22.8643 34L20.2802 33.9753C20.2802 33.9753 17.5782 17.622 8.55766 15.8545C4.82812 15.4466 1.66001 12.9917 0.374222 9.51589C-0.894022 5.75082 1.17126 1.68414 4.98853 0.433237C5.30684 0.329407 5.63268 0.245354 5.96352 0.186022C9.78079 -0.456735 13.6908 0.584037 16.6634 3.03146C23.2402 8.72233 23.2402 22.0521 22.8743 33.4339L22.8643 34Z" transform="translate(-0.0006457356 17)" id="Fill-1" fill="#177E89" fill-rule="evenodd" stroke="none" />
							<path d="M8.31367 16.0474C9.95167 14.3581 12.0749 13.179 14.4174 12.6594C16.2204 12.3866 17.8978 11.5894 19.2254 10.3771C20.8043 9.00339 21.3955 6.86339 20.7329 4.91556C20.2255 3.45647 18.9052 2.39833 17.3214 2.1848C14.0282 1.57032 10.6266 2.50746 8.16834 4.70915C4.18542 8.54549 3.2174 16.3937 3.00065 24C4.23715 21.0486 6.03771 18.3534 8.31367 16.0474L8.31367 16.0474ZM0.049096 32.7905C-0.0953486 22.8949 -0.314506 9.34829 5.89163 3.34685C8.92746 0.632722 13.1164 -0.52566 17.1782 0.223315C19.7683 0.481001 21.9524 2.20533 22.7294 4.60879C23.9422 9.31698 20.9736 14.083 16.1074 15.2534C15.6118 15.3738 15.1087 15.4509 14.6031 15.487C12.688 15.9397 10.9497 16.9151 9.5924 18.295C6.05351 22.5721 3.65025 27.6199 2.58933 33L0.049096 32.7905Z" transform="translate(19.999353 18)" id="Fill-4" fill="#177E89" fill-rule="evenodd" stroke="none" />
							<path d="M2.86581 3.72399C0.709483 5.72274 2.94244 12.0766 5.63785 17C7.79418 12.7184 9.99015 6.75641 8.52617 4.33145C8.08222 3.49864 7.13883 2.99161 6.1373 3.04549C5.01421 2.88138 3.86734 3.16552 2.98208 3.82932L2.86581 3.72399ZM6.11509 22L4.83629 19.8782C3.9963 18.4768 -3.09226 6.10878 1.58413 1.50745C3.01589 0.276319 4.94161 -0.241793 6.80715 0.106082C8.70528 0.165295 10.4179 1.24099 11.2679 2.90882C14.0436 8.01592 8.08845 18.9802 7.39389 20.1644L6.11509 22Z" transform="translate(14.999354 0)" id="Fill-7" fill="#177E89" fill-rule="evenodd" stroke="none" />
						  </g>
						  <path d="M0.5 0.5L143 1" transform="translate(50 21)" id="h1-line-right" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="3" stroke-linecap="round" />
						</g>
					  </g>
					</svg>				
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-left">
								<h3>Skilled Nursing</h3>
								<p>
									Skilled Nursing and rehabilitation communities provide the needed medical care, personal care and nutrition 
									assistance to seniors in a professional setting with round-the-clock staff. Whether your loved one is 
									recovering from an illness, rehabilitating from orthopedic surgery, or requires continuous expert care, 
									they can find a warm welcome at a Skilled Nursing home. 
								</p>
								<a href="<?php bloginfo('url'); ?>/senior-living-and-care-options/skilled-nursing-and-rehab">Learn More</a>
							</div>
							<svg class="d-block d-md-none" width="381px" height="47px" viewBox="0 0 381 47" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
							  <g id="fancy-divider" transform="matrix(-1 2.8262425E-06 -2.8262425E-06 -1 378.50015 44.5)">
								<g id="flower-line-right" transform="matrix(-1 0 0 1 377.00006 0)">
								  <g id="flower-shape-right" transform="matrix(-4.371139E-08 -1 1 -4.371139E-08 0 43)">
									<path d="M3.37585 4.25537C2.12335 5.56239 1.68725 7.40873 2.22983 9.10445C3.23133 11.6748 5.69576 13.4555 8.54812 13.6717C14.0906 15.3917 18.3805 19.6359 20.0006 25C19.8536 16.7158 18.8927 8.99999 14.6813 5.31702C12.2067 3.34435 8.92336 2.57423 5.7769 3.22774C4.87428 3.28847 4.02238 3.65045 3.37585 4.25537L3.37585 4.25537ZM22.8643 34L20.2802 33.9753C20.2802 33.9753 17.5782 17.622 8.55766 15.8545C4.82812 15.4466 1.66001 12.9917 0.374222 9.51589C-0.894022 5.75082 1.17126 1.68414 4.98853 0.433237C5.30684 0.329407 5.63268 0.245354 5.96352 0.186022C9.78079 -0.456735 13.6908 0.584037 16.6634 3.03146C23.2402 8.72233 23.2402 22.0521 22.8743 33.4339L22.8643 34Z" transform="translate(-0.0006457356 17)" id="Fill-1" fill="#177E89" fill-rule="evenodd" stroke="none" />
									<path d="M8.31367 16.0474C9.95167 14.3581 12.0749 13.179 14.4174 12.6594C16.2204 12.3866 17.8978 11.5894 19.2254 10.3771C20.8043 9.00339 21.3955 6.86339 20.7329 4.91556C20.2255 3.45647 18.9052 2.39833 17.3214 2.1848C14.0282 1.57032 10.6266 2.50746 8.16834 4.70915C4.18542 8.54549 3.2174 16.3937 3.00065 24C4.23715 21.0486 6.03771 18.3534 8.31367 16.0474L8.31367 16.0474ZM0.049096 32.7905C-0.0953486 22.8949 -0.314506 9.34829 5.89163 3.34685C8.92746 0.632722 13.1164 -0.52566 17.1782 0.223315C19.7683 0.481001 21.9524 2.20533 22.7294 4.60879C23.9422 9.31698 20.9736 14.083 16.1074 15.2534C15.6118 15.3738 15.1087 15.4509 14.6031 15.487C12.688 15.9397 10.9497 16.9151 9.5924 18.295C6.05351 22.5721 3.65025 27.6199 2.58933 33L0.049096 32.7905Z" transform="translate(19.999353 18)" id="Fill-4" fill="#177E89" fill-rule="evenodd" stroke="none" />
									<path d="M2.86581 3.72399C0.709483 5.72274 2.94244 12.0766 5.63785 17C7.79418 12.7184 9.99015 6.75641 8.52617 4.33145C8.08222 3.49864 7.13883 2.99161 6.1373 3.04549C5.01421 2.88138 3.86734 3.16552 2.98208 3.82932L2.86581 3.72399ZM6.11509 22L4.83629 19.8782C3.9963 18.4768 -3.09226 6.10878 1.58413 1.50745C3.01589 0.276319 4.94161 -0.241793 6.80715 0.106082C8.70528 0.165295 10.4179 1.24099 11.2679 2.90882C14.0436 8.01592 8.08845 18.9802 7.39389 20.1644L6.11509 22Z" transform="translate(14.999354 0)" id="Fill-7" fill="#177E89" fill-rule="evenodd" stroke="none" />
								  </g>
								  <path d="M0.5 0.5L160 1" transform="translate(50 21)" id="h1-line-right" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="3" stroke-linecap="round" />
								</g>
								<g id="flower-line-left" transform="translate(2.2888184E-05 0)">
								  <g id="flower-shape-right" transform="matrix(-4.371139E-08 -1 1 -4.371139E-08 0 43)">
									<path d="M3.37585 4.25537C2.12335 5.56239 1.68725 7.40873 2.22983 9.10445C3.23133 11.6748 5.69576 13.4555 8.54812 13.6717C14.0906 15.3917 18.3805 19.6359 20.0006 25C19.8536 16.7158 18.8927 8.99999 14.6813 5.31702C12.2067 3.34435 8.92336 2.57423 5.7769 3.22774C4.87428 3.28847 4.02238 3.65045 3.37585 4.25537L3.37585 4.25537ZM22.8643 34L20.2802 33.9753C20.2802 33.9753 17.5782 17.622 8.55766 15.8545C4.82812 15.4466 1.66001 12.9917 0.374222 9.51589C-0.894022 5.75082 1.17126 1.68414 4.98853 0.433237C5.30684 0.329407 5.63268 0.245354 5.96352 0.186022C9.78079 -0.456735 13.6908 0.584037 16.6634 3.03146C23.2402 8.72233 23.2402 22.0521 22.8743 33.4339L22.8643 34Z" transform="translate(-0.0006457356 17)" id="Fill-1" fill="#177E89" fill-rule="evenodd" stroke="none" />
									<path d="M8.31367 16.0474C9.95167 14.3581 12.0749 13.179 14.4174 12.6594C16.2204 12.3866 17.8978 11.5894 19.2254 10.3771C20.8043 9.00339 21.3955 6.86339 20.7329 4.91556C20.2255 3.45647 18.9052 2.39833 17.3214 2.1848C14.0282 1.57032 10.6266 2.50746 8.16834 4.70915C4.18542 8.54549 3.2174 16.3937 3.00065 24C4.23715 21.0486 6.03771 18.3534 8.31367 16.0474L8.31367 16.0474ZM0.049096 32.7905C-0.0953486 22.8949 -0.314506 9.34829 5.89163 3.34685C8.92746 0.632722 13.1164 -0.52566 17.1782 0.223315C19.7683 0.481001 21.9524 2.20533 22.7294 4.60879C23.9422 9.31698 20.9736 14.083 16.1074 15.2534C15.6118 15.3738 15.1087 15.4509 14.6031 15.487C12.688 15.9397 10.9497 16.9151 9.5924 18.295C6.05351 22.5721 3.65025 27.6199 2.58933 33L0.049096 32.7905Z" transform="translate(19.999353 18)" id="Fill-4" fill="#177E89" fill-rule="evenodd" stroke="none" />
									<path d="M2.86581 3.72399C0.709483 5.72274 2.94244 12.0766 5.63785 17C7.79418 12.7184 9.99015 6.75641 8.52617 4.33145C8.08222 3.49864 7.13883 2.99161 6.1373 3.04549C5.01421 2.88138 3.86734 3.16552 2.98208 3.82932L2.86581 3.72399ZM6.11509 22L4.83629 19.8782C3.9963 18.4768 -3.09226 6.10878 1.58413 1.50745C3.01589 0.276319 4.94161 -0.241793 6.80715 0.106082C8.70528 0.165295 10.4179 1.24099 11.2679 2.90882C14.0436 8.01592 8.08845 18.9802 7.39389 20.1644L6.11509 22Z" transform="translate(14.999354 0)" id="Fill-7" fill="#177E89" fill-rule="evenodd" stroke="none" />
								  </g>
								  <path d="M0.5 0.5L143 1" transform="translate(50 21)" id="h1-line-right" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="3" stroke-linecap="round" />
								</g>
							  </g>
							</svg>							
							<div class="col-md-6 col-right">
								<h3>Short Term</h3>
								<p>
									Short-term stays give seniors the opportunity to experience community living  before fully committing 
									to moving in. Respite care can also be a great resource for caregivers who are planning to be away for
									an extended period of time or who simply need a well-deserved break. All of our short-term guests 
									receive the same care, services, and access to amenities as our live-in residents. 						
								</p>
								<a href="<?php bloginfo('url'); ?>/senior-living-and-care-options/short-term-stays-for-seniors">Learn More</a>
							</div>							
						</div>
					</div>
				</section>
			</article>

		<?php endwhile; ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
