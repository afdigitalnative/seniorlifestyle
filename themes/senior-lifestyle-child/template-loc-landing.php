<?php
/**
 * Template Name: Lifestyle Hub Page
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


?>

<div id="primary" class="content-area lifestyle-hub">
    <main id="main" class="site-main pb-0" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="row">
						<div class="col-md-8 pr-md-4">
							<div class="section-title-with-line line-top <?php echo $loc_color_scheme; ?>">
								<h1 class="h2"><?php echo get_the_title(); ?></h1>
							</div>
							<div class="header-content">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="jump-links">
								<div class="jump-title"><strong>Jump to:</strong></div>
								<ul>
									<li><a href="#independent-living">Independent Living</a></li>
									<li><a href="#assisted-living">Assisted Living</a></li>
									<li><a href="#memory-care">Memory Care</a></li>
									<li><a href="#skilled-nursing">Skilled Nursing</a></li>
									<li><a href="#short-term-care">Short-Term Care</a></li>
									<li><a href="#affordable-senior-housing">Affordable Housing</a></li>
								</ul>
							</div>
						</div>
					</div>
				
					<?php

						get_template_part( 'template-parts/components/page-blurbs-alt' );
	
						get_template_part('template-parts/components/callout-box');

					?>

                </article>

			</div><!-- container -->
			
		<?php
			get_template_part( 'template-parts/components/find-community' );
		?>
		
        <?php endwhile; ?>		
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
