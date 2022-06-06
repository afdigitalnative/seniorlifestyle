<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="section-title-with-line line-primary-light m-show">
        <?php the_title( '<h1 class="entry-title h2">', '</h1>' ); ?>
    </div>

    <div class="banner-img-wrapper">
        <?php the_post_thumbnail('blogpost_feature'); ?>
    </div>

    <div class="post-content-wrapper">
        <?php the_content(); ?>
		<svg class="round-clip-path">
		  <clipPath id="round-clip-path" clipPathUnits="objectBoundingBox"><path d="M0,0 L0.968,0 Q0.969,0,0.97,0 Q0.971,0,0.972,0 Q0.973,0,0.973,0 Q0.974,0.001,0.975,0.001 Q0.976,0.001,0.977,0.001 Q0.978,0.001,0.979,0.002 Q0.979,0.002,0.98,0.002 Q0.981,0.002,0.982,0.003 Q0.983,0.003,0.983,0.003 Q0.984,0.004,0.985,0.004 Q0.986,0.005,0.986,0.005 Q0.987,0.005,0.988,0.006 Q0.988,0.006,0.989,0.007 Q0.99,0.007,0.99,0.008 Q0.991,0.009,0.992,0.009 Q0.992,0.01,0.993,0.01 Q0.993,0.011,0.994,0.011 Q0.994,0.012,0.995,0.013 Q0.995,0.013,0.996,0.014 Q0.996,0.015,0.997,0.015 Q0.997,0.016,0.997,0.017 Q0.998,0.018,0.998,0.018 Q0.998,0.019,0.999,0.02 Q0.999,0.02,0.999,0.021 Q0.999,0.022,0.999,0.023 Q1,0.024,1,0.024 Q1,0.025,1,0.026 Q1,0.027,1,0.027 Q1,0.028,1,0.029 Q1,0.03,1,0.03 Q1,0.031,1,0.032 Q1,0.033,0.999,0.034 L0.794,0.977 Q0.794,0.978,0.794,0.978 Q0.793,0.979,0.793,0.98 Q0.793,0.98,0.793,0.981 Q0.793,0.981,0.792,0.982 Q0.792,0.982,0.792,0.983 Q0.792,0.984,0.791,0.984 Q0.791,0.985,0.791,0.985 Q0.79,0.986,0.79,0.986 Q0.79,0.987,0.789,0.987 Q0.789,0.988,0.788,0.988 Q0.788,0.989,0.788,0.989 Q0.787,0.99,0.787,0.99 Q0.786,0.991,0.786,0.991 Q0.785,0.992,0.785,0.992 Q0.784,0.992,0.784,0.993 Q0.783,0.993,0.783,0.994 Q0.782,0.994,0.782,0.994 Q0.781,0.995,0.781,0.995 Q0.78,0.995,0.78,0.996 Q0.779,0.996,0.778,0.996 Q0.778,0.997,0.777,0.997 Q0.777,0.997,0.776,0.997 Q0.775,0.998,0.775,0.998 Q0.774,0.998,0.773,0.998 Q0.773,0.999,0.772,0.999 Q0.771,0.999,0.771,0.999 Q0.77,0.999,0.77,0.999 Q0.769,0.999,0.768,1 Q0.767,1,0.767,1 Q0.766,1,0.765,1 Q0.765,1,0.764,1 Q0.763,1,0.763,1 L0,1 L0,0"></path></clipPath>
		</svg>			
    </div>

    <div class="post-nav-wrapper">
		<?php
		if( get_adjacent_post(false, '', false) ) {
			next_post_link('%link', '<i class="far fa-chevron-left"></i> Previous Post');
		} else {
			$last = new WP_Query('posts_per_page=1&order=DESC'); $last->the_post();
			echo '<a href="' . get_permalink() . '" class="btn-link"><i class="far fa-chevron-left"></i> Previous Post</a></a>';
			wp_reset_query();
		};
		?>
		
		<div class="social-share-wrapper m-0 p-0 d-none d-md-block">
			<h2>Social Share</h2>
			<?php echo do_shortcode( '[social]' ); ?>
		</div>

		<?php
		if( get_adjacent_post(false, '', true) ) {
			previous_post_link('%link', 'Next Post <i class="far fa-chevron-right"></i>');
		} else {
			$first = new WP_Query('posts_per_page=1&order=ASC'); $first->the_post();
			echo '<a href="' . get_permalink() . '" class="btn-primary-navy">Next Post <i class="far fa-chevron-right"></i></a>';
			wp_reset_query();
		};
		?>
	</div>

    <div class="social-share-wrapper d-block d-md-none">
    	<h2>Social Share</h2>
        <?php echo do_shortcode( '[social]' ); ?>
    </div>
</article>



