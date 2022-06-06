<div class="jdpa">
    <div class="jdpa-container">
        <div class="jdpa-img jdpa-desktop">
            <picture>
                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jbp-award.webp" type="image/webp">
                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jbp-award.png" type="image/png"> 
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jbp-award.png" width="218" height="284" alt="J.D. Power and Associates Award">                  
            </picture>
        </div>
        <div class="jdpa-content">
            <div class="jdpa-image">
                <picture>
                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jbp-award.webp" type="image/webp">
                    <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jbp-award.png" type="image/png"> 
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jbp-award.png" width="218" height="284" alt="J.D. Power and Associates Award">
                </picture>
            </div>
            <div class="jdpa-text"> 
                <h2>
                    <span class="jdpa-text-md-nowrap">Senior Lifestyle</span> is <span class="jdpa-text-md-nowrap">Highest Ranked</span> in <span class="jdpa-text-md-nowrap">Customer Satisfaction</span>
                    <span class="jdpa-skinny">with Assisted&nbsp;Living<span style="word-break: break-all; display: inline-block">/</span>Memory&nbsp;Care Communities</span>
                </h2>
            </div>
            <div class="jdpa-subtext">Tied in 2020. For J.D. Power 2020 award information, visit <a href="https://jdpower.com/awards" class="jdpa-link" target="_blank" rel="nofollow noreferrer">jdpower.com/awards</a></div>
        </div>
    </div>
</div>

<style>
    .jdpa-link {
        color: inherit;
        text-decoration: underline;
        font-weight: inherit;
    }
    .jdpa-container {
        border: 1px solid #0b436a;
        text-align: center !important;
        padding: 20px;
        color: #0b436a;
        margin: 20px;
        -ms-flex-wrap: wrap;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }
    .jdpa-img.jdpa-desktop {
        padding-left: 15px;
        padding-right: 15px;
        webkit-box-flex: 0;
        -ms-flex: 0 0 18%;
        flex: 0 0 18%;
        max-width: 18%;
        text-align: center;
        display: none;
    }
    .jdpa-content {
        flex-wrap: wrap;
        webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }
    .jdpa-content .jdpa-image {
        display: block;
        margin-bottom: 20px;
    }
    .jdpa h2 {
        font-weight: bold;
        font-size: 22px;
        color: #0b436a;
        text-align: center !important;
        line-height: 1.11em;
        text-transform: uppercase;
        margin-top: 0;
        margin-bottom: 20px;
    }
    .jdpa h2 > .jdpa-skinny {
        font-weight: 100;
        font-size: 1.25rem;
        line-height: 1.5rem;
        display: block;
        margin-top: 6px;
    }
    .jdpa .jdpa-subtext {
        font-size: 10px;
        line-height: 1.1rem;
        font-weight: 100;
        color: #0b436a;
    }
    @media screen and (min-width:576px) {
        .jdpa-text {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 66.66667%;
            flex: 0 0 66.66667%;
            max-width: 66.66667%;
            display: flex;
            align-items: center;
        }
        .jdpa-content .jdpa-image {
            -ms-flex: 0 0 33.33333%;
            flex: 0 0 33.33333%;
            max-width: 33.33333%;
            padding-right: 20px;
        }
        .jdpa-container,
        .jdpa-content,
        .jdpa h2 {
            text-align: left !important;
        }
        .jdpa .jdpa-subtext {
            text-align: left;
            width: 100%;
        }
        .jdpa-text-md-nowrap {
            word-break: break-word;
            display: inline-block;
        }
    }
    @media screen and (min-width:768px) {
        .jdpa-wide > .jdpa .jdpa-content img {
            display: none; 
        }
        .jdpa-wide > .jdpa .jdpa-container {
            padding: 30px 15px;
        }
        .jdpa-wide > .jdpa h2 {
            font-weight: bold;
            font-size: 34px;
            margin-bottom: 20px;
        }
        .jdpa-wide > .jdpa h2 >.jdpa-skinny {
            font-size: 26px;
            line-height: 2.11rem;
            margin-top: 5px;
        }
        .jdpa-wide > .jdpa .jdpa-img {
            -ms-flex: 0 0 18%;
            flex: 0 0 18%;
            max-width: 18%;
        }
        .jdpa-wide > .jdpa .jdpa-img.jdpa-desktop {
            display: block;
        }
        .jdpa-wide > .jdpa .jdpa-content {
            padding-left: 15px;
            padding-right: 15px;
            -ms-flex: 0 0 82%;
            flex: 0 0 82%;
            max-width: 82%;
            justify-content: initial;
            align-content: center;
        }
        .jdpa-wide > .jdpa .jdpa-subtext {
            font-size: 16px;
            width: 100%;
            margin-left: 0;
        }
        .jdpa-wide > .jdpa .jdpa-text,
        .jdpa-wide > .jdpa .jdpa-subtext {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>