<?php
/**
 * Template Name: Market Listing Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
global $post;

$featured_img = get_post_thumbnail_id(get_the_ID(), 'full');
$background_img = wp_get_attachment_url($featured_img);
	
?>

<div id="primary" class="content-area lifestyle-market">
    <main id="main" class="site-main py-0" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<style>
					#primary.lifestyle-market .market-listing-hero:before {
						background-image: url('<?php echo $background_img; ?>');
					}
				</style>
				<section id="market-listing-hero" class="market-listing-hero">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<h1 class="h2"><?php echo get_the_title(); ?></h1>
								<?php the_content(); ?>
							</div>
							<div class="col-md-5 hero-back">
							<!-- Hero Background Image -->
							</div>
						</div>
					</div>
				</section>	

				<section class="market-links">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
							<?php
								$markets = get_posts(array(
														'post_type' => 'market',
														'posts_per_page' => -1,
														'post_status' => 'publish',
														'order' => 'ASC',
														'orderby' => 'meta_value',
														'meta_key'  => 'market_name'
													)
											);
											
								if(count($markets) > 0):
									foreach($markets as $market):
										$state = get_field('market_state', $market->ID);
										$market->market_name = get_field('market_name', $market->ID);
										$market->market_state = $state['label'];
										$market->market_short_description = get_field('market_short_description', $market->ID);
							?>
								<a href="<?php echo get_post_permalink($market->ID); ?>">
									<?php echo $market->market_name; ?>
								</a>
							<?php endforeach; endif; ?>
							</div>
						</div>
					</div>
				</section>
				
				<section class="svg-divider">
					<svg width="75px" height="75px" viewBox="0 0 75 75" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
					  <defs>
						<path d="M0 20L20 20L20 0L0 0L0 20Z" transform="matrix(0.99999994 0 0 0.99999994 0 29.698486)" id="path_1" />
						<path d="M0 20L20 20L20 0L0 0L0 20Z" transform="matrix(0.99999994 0 0 0.99999994 28.991333 28.99121)" id="path_2" />
						<path d="M0 20L20 20L20 0L0 0L0 20Z" transform="matrix(0.99999994 0 0 0.99999994 0.7071533 0.70703125)" id="path_3" />
						<path d="M0 21L20 21L20 0L0 0L0 21Z" transform="matrix(0.99999994 0 0 0.99999994 15.202759 14.702637)" id="path_4" />
						<path d="M0 20L20 20L20 0L0 0L0 20Z" transform="matrix(0.99999994 0 0 0.99999994 29.698486 0)" id="path_5" />
					  </defs>
					  <g id="Group-23" transform="translate(2 2)">
						<g id="squares" transform="matrix(0.70710677 0.70710677 -0.70710677 0.70710677 35.14209 0)" opacity="0.35451373">
						  <g id="Stroke-1">
							<use xlink:href="#path_1" fill="none" stroke="#177E89" stroke-width="4" />
						  </g>
						  <g id="Stroke-3">
							<use xlink:href="#path_2" fill="none" stroke="#177E89" stroke-width="4" />
						  </g>
						  <g id="Stroke-4">
							<use xlink:href="#path_3" fill="none" stroke="#177E89" stroke-width="4" />
						  </g>
						  <g id="Stroke-6">
							<use xlink:href="#path_4" fill="none" stroke="#177E89" stroke-width="4" />
						  </g>
						  <g id="Stroke-7">
							<use xlink:href="#path_5" fill="none" stroke="#177E89" stroke-width="4" />
						  </g>
						</g>
					  </g>
					</svg>				
				</section>
				
				<section class="market-listing">
					<div class="container">
						<div class="row">
							<?php							
								/*
								$markets = $wpdb->get_results("
												  select p.ID, pm.meta_value, p.*
													from $wpdb->posts p
														 join $wpdb->postmeta pm on p.ID = pm.post_id
												   where p.post_type = 'market'
													 and p.post_status = 'publish'
													 and pm.meta_key = 'market_state'
												group by pm.meta_value
												order by pm.meta_value ASC" );
								*/
								function group_by($key, $data) {
									$result = array();

									foreach($data as $val) {
										if(array_key_exists($key, $val)){
											$result[$val[$key]][] = $val;
										}else{
											$result[""][] = $val;
										}
									}

									return $result;
								}

								$markets = json_decode(json_encode($markets), true); 
								$grouped_markets = group_by("market_state", $markets);	
								ksort($grouped_markets);
								$total_index = 0;
								
								if(count($grouped_markets) > 0):
									foreach($grouped_markets as $state => $markets):
										foreach($markets as $index => $market): 
										
											$market_featured_img = get_post_thumbnail_id($market['ID'], 'full');
											$market_background_img = $market_featured_img ? wp_get_attachment_url($market_featured_img) : $background_img;
											$market_short_description = $market['market_short_description'] ? $market['market_short_description'] : '';
											
											$col_classes = 'market-index-' . $index;
											
											if(count($markets) > 1) {
												$col_classes .= ' has-top-line';
											}
											
											if($index == (count($markets) - 1)) {
												$col_classes .= ' market-index-last';
											}
											
											if($total_index > 9) {
												$col_classes .= ' d-none d-md-block';
											}
							?>
											<div class="col-sm-6 col-md-4 market-item <?php echo $col_classes; ?>">
												<div class="market-state">
													<h3><?php echo $state; ?></h3>
												</div>
												<div class="wrap-img">
													<img src="<?php echo $market_background_img; ?>" alt="<?php echo $market['market_name'] ?>" />
												</div>
												<h4><?php echo $market['market_name']; ?></h4>
												<p><?php echo $market_short_description; ?></p>
												<div class="wrap-button text-center text-md-left <?php if($total_index == 9) echo 'd-none d-md-block'; ?>">
													<a href="<?php echo get_post_permalink($market['ID']); ?>" class="btn-primary-lightblue btn-small">View <?php echo $market['market_name']; ?> Communities</a>
												</div>
											</div>
							<?php 		
											$total_index++;
										endforeach;
									endforeach; 
								endif; 
							?>
							<div class="d-md-none more-markets">
								<a href="#">View More</a>
							</div>
						</div>
					</div>
				</section>
			</article>
		
        <?php endwhile; ?>		
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
