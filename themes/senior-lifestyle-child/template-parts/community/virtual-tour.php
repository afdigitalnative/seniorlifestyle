<?php
    $vt_section = get_field('virtual_tour_section');
    $vt_header = $vt_section['vt_header'] ? $vt_section['vt_header'] : '';
    $vt_info = $vt_section['vt_info'];

    if(isset($vt_section['vt_frame'])&& $vt_section['vt_frame']!=""){
?>

<section class="virtual-tour-section">
    <div class="container">
    <?php if(!$vt_info) : ?>
        <div class="vt-hdr-wrapper container">
            <h2><?= $vt_header; ?></h2>
        </div>
    <?php endif; ?>
        <div class="row">
            <?php if($vt_info) : ?>
                <div class="col-lg align-self-center mx-auto mx-sm-2 col-vt-info">
                    <h2 class="mt-5 mt-md-0"><?= $vt_header; ?></h2>
                    <?= $vt_info; ?>
                </div>
            <?php endif; ?>		
            <div class="col-lg mb-5">
                <div class="vt-frame-wrapper">
                    <div class="h_iframe">
                        <img class="ratio" src="<?php echo SL_CHILD_THEME_URL . '/assets/img/virtualmap-placeholder.png'; ?>" alt="place holder">
                        <?= $vt_section['vt_frame']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
?>