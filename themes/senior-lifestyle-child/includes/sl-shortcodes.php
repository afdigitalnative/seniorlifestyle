<?php

// DISPLAY CURRENT YEAR
// example: © [year] Senior Lifestyle | 303 East Wacker Drive, 24th Floor, Chicago, IL 60601
function year_shortcode()
{
	$fromYear = 2019;
	$thisYear = (int)date('Y');
	$year = $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');
	return $year;
}
add_shortcode('year', 'year_shortcode');

// ENSURE SHORTCODE CAN BE USED INSIDE ACF TEXTFIELD
add_filter('acf/format_value/type=textarea', 'do_shortcode');

// SHORTCODE FOR PURPLE BUTTONS, TYPICALLY USED IN CONTENT EDITOR
function purple_button_shortcode($atts, $content = null)
{
	// shortcode attributes
	extract(shortcode_atts(array(
		'url'    => '',
		'title'  => '',
		'target' => '',
		'text'   => '',
	), $atts));

	$content = $text ? $text : $content;

	// Returns the button with a link
	if ($url) {

		$link_attr = array(
			'href'   => esc_url($url),
			'title'  => esc_attr($title),
			'target' => ('blank' == $target) ? '_blank' : '',
			'class'  => 'btn-primary-navy'
		);

		$link_attrs_str = '';

		foreach ($link_attr as $key => $val) {

			if ($val) {
				$link_attrs_str .= ' ' . $key . '="' . $val . '"';
			}
		}

		return '<a' . $link_attrs_str . '><span>' . do_shortcode($content) . '</span></a>';
	} else {
		// Return as span when no link defined, may need attention?
		return '<span class="purple-button"><span>' . do_shortcode($content) . '</span></span>';
	}
}
add_shortcode('purplebutton', 'purple_button_shortcode');

// LOGOS SHORTCODE, VERY BASIC
function logos_shortcode()
{
	$output =  "<div class='logo-wrapper'>
						<div class='Grid Grid--gutters Grid--cols-4 centertext'>
						<div class='Grid-cell'><img src='" . SL_CHILD_THEME_URL . "/assets/img/logos/Mand_SpiritInnovation_Logo.png'></div>
						<div class='Grid-cell'><img src='" . SL_CHILD_THEME_URL . "/assets/img/logos/Mand_Argentum_BestLogo_2016.png'></div>
						<div class='Grid-cell'><img src='" . SL_CHILD_THEME_URL . "/assets/img/logos/Mand_GreatPlace_Logo.png'></div>
						<div class='Grid-cell'><img src='" . SL_CHILD_THEME_URL . "/assets/img/logos/Mand_ICAA_Logo.png'></div>
					</div>
					</div>";

	return $output;
}
add_shortcode("logos-shortcode", "logos_shortcode");

// SOCIAL SHORT CODE - USES VALUES FROM ACF CUSTOM SETTINGS
function social_icons()
{
	// get social fields
	$facebook = get_field('facebook_url', 'social_options');
	$twitter = get_field('twitter_url', 'social_options');
	$youtube = get_field('youtube_url', 'social_options');
	$linkedin = get_field('linkedin_url', 'social_options');

	// create social array
	$facebook_btn = array('class' => 'fab fa-facebook-square', 'link' => $facebook, 'text' => 'Follow us on Facebook');
	$twitter_btn = array('class' => 'fab fa-twitter-square', 'link' => $twitter, 'text' => 'Follow us on Twitter');
	$youtube_btn = array('class' => 'fab fa-youtube-square', 'link' => $youtube, 'text' => 'Watch us on YouTube');
	$linkedin_btn = array('class' => 'fab fa-linkedin', 'link' => $linkedin, 'text' => 'Follow us on LinkedIn');

	// if Field is not empty, add it to the array
	$sociallinks = array();
	if ($facebook != '') {
		$sociallinks[] = $facebook_btn;
	}
	if ($twitter != '') {
		$sociallinks[] = $twitter_btn;
	}
	if ($youtube != '') {
		$sociallinks[] = $youtube_btn;
	}
	if ($linkedin != '') {
		$sociallinks[] = $linkedin_btn;
	}
?>
	<?php
	// social loop
	foreach ($sociallinks as $social) { ?>
		<a href="<?php echo $social['link']; ?>" title="<?php echo $social['text']; ?>" target="_blank" rel="nofollow noreferrer"><span class="<?php echo $social['class']; ?>"></span></a>
	<?php }
}
add_shortcode('social-icons', 'social_icons');

