<?php
/**
 *
 * 404 Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();

	// check for 404 title
	if ( get_field( '404_page_title', 'sl_options' ) ):
		$page_404_title = get_field( '404_page_title', 'sl_options' );
	else:
		$page_404_title = "Oops! That page can’t be found.";
	endif;

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-8">

						<div class="error-404 not-found">
							<div class="page-content">
								<h1><?php echo $page_404_title ?></h1>
							</div><!-- .page-header -->

						</div><!-- .error-404 -->

					</div>
					<div class="col-md-4">
					<?php get_sidebar( 'general' ); ?>
					</div>
				</div>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();