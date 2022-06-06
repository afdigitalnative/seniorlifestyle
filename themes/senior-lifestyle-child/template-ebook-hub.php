<?php
/**
 * Template Name: EBook Hub Page
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

<div id="primary" class="content-area ebook-hub">
    <main id="main" class="site-main py-0" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="section-ebook-hub-hero">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<h1 class="h2"><?php echo get_the_title(); ?></h1>
								<?php the_content(); ?>
							</div>
							<div class="col-md-5 col-links">
								<div class="links-label">Available Guides</div>
								<?php
								$rows = get_field('e-books');
								$row_count = count($rows);

								if( $row_count > 1 ) {
										
									echo '<ul>';
									
									if( have_rows('e-books') ) {

										while( have_rows('e-books') ) {
											the_row();
											$ebook_link_title = get_sub_field ('ebook_content_title');
											$ebook_link_url = get_sub_field ('ebook_link_url');
								
											echo '<li><a href="' . $ebook_link_url . '" title="' . $ebook_link_title . '">' . $ebook_link_title . '</a></li>';
										}
									}
									
									echo '</ul>';
								}
								?>
							</div>
						</div>
					</div>
				</section>
				<?php 
					get_template_part( 'template-parts/components/downloadable-resources' ); 
					get_template_part( 'template-parts/components/find-community' );
				?>
			</article>
		
        <?php endwhile; ?>		
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
