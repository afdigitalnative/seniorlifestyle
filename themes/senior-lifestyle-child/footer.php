<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SLS_Community_Template
 */
    $community_phone;
    $general_information = get_field('general_information') ? get_field('general_information') : array();
    if (!empty($general_information)){
        $community_phone = $general_information['community_phone'];
        $community_facebook_url = $general_information['community_facebook_url'];
    }

?>

	</div><!-- #content -->

	<footer class="primary-footer columns">
		<div class="container">
			<div class="footer-logos-container column">
				<ul class="footer-logos">
					<li><img src="<?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-lifecycle-white.png'; ?>" alt="seniorlifecycle" /></li>
					<li><img src="<?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-micro.png'; ?>" alt="Microsoft" /></li>
					<li><img src="<?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo_equal_eousing_opportunity.png'; ?>" alt="Equal eousing opportunity" /></li>
				</ul>
			</div>
			<div class="column">
				<div class="social-icons-container">
                    <?php if (!empty($community_facebook_url)) : ?>
                        <a href="<?php echo $community_facebook_url; ?>" title="facbook" rel="nofollow noreferrer"><span class="fab fa-facebook-square"></span></a>
                    <?php endif; ?>
					<?php echo do_shortcode('[social-icons]'); ?>
				</div>
                <?php
                    wp_nav_menu(
                        array( 
                            'theme_location' => 'footer-menu', 
                            'container_class' => 'footer-menu'    
                        )
                    ); 
                ?>
			</div>
		</div>
	</footer><!-- footer -->

	<footer class="sub-footer columns">
		<div class="container">
 			<div class="copyright-address column">
				<?php
					// Check ACF for search content
					if ( get_field( 'footer_copyright_txt', 'sl_options' ) ):
						// echo "<p>".get_field( 'footer_copyright_txt', 'sl_options' )."</p>";
						echo "<p>". do_shortcode(get_field( 'footer_copyright_txt', 'sl_options' )) ."</p>";
					else:
						echo "<p>&copy; Senior Lifestyle | 303 East Wacker Drive, <br>24th Floor, Chicago, IL 60601</p>";
						// echo "<p>&copy; ". do_shortcode('[year]') . " Senior Lifestyle | 303 East Wacker Drive, <br>24th Floor, Chicago, IL 60601</p>";
					endif;
				?>
			</div>
                    <?php if ( is_singular('community')) {
                        $hipaa = get_field('general_information_community_hipaa_pdf');
                        if(isset($hipaa) && $hipaa!=""){
                        ?>
			<div class="copyright-privacy column">
				<p><a href="<?= $hipaa ?>" target="_blank">Notice of Privacy Practices</a></p>
			</div>
                    <?php }} ?>
		</div>
	</footer>

</div><!-- #page -->

<div class="scroll-to-top-btn">
	<svg xmlns="http://www.w3.org/2000/svg" width="30" height="19" viewBox="0 0 319.9 206.6"><title>arrow-up</title><path d="M143.05,7.05l-136,136a23.9,23.9,0,0,0,0,33.9l22.6,22.6a23.9,23.9,0,0,0,33.9,0l96.4-96.4,96.4,96.4a23.9,23.9,0,0,0,33.9,0l22.6-22.6a23.9,23.9,0,0,0,0-33.9l-136-136A23.78,23.78,0,0,0,143.05,7.05Z" fill="#fff"/></svg>
	<!-- <span>To Top</span> -->
</div>

<?php wp_footer(); ?>

<?php $general_information = get_field('general_information', get_the_ID()); ?>

<?php if ( 
    get_field( 'dni_enable', 'sl_options' ) &&
    get_post_type() == 'community' && !empty($general_information['community_rentcafe_api_key'])) : ?>
    <script type="text/javascript">
        /* Initialize LeadAttribution and DNI object */
        if (typeof RCTPCampaign != "undefined") {
            RCTPCampaign.PropertyAPIKey = '<?php echo $general_information['community_rentcafe_api_key']; ?>';
            RCTPCampaign.init();
        }
        if (typeof ClickTrack != "undefined") {
            ClickTrack.SiteSection = 'PropertyPortal';
            ClickTrack._PageDisplayName = 'Lead Creation';
            ClickTrack.PropertyAPIKey = '<?php echo $general_information['community_rentcafe_api_key']; ?>';
            ClickTrack.init();
        }
        if (typeof RCTPCampaign != "undefined") {
            RCTPCampaign.DoExecuteAfterCampaignLoad(function () {
                var nodes = document.querySelectorAll('.dniphone');
                var phoneNumber = RCTPCampaign.CampaignDetails.Phone;
                if (phoneNumber == '' || phoneNumber == 'n/a') {
                    phoneNumber = '<?php echo $general_information['community_phone']; ?>';
                }
                for (var i = 0; i < nodes.length; i++) {
                    nodes[i].innerHTML = phoneNumber;
                }
                var hrefnodes = document.querySelectorAll('.dniphonehref');
                for (var i = 0; i < hrefnodes.length; i++) {
                    hrefnodes[i].href = 'tel:' + phoneNumber.replace(' ', '').replace('(', '').replace(')', '')
                        .replace('-', '');
                }
            });
        }
    </script>
    <script type="text/javascript">
        if (typeof RCTPCampaign != "undefined") {
            RCTPCampaign.DoExecuteAfterCampaignLoad(function () {
                var nodes = document.querySelectorAll('a.AppendCrossDomainParams');
                for (var i = 0; i < nodes.length; i++) {
                    var sNewURL = nodes[i].href;
                    sNewURL = RCTPCampaign.AppendCrossDomainParamsInURL(sNewURL);
                    if (typeof ClickTrack != "undefined") {
                        sNewURL = ClickTrack.GetTrackingCrossDomainURLParams(sNewURL);
                    }
                    nodes[i].href = sNewURL;
                }
            });
        }
    </script>
    <script type="text/javascript">
        var _userway_config = {
            account: 'VnyI2jc9uI'
        };
    </script>
<?php endif; ?>
<script>
    var APIKey = '<?php echo get_field( 'google_maps_api_key', 'sl_options'); ?>';
</script>
<div id="dynamic-content"></div>
</body>
</html>