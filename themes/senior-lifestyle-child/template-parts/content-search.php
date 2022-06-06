<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_child
 */
	$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	if  ( ! empty( $featured_image_url ) ) {
		$col_md_4 = 'class="col-md-4"';
		$col_md_8 = 'class="col-md-8"';
	} else {
		$col_md_4 = 'class="col-md-4" style="display:none;"';
		$col_md_8 = 'class="col-md-12"';
	}
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-container">
			<div class="row">
				<hr>
				<div <?php echo $col_md_4 ?> >
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	                	<?php the_post_thumbnail('medium'); ?>
	            	</a>
				</div>
				<div <?php echo $col_md_8 ?>>
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

						<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php
							senior_lifestyle_parent_posted_on();
							senior_lifestyle_parent_posted_by();
							?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<div class="entry-summary">
						<?php
						if($post->post_type=='post'){
						    the_excerpt();

						} else if ($post->post_type=='page'){

							echo wp_trim_words( get_the_content(), 35, '...' );

						} else if ($post->post_type=='community'){
						//  echo $hero_panel_sub = get_field('hero_panel_sub') ? get_field('hero_panel_sub') : '';
						    $general_information = get_field('general_information') ? get_field('general_information') : array();
						    $community_address = $general_information['community_address'];
						    ?>
						    <div><?php echo $community_address['street_address']; ?></div>
							<div><?=$community_address['city']; ?>, <?= $community_address['state']; ?> <?= $community_address['zip']; ?></div>
						<?php
	                                            }
	                                            ?>
					</div><!-- .entry-summary -->

					<footer class="entry-footer">
						<?php senior_lifestyle_parent_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</div>
	</article>



