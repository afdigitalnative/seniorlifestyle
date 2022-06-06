    <div class="row">
        <div class="col">
			<div class="executive-leadership-wrap">
				<h2>Executive Leadership</h2>
				<p class="leadership-text">Our Executive Team guides our company by setting a commitment to developing positive places to live and work. We are always mindful of how our administrative decisions affect the lives of others. Our leadership team is dedicated to building a company that continues to elevate the lifestyles for our seniors. We welcome you to meet our team whose  passion and dedication drives them to enhance the quality of life for all seniors.  </p>
					<!-- loop thru Executive Category -->
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
									'terms' => 'executive-leadership',
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
				        <h1>No Executive Leaders found</h1>
				    <?php endif; ?>
				    <?php wp_reset_postdata(); ?>
					</div>
			</div> <!-- leadership-wrap -->
        </div><!-- col -->
    </div><!-- row -->
