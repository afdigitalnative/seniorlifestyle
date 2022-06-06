<div class="row">
    <div class="col">
		<div class="senior-leadership-wrap">
			<h2>Senior Leadership</h2>
			<p class="leadership-text">Our Senior Leadership team provides specialized support and guidance to our communities, using their diverse experience to help all staff and residents realize their full potential. Because of our team's passion for improving the lives of others, our communities can offer outcome-driven care. We support communities in creating senior lifestyles that go beyond expectations and help residents redefine their lifestyles through our innovative programming, convenient amenities, and compassionate care. </p>
				<!-- loop thru Senior Leadership -->
				<div class="leader-card-wrap">
				<?php
					$args = array(
					        'post_type' => 'staff_and_leadership',
					        'post_status' => 'publish',
					        'posts_per_page' => -1,
					        'orderby' => 'menu_order',
					        'order' => 'ASC',
							'tax_query' => array(
								array(
								'taxonomy' => 'leadership',
								'field' => 'slug',
								'terms' => 'senior-leadership',
							)
						)
					);

					$loop = new WP_Query($args);?>

			    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

				    <div class="leader-card">
				        <?php senior_lifestyle_parent_post_thumbnail(); ?>
				        <h3><?php the_title(); ?></h3>
				        <p><?php the_field('staff_position'); ?></p>
				    </div>

			    <?php endwhile; ?>

			    <?php else: ?>
			        <h1>No Senior Leaders found</h1>
			    <?php endif; ?>
			    <?php wp_reset_postdata(); ?>
				</div>
		</div> <!-- leadership-wrap -->
    </div><!-- col -->
</div><!-- row -->
