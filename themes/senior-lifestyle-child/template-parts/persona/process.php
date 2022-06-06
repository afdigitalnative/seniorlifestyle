<?php

//
// EXPERIENCE BOXES
//

?>

<section id="section-process" class="process-section">
    <div class="container">
		<div class="section-title-with-line line-primary-yellow m-show mb-3 mb-md-5">
			<h2>The Process</h2>
		</div>
        <?php if (have_rows('process_items')) :
			$i = 0;
            while (have_rows('process_items')) : $row = the_row(); ?>
				
                <div class="process-item row <?php if($i % 2 === 0) echo 'content-left'; else echo 'content-right'; ?>">
                    <div class="content-wrapper col-md-6 ">
						<div class="process-item-title">
							<h3><?php the_sub_field('title'); ?></h3>
							<i class="far <?php the_sub_field('icon'); ?>"></i>
						</div>
						<div class="content">
							 <?php the_sub_field('content'); ?>
						</div>
                    </div>
					<div class="col-md-6 d-none d-md-block">
					
					</div>
                </div>
				
        <?php $i++; endwhile;
        endif; ?>
    </div> <!-- // .container -->
</section> <!-- // .experienc-section -->