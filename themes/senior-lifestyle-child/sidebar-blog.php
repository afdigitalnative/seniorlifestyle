<?php
    /*
     *
     * BLOG SIDEBAR
     *
     * Note: This sidebar is not dynamic and has not been registerd as a widget,
     * but it can be at a later time.
     *
     */
     $search_text="";
     global $MYSTATE;
     global $MYCITY;

     if($MYSTATE!="" && $MYCITY!=""){
         $search_text.='<h4>Find a Community in <br>'. stripslashes($MYCITY) . ', ' . $MYSTATE . '</h4>';
         $search_text.='<p class="txt-small">... or another location</p>';
         $search_link = '/find-community/?place=' . urlencode(strtolower($MYCITY) . ',' . strtolower($MYSTATE));
     }else if($MYSTATE!=""){
         $search_text.='<h4>Find a Community in ' . $MYSTATE . '</h4>';
         $search_text.='<p class="txt-small">... or another location</p>';
         $search_link = '/find-community/?place=' . urlencode(strtolower($MYSTATE));
     }else{
         $search_text.='<h4>Find a Community</h4>';
     }
?>
<aside class="sidebar">
	<!--
    <div class="location-callout-box-basic">
        <div class="callout-content">
            <?= $search_text ?>
            <a href="<?= $search_link ?>" class="btn-primary-lightblue">Search Now</a>
        </div>
    </div>
	-->
	
	<div class="sidebar-quiz-box">
		<div class="wrap-img">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img_quiz.png" alt="quiz box" />
		</div>
		<p>Take our level of care quiz</p>
		<a href="<?php bloginfo('url'); ?>/senior-living-and-care-options/lifestyle-option-quiz/"  class="btn-primary-lightblue btn-medium">
			Take the Quiz
		</a>	
	</div>
	
    <div class="featured-posts-block">
        <div class="title">
            <h4>Featured Posts</h4>
        </div>

        <ul class="featured-posts-list">
        <?php
            query_posts('posts_per_page=4&cat=16');
            if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php wp_reset_query();?>
    </div>

    <div class="categories-block">
        <div class="title">
            <h4>Categories</h4>
        </div>
        <ul class="categories-list">
            <!--exclude featured and community resource-->
             <?php wp_list_categories(array('show_count'=>1, 'title_li'=>'','exclude'=>array(16,24),'depth' => 1)); ?>
        </ul>
    </div>
</aside>


