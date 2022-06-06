<?php
/**
 *
 *  The main Blog Page template file
 *
 * This is for whatever static page is set for the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main pb-0">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-9">
						<div class="section-title-with-line m-show">
							<h1 class="h2"><?php single_post_title(); ?></h1>
						</div>	

						<div id="blog">
							<?php while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-container">

									<div class="row">
										<?php
										$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
										if  ( ! empty( $featured_image_url ) ) {
												$col_md_4 = 'class="col-md-4"';
												$col_md_8 = 'class="col-md-8"';
											} else {
												$col_md_4 = 'class="col-md-4" style="display:none;"';
												$col_md_8 = 'class="col-md-12"';
											}
										?>

										<div <?php echo $col_md_4 ?> >
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
										</div>
										<div <?php echo $col_md_8 ?> >

											<?php the_title( sprintf( '<h2 class="alpha entry-title h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
											<div class="post-date">
												<p>By <a href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_the_author_meta('display_name'); ?></a> | <?php echo get_the_date('F d, Y'); ?></p>
											</div>

											<div class="excerpt-container">
											<?php the_excerpt(
												sprintf(
													/* translators: %s: post title */
													__( 'Continue reading... %s', 'senior-lifestyle' ),
													'<span class="screen-reader-text" style="visibility:hidden;">' . get_the_title() . '</span>'
												)
											); ?>
											</div>

											<div class="permalink-wrapper">
												<a href="<?php the_permalink(); ?>" class="btn-primary-lightblue btn-medium">Read More</a>
											</div>
										</div>
									</div>

								</div>
							</article>
							<?php endwhile; ?>
						</div>
						<div class="pagination-wrap">
							<?php sl_pagination(); ?>
						</div>
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
