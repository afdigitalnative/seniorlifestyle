<?php
    /*
     *
     * CONTACT SIDEBAR
     *
     * Note: This sidebar is not dynamic and has not been registerd as a widget,
     * but it can be at a later time.
     *
     * fields: box_title, box_content, button_text, button_url, contact_content, mailing_address, phone_number
     */
        $box_title = get_field('graybox_title', 'contact_sidebar');
        $box_content = get_field('gray_box_content', 'contact_sidebar');
        $button_text = get_field('gray_box_button', 'contact_sidebar');
        $button_url = get_field('gray_box_url', 'contact_sidebar');
        $contact_content = get_field('contact_information_content', 'contact_sidebar');
        $mailing_address = get_field('corporate_mailing_address', 'contact_sidebar');
        $phone_number = get_field('corporate_phone_number', 'contact_sidebar');
    ?>

<aside class="sidebar">
    <div class="contact-graybox-block">
        <div class="graybox-content">
            <h2><?php echo $box_title ?></h2>
            <?php echo $box_content ?>
            <div class="btn-wrapper">
                <a href="<?php echo $button_url ?>" class="btn-primary-navy"><?php echo $button_text ?></a>
            </div>
        </div>
    </div>

    <div class="fancy-hr py-5">
        <img src="/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_1_blue.svg" alt=""/>
    </div>

    <div class="contact-block">
        <div class="title">
            <h2>Contact Information</h2>
        </div>
        <div>
            <?php echo $contact_content ?>
        </div>
    </div>

    <div class="contact-block">
        <div class="title">
            <h4>Corporate Mailing Address</h4>
        </div>
        <div>
            <?php echo $mailing_address ?>
        </div>
    </div>

    <div class="contact-block">
        <div class="title">
            <h4>Phone Number</h4>
        </div>
        <div>
            <div class="mobile-hide"><?php echo $phone_number ?></div>
            <div class="mobile-only"><a href="tel:<?php echo $phone_number ?>"><?php echo $phone_number ?></a></div>
        </div>
    </div>

</aside>