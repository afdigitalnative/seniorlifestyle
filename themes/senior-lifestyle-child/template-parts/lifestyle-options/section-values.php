<?php
    global $post;

    $values_section_fields = get_field('values_section');
    $values_title = $values_section_fields['title'];
    $values_content = $values_section_fields['content'];
	$values_image = $values_section_fields['image'];
	$callout_link = $values_section_fields['link'];	
?>

<?php if($values_section_fields && $values_content): ?>
<section id="section-loc-values" class="section-loc-values">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 mb-4 col-title pr-0">
				<div class="section-title-with-line line-top <?php echo $loc_color_scheme; ?>">
					<h2><?php echo $values_title; ?></h2>
					<span class="line-top"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row flex-sm-row flex-column-reverse">
			<div class="col-sm-5 mt-4 px-4 py-3 py-md-0 px-md-3 mt-md-0">
				<div class="wrap-img">
				<?php 
					if( $values_image ) {
				?>
				<img src="<?php echo esc_url($values_image['url']); ?>" alt="<?php echo esc_attr($values_image['alt']); ?>" />
				
				<?php
					}				
				?>
				</div>
			</div>			
			<div class="col-sm-7">
				<?php echo $values_content; ?>
				<?php if($callout_link): ?>
				<div class="text-md-left text-center">
					<a href="<?php echo $callout_link['url'] ?>" class="btn-primary-lightblue"><?php echo $callout_link['title'] ?></a>
				</div>
				<?php endif; ?>
			</div>		
		</div>
	</div>
</section>
<?php endif; ?>