// Testimonial Slider
function testimonial_slider($atts)
{

	if (!isset($atts['section']) || empty($atts['section'])) {
		$atts['section'] = 'front-page';
	}
	$terms = explode(",", $atts['section']);
	foreach ($terms as $value) {
		$termList[] = $value;
	}

	$show_icon = isset($atts['icon'])? !($atts['icon'] == "false") : true;
	$show_ratings = isset($atts['ratings'])? !($atts['ratings'] == "false") : true;

	$args = array(
		'post_type' => 'testimonials',
		'post_status' => 'publish',
		'posts_per_page' => 10,
		'tax_query' => array(
			array(
				'taxonomy' => 'section',
				'field' => 'slug',
				'terms' => $termList,
			)
		),
	);
	$loop = new WP_Query($args);
	ob_start();
	$num = 0;

	?>
	<div id="testimonials" class="testimonials">
		<?php
		if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
				$data = get_post_meta($loop->post->ID, 'testimonial', true);

		?>

				<div class="testimonials-row slide mySlides">
					<?php if ($show_icon == true) : ?>
						<div class="testimonials-row-container-quote">
							<span class=""><i class="fa fa-quote-left quote"></i></span>
						</div>
					<?php endif; ?>

					<div class="testimonials-row-container">
						<?php
						$stars = intval(get_field( "star_rating" ));
						if ($stars > 0 && $show_ratings) {
						?>
							<ul class="fa-ul testimonials-row-container-ul mb-2">
								<?php
								$x = 0;
								while ($stars > $x) {
								?>
									<li><i class="fas fa-star"></i></li>
								<?php
									$x++;
								}
								?>
							</ul>
						<?php } ?>

						<div class="testimonials-body"><?php the_content() ?></div>
						<div class="client-name"><?php the_title() ?></div>
						<div class="client-role"><?php if(get_field('client_role')) echo get_field('client_role'); ?></div>
					</div>
				</div>

			<?php
				$num++;
			endwhile;
		endif;
		wp_reset_postdata();
		
		/*
		if ($num > 1) :
		
			?>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>
			<div class="dot-container">
				<?php
				for ($i = 0; $i < $num; $i++) { ?>
					<span class="dot" onclick="currentSlide(<?= $i + 1 ?>)"></span>
				<?php } ?>
			</div>
		<?php 
			endif; */ 
		?>
	</div>

<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}

add_shortcode('testimonials-slider', 'testimonial_slider');

// Blog ebook callouts

function blog_callout()
{
	$callout_header = get_field('callout_header');
	$callout_image = get_field('callout_image');
	$callout_body = get_field('callout_body');
	$callout_cta = get_field('callout_cta');
	$callout_cta_link = get_field('callout_cta_link');
	$financial_cal_pg = is_page('retirement-community-cost-calculator');
	$style_img = $financial_cal_pg ? '4' : '6';
	$style_body = $financial_cal_pg ? '8' : '6';
	$style_btn = $financial_cal_pg ? ' d-inline' : '';
	$color_scheme = 'navy';
	$color_scheme = ($callout_cta_link == get_permalink(get_page_by_path( 'resources/guides/the-future-of-retirement-living'))) ? 'yello' : 'navy';
	$color_scheme = ($callout_cta_link == get_permalink(get_page_by_path( 'resources/guides/adult-children-of-aging-parents'))) ? 'red' : 'navy';
	$color_scheme = ($callout_cta_link == get_permalink(get_page_by_path( '/resources/guides/the-complete-guide-to-dementia-for-caregivers' ))) ? 'purple' : 'navy';

	$callout_html = '<div class="row ebook-box ' . $color_scheme . '">
						<div class="col-md-6 col-lg-5 col-image">
							<div class="wrap-image">
								<img src="' . $callout_image['url'] . '" alt="' . $callout_image['alt'] . '" />
							</div>
							<div class="clip-back"></div>	
						</div>
						<div class="col-md-6 col-lg-7 col-content">
							<h3 class="h5">' . $callout_header . '</h5>'
							. $callout_body .
							'<a class="btn-primary-navy btn-outline btn-small" href="' . $callout_cta_link . '">' . $callout_cta . '</a>
						</div>
					</div>';	

	return $callout_html;
}
add_shortcode('blog_callout', 'blog_callout');
