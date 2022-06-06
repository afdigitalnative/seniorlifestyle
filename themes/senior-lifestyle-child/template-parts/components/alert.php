<?php
    global $post;
?>

<?php
    if( have_rows('alert_section') ):
        while( have_rows('alert_section') ): the_row();
            $alert_title 	= get_sub_field ('title');
            $alert_type 	= get_sub_field ('alert_type');
            $alert_btn_url 	= get_sub_field ('button_url');
            $alert_btn_text = get_sub_field ('button_text');
?>
    <div class="page-title-wrapper">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="alert-banner <?php echo ' ' . $alert_type; ?>">

        <h2><?php echo $alert_title; ?></h2>
        <a href="<?php echo $alert_btn_url; ?>" class="btn-primary-lightblue"><?php echo $alert_btn_text; ?></a>
    </div>
<?php
        endwhile;
    endif;
?>
