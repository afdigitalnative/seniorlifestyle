<?php
/**
 * Template part for displaying content via ACF, most pages use the_content
 * to display the banner text.
 *
 */
?>

<section class="section-wrapper page-content-wrapper">
	<div class="row">
		<div class="col-md-12">
			<?= the_field( "page_content" )?>
		</div>
	</div>
</section>
