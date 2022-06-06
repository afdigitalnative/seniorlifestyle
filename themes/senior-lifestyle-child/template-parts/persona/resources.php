<?php

global $post;

$resources = get_field('resource_links');

?>

<section id="section-resources" class="resources-section">
    <div class="container">
        <div class="section-title-with-line line-primary-yellow m-show">
			<h2>Resources</h2>
			<span class="line-top m-show"></span>			
		</div>
    </div>
    <div class="resources">
        <div class="events-inner-container row">
            <div class="col-md-8 row my-3 my-md-5 mx-0 pt-3 pt-md-5 side-container">
            <?php if (have_rows('ebook_section')) : ?>
                <?php while (have_rows('ebook_section')) : the_row(); 
                    $ebook_heading = get_sub_field('ebook_header');
                    $ebook_cover = get_sub_field('ebook_cover');
                    $ebook_link_label = get_sub_field('ebook_link_label');
                    $ebook_link = get_sub_field('ebook_link');
                ?>
				<!--
				<div class="row">
					<div class="col-md-6">
						<h3 class="text-left guide-box"><?php echo $ebook_heading ?></h3>
					</div>
				</div>
				-->
				<div class="row">
					<div class="col-md-6 pb-md-3">
						<h4 class="text-left guide-box"><?php echo $ebook_heading ?></h4>
						<div class="guide-box">
							<div class="main-wrapper">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo $ebook_cover ?>" alt="<?php echo $ebook_heading ?>">
								<div class="my-3 d-inline-block">
									<?php if($ebook_link): ?>
										<a href="<?php echo $ebook_link ?>" class="btn btn-primary-lightblue"><i class="fal fa-arrow-alt-to-bottom" style="margin-right: 10px;"></i><?php echo $ebook_link_label ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php if ($resources) : ?>
						<div class="col-md-6 pb-md-3 pl-0 pl-md-3">
							<div id="resources_column" class="link-box">
								<div class="link-box-wrapper">
									<h4>More Resources</h4>
									<?php while (have_rows('resource_links')) : the_row(); ?>
										<?php
										$resource_link = get_sub_field('link');
										$resource_text = get_sub_field('text');
										?>
										<a href="<?php echo $resource_link ?>"><?php echo $resource_text ?></a>
									<?php endwhile; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
            </div>
        </div>
    </div>
</section>

<script>
    var fbEventEmbed = '<?= html_entity_decode($event_embed) ?>';
</script>

<!-- Clean this section -->
<!-- <?php if ($comm_posts_list) : ?>
        <div id="blog_column" class="column">
            <h2>Community Info</h2>
            <div class="link-box">
            <?php foreach ($comm_posts_list as $comm_post) : ?>
                <div class="blog-link-wrapper">
                    <a href="<?php echo get_permalink($comm_post->ID); ?>"><?php echo $comm_post->post_title; ?></a>
                </div>
            <?php endforeach; ?>
                <a class="link-more" href="<?php echo home_url() . '/resources/blog/'; ?>">See More</a>
            </div>
        </div>
        <?php endif; ?> -->