<div class="lo-callout-box">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-9">
            <div class="lo-callout-box-wrapper">
                <div class="hdr-wrapper">
                    <h3><?= $title ?></h3>
                </div>
                <div class="main-wrapper">
                    <?= $content ?>
                    <?php if(isset($link['url'])&&$link['url']!=""&&isset($link['title'])&&$link['title']!=""){ ?>
                    <div class="btn-wrapper">
                        <a href="<?= $link['url'] ?>" class="btn-primary"><?= $link['title'] ?></a>
                    </div>
                     <?php } ?>
                </div>
            </div> <!-- // .lo-callout-box-wrapper -->
            <?php if(isset($disclaimer) && $disclaimer!=""){ ?>
            <div class="text-center pt-4 lo-callout-disclaimer"><?= $disclaimer ?></div>
            <?php } ?>
        </div> <!-- // .col -->
    </div> <!-- // .row -->
</div> <!-- // .lo-callout-box -->
