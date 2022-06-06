<?php
    global $post;

    $how_section_fields = get_field('how_to_find');
    $how_title = $how_section_fields['title'];
    $how_content = $how_section_fields['content'];
	$how_image = $how_section_fields['image'];
?>

<section id="section-loc-how" class="section-loc-how <?php echo $loc_color_scheme; ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 mb-4 col-title pr-0">
				<div class="section-title-with-line line-top <?php echo $loc_color_scheme; ?>">
					<h2><?php echo $how_title; ?></h2>
					<span class="line-top"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<?php echo $how_content; ?>
			</div>
			<div class="col-sm-5 mt-2 px-4 py-3 py-md-0 px-md-3 mt-md-0">
				<div class="wrap-img">
				<?php 
					if( $how_image ) {
				?>
				<img src="<?php echo esc_url($how_image['url']); ?>" alt="<?php echo esc_attr($how_image['alt']); ?>" />
				
				<?php
					}				
				?>
				</div>
			</div>			
		</div>
	</div>
</section>