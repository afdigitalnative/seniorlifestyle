<?php

?>
<section class="reviews-section">
    <div class="container">
        <div class="reviews-hdr-wrapper">
            <h2>Our Rave Reviews</h2>
        </div>

        <div class="overall-rating-container">
            <div class="overall-rating-wrapper">
                <?php echo do_shortcode('[yasr_overall_rating]'); ?>
                <p>Overall ratings for <?php echo the_title(); ?></p>
            </div>
        </div>

        <div class="visitor-vote-container">
            <div class="visitor-votes-wrapper">
                <p>Leave your rating for this location.</p>
                <?php echo do_shortcode('[yasr_visitor_votes]'); ?>
            </div>
        </div>

    </div>
</section>