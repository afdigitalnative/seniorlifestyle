<?php


?>
<div class="lo-callout-box">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="lo-callout-box-wrapper">
                <div class="main-wrapper">
                    <div class="row">
                    <div class="col-md-12">
                    <?= $content ?>
                    <?php if(isset($link['url'])&&$link['url']!=""&&isset($link['title'])&&$link['title']!=""){ ?>
                        <a href="<?= $link['url'] ?>" class="btn-primary d-inline"><?= $link['title'] ?></a>
                     <?php } ?>
                    </div>
                </div>
            </div> <!-- // .lo-callout-box-wrapper -->
            <?php if(isset($disclaimer) && $disclaimer!=""){ ?>
            <div class="text-center pt-4 lo-callout-disclaimer"><?= $disclaimer ?></div>
            <?php } ?>
        </div> <!-- // .col -->
    </div> <!-- // .row -->
</div> <!-- // .lo-callout-box -->