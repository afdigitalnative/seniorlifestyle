<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_child
 */

	// Check ACF for search message content
	if ( get_field( 'search_no_results_title', 'sl_options' ) && get_field( 'search_no_results_msg', 'sl_options' ) ):

		$no_result_title = get_field( 'search_no_results_title', 'sl_options' );
		$no_result_msg = get_field( 'search_no_results_msg', 'sl_options' );

	else:

		$no_result_title = "Your search returned no results...";
		$no_result_msg = "Your search returned no results.";

	endif;
?>

	<div class="page-content">

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php echo $no_result_title . '<span>"' . get_search_query() . '</span>"'?> </h1>
		<?php echo $no_result_msg ?>
		<?php // printf( strip_tags( $no_result_msg . ': %s', 'senior-lifestyle-child' ), '<span>' . get_search_query() . '</span>' ); ?>
	</header><!-- .page-header -->



	</div><!-- .page-content -->

</section><!-- .no-results -->
