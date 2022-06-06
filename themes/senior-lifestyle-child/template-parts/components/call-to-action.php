<?php
// call to action typically displayed at bottom of pages
// fields: cta_header,cta_text,cta_button_text,cta_button_url
//
// check for cta_header and cta_text, if values exist display
// else ship
?>

<?php if (get_field('cta_header') && get_field('cta_text') != "") { ?>

	<section class="call-to-action">
		<div class="Grid Grid--gutters Grid--1of2 Grid--center">
			<div class="Grid-cell cta">
				<div class="cta-title"><?php echo the_field( "cta_header" )?></div>
				<div class="cta-text"><?php echo the_field( "cta_text" ) ?></div>
				<a href="<?php echo the_field( "cta_button_url" ) ?>" class="btn-primary-lightblue"><?php echo the_field( "cta_button_text" ) ?></a>
			</div>
		</div>
	</section>

<?php } ?>