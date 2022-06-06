
<?php
	// fields ebook_content_title, ebook_content_text, ebook_link_text, ebook_link_url

$rows = get_field('e-books');
$row_count = count($rows);

if ( $row_count > 1 ) { ?>

<section class="section-ebook-listing">
	<div class="container">
	<?php
		if( have_rows('e-books') ):

			while( have_rows('e-books') ): the_row();
			// vars
			$ebook_content_title = get_sub_field ('ebook_content_title');
			$ebook_content_text = get_sub_field ('ebook_content_text');
			$ebook_link_text = get_sub_field ('ebook_link_text');
			$ebook_link_url = get_sub_field ('ebook_link_url');
			$ebook_image = get_sub_field ('ebook_image');
			
			$row_class = (get_row_index() % 2 == 0) ? 'content-left' : 'content-right';
	?>

	
	    <div class="row <?php echo $row_class; ?>">
			<div class="col-md-5 col-lg-4 col-image">
				<div class="wrap-image">
					<a href="<?php echo $ebook_link_url ?>"><img src="<?php echo $ebook_image['url']; ?>" alt="<?php echo $ebook_image['alt'] ?>" /></a>
				</div>
			</div>
			<div class="col-md-7 col-lg-8 col-content">
				<h2 class="h3"><a href="<?= $ebook_link_url ?>" title="<?= $ebook_content_title ?>"><?= $ebook_content_title ?></a></h2>
				<?php echo $ebook_content_text; ?>
				<a class="btn-primary-navy btn-outline btn-small" href="<?php echo $ebook_link_url ?>"><?php echo $ebook_link_text ?></a>
			</div>			
	    </div>
	<?php
			endwhile;
		endif;
		wp_reset_postdata();
	?>
	</div>
</section>

<?php

} else {
	// do nothing, load nothing
}
?>