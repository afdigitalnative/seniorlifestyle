<?php

global $post;

$event_embed = get_field('events_facebook_embed') ? get_field('events_facebook_embed', false, false) : '';

$postName = $post->post_name;



$comm_posts_args = array(
    'numberposts' => 4,
    'meta_query' => array(
        array(
            'key'   => '_community_box',
            'orderby'  => 'date',
            'order'  => 'DESC',
            'value' => $postName,
            'compare' => 'LIKE'
        )
    )
);

$comm_posts_list = get_posts($comm_posts_args);

$comm_resources_args = array(
    'numberposts' => 4,
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'field' => 'name',
            'terms' => 'Community Resource',
            'include_children' => false,
            'post_status' => 'publish'
        )
    )
);
$events_code = get_field('events_facebook_embed');
//$comm_resources_list = get_posts($comm_resources_args);
$resourses = get_field('resources_repeater', 'option');
// print_r($resources);
?>

<section class="blog-events-section" id="blog_events_section">
    <div class="container">
        <h2 class="community-section-title ml-3 text-left">
			Events & Resources
			<span class="line-top"></span>			
		</h2>
    </div>
    <div class="blog-events">
        <div class="events-inner-container row">
            <?php if ($events_code && $events_code != "") : ?>
                <div id="events_column" class="events-embed-container col-md-4 pt-5 align-self-center">
                    <h4 class="text-white">Upcoming Events</h4>
					<div class="fb-iframe-wrapper">
						<?php the_field('events_facebook_embed', false, false); ?>
					</div>
                </div>
            <?php endif; ?>
            <div class="col-md-8 row my-5 mx-0 pt-5 side-container">
            <?php if (have_rows('ebook_section')) : ?>
                <?php while (have_rows('ebook_section')) : the_row(); 
                    $ebook_heading = get_sub_field('ebook_header');
                    $ebook_cover = get_sub_field('ebook_cover');
                    $ebook_link_label = get_sub_field('ebook_link_label');
                    $ebook_link = get_sub_field('ebook_link');
                ?>
				<div class="row">
					<div class="col-md-6 pb-3">
						<h4 class="text-left guide-box"><?php echo $ebook_heading ?></h4>
						<div class="guide-box">
							<div class="main-wrapper">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo $ebook_cover ?>" alt="<?php echo $ebook_heading ?>">
								<div class="my-3 d-inline-block">
									<?php if($ebook_link): ?>
										<a href="<?php echo $ebook_link ?>" class="btn btn-primary-lightblue" target="_blank"><i class="fal fa-arrow-alt-to-bottom" style="margin-right: 10px;"></i><?php echo $ebook_link_label ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php if ($resourses) : ?>
						
						<div class="col-md-6 pb-3">
							<div id="resources_columns" class="link-box">
								<div class="link-box-wrapper">
									<h4>More Resources</h4>
									<?php if ($resourses) : ?>
										<?php while (have_rows('resources_repeater', 'option')) : the_row(); ?>
											<?php
											$resource_link = get_sub_field('resource_link');
											$resource_text = get_sub_field('resource_text');
											?>
											<a href="<?php echo $resource_link ?>" target="_blank"><span class="list-dash">-</span> <?php echo $resource_text ?></a>
										<?php endwhile; ?>
									<?php endif; ?>
									<a class="link-more" href="<?php echo home_url() . '/resources/'; ?>" target="_blank">See More</a>
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