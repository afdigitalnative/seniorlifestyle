<?php
    $services_section = get_field('services_section');
    $services_title = $services_section['services_title'];
    $services_content = $services_section['services_content'];
?>

<?php if($services_section && have_rows('services_list')): ?>
<section id="section-services" class="services-section">
	<div class="container">
		<div class="row services-header-wrapper">
			<div class="col-sm-12">
				<div class="section-title-with-line">
					<h2><?php echo $services_title; ?></h2>
				</div>
				<div class="services-content"><?php echo $services_content; ?></div>			
			</div>
			<svg width="327px" height="326px" viewBox="0 0 327 326" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
			  <g id="squares" transform="translate(1 1)" opacity="0.35451373">
				<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(0 192)" id="Stroke-1" fill="none" fill-rule="evenodd" stroke-width="2" />
				<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(191 193)" id="Stroke-3" fill="none" fill-rule="evenodd" stroke-width="2" />
				<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(3 0)" id="Stroke-4" fill="none" fill-rule="evenodd" stroke-width="2" />
				<path d="M0 134L132 134L132 0L0 0L0 134Z" transform="translate(99 95)" id="Stroke-6" fill="none" fill-rule="evenodd" stroke-width="2" />
				<path d="M0 131L132 131L132 0L0 0L0 131Z" transform="translate(193 1)" id="Stroke-7" fill="none" fill-rule="evenodd" stroke-width="2" />
			  </g>
			</svg>		
		</div>	
		
		<?php if ( have_rows('services_list') ) : ?>
		<div class="services-list-container row">
			<?php while ( have_rows('services_list') ): the_row(); ?>

			<?php 
				if( (count(get_field('services_list')) % 2 == 1) && (get_row_index() == count(get_field('services_list'))) ) {
					break;
				}
			?>
			
			<div class="services-list-item col-sm-6">
				<div class="icon-wrapper">
					<span class="<?php echo the_sub_field('list_icon'); ?>"></span>
				</div>
				<div class="content-container">
					<h4><?php the_sub_field('list_title'); ?></h4>
					<?php the_sub_field('list_content'); ?>
				</div>
			</div>			
			<?php endwhile; ?>
		</div> <!-- // .experience-list-container -->
		
		<?php 
			if( count(get_field('services_list')) % 2 == 1 ):
				$service_list = get_field('services_list');
				$last_row = array_pop($service_list);
		?>		
		<div class="services-list-container row no-line">
			<div class="services-list-item col-sm-12">
				<div class="icon-wrapper">
					<span class="<?php echo $last_row['list_icon']; ?>"></span>
				</div>
				<div class="content-container">
					<h4><?php echo $last_row['list_title']; ?></h4>
					<?php echo $last_row['list_content']; ?>
				</div>
			</div>			
		</div>
		<?php endif; ?>
		
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>