<?php
    global $post;
    $callout_section_fields = get_field('callout_box');
    $callout_title = $callout_section_fields['title'];
    $callout_content = $callout_section_fields['content'];
	$callout_image = $callout_section_fields['image'];
	$callout_link = $callout_section_fields['link'];
	
?>
<?php if($callout_title): ?>
<div class="section-callout-box callout-box-background">
	<div class="container">
		<div class="row">
			<div class="col callout-image <?php if($callout_section_fields['full_image']) echo 'full-image' ?>">
				<img src="<?php echo esc_url($callout_image['url']); ?>" alt="<?php echo esc_attr($callout_image['alt']); ?>" />
			</div>
			<div class="col callout-content">
				<div class="call-out-content-inner">
					<h3><?php echo $callout_title; ?></h3>
					<?php echo $callout_content; ?>
					<?php if($callout_link): ?>
						<a href="<?php echo $callout_link['url'] ?>" class="btn-primary-lightblue"><?php echo $callout_link['title'] ?></a>
					<?php endif; ?>
				</div>
			</div>		
		</div> <!-- // .row -->
	</div>
</div> <!-- // .lo-callout-box -->
<?php endif; ?>