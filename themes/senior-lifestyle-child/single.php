<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main pb-0">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-9 pad-right">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

					endwhile; // End of the loop.
					?>
					</div>
					<div class="col-md-4 col-lg-3">
					<?php get_sidebar( 'blog' ); ?>
					</div>
				</div>
			</div>

			<?php
				get_template_part( 'template-parts/components/find-community' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
