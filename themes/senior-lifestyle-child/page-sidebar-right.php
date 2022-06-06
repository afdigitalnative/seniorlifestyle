<?php
/**
 * Template Name: Page Template - Sidebar Right
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
?>

<style>
	.entry-title{
    text-align: left;
	}

	.entry-title:before{
		color: #177e89;
		content: "//";
		font-size: 3.5rem;
		left: -1rem;
		position: relative;
		letter-spacing: -5px;
	}
	@media (max-width: 768px) {
		.entry-title:before{
			display: none !important;
		}
	}

</style>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container pb-6">
				<div class="row">
					<div class="col-md-8">
					<header class="page-title-wrapper">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
						<?php

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.

						?>
					</div>
					<div class="col-md-4">
						<?php
							if ( is_page( array( 'contact-senior-lifestyle' ) ) ) {
							     get_sidebar('contact');

							} else {
								// generic sidebar
								get_sidebar();
							}
						?>
					</div>
				</div>
			</div>

		<!-- Full width CTA -->
        <?php
        get_template_part( 'template-parts/components/find-community' );
        ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();