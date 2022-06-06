<?php

$schedule_tour = get_field('schedule_tour');
$location_header = $schedule_tour['location_header'];
$location_map = array_key_exists('location_map', $schedule_tour) ? $schedule_tour['location_map'] : '';

$form_header = $schedule_tour['form_header'];
$hubspot_form_embed = $schedule_tour['form_embed'];

$general_information = get_field('general_information');

$community_phone = trim($general_information['community_phone']);
$community_address = $general_information['community_address'];
$description = $schedule_tour['form_description']? $schedule_tour['form_description'] : 'Tell us a little about yourself and we’ll send you more information.';

?>
<section class="schedule-tour-section" id="schedule_tour">
    <div class="container">
        <div id="sl_hs_form" class="form-column">
            <h2><?= $form_header; ?></h2>
			<p><?php echo $description; ?></p>
            <div class="hs-form-container">
                <?php if (!empty($hubspot_form_embed)) : ?>
                    <?= $hubspot_form_embed; ?>
                <?php endif; ?>
            </div>
        </div>
    </div> <!-- // .container -->
    <div class="map-column mt-5 pt-3">
		<!-- <h2><?= $location_header; ?></h2> -->
		<div class="map-container position-relative">
			<!--<div class="acf-map">
				<div class="marker" data-lat="<?= get_field('lat'); ?>" data-lng="<?= get_field('lng'); ?>"><?= get_the_title(); ?></div>
				<div class="marker-loading">Loading Map...</div>
			</div>
			<iframe width="100%" height="450" frameborder="0" style="border:0;margin-bottom:-8px;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo  get_field('google_maps_api_key', 'sl_options'); ?>&q=<?= $community_address['street_address']; ?>,<?= urlencode($community_address['city']); ?>,<?= urlencode($community_address['state']); ?>+<?= urlencode($community_address['zip']);  ?>" allowfullscreen>
			</iframe>
			-->
			
			<div id="map"></div>

			<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
			
			<script
			  src="https://maps.googleapis.com/maps/api/js?key=<?php echo  get_field('google_maps_api_key', 'sl_options'); ?>&callback=initMap&v=weekly&channel=2"
			  async
			></script>		
			
			
			<script>
				let map;
				let myLatLng;
				let address = "<?php echo $community_address['street_address'] . ' ' . $community_address['city'] . ' ' . $community_address['state'] . ' ' .  $community_address['zip']; ?>";

				function initMap() {
					geocoder = new google.maps.Geocoder();	
					geocoder.geocode( { 'address': address}, function(results, status) {
						if (status == 'OK') {
							myLatLng = results[0].geometry.location;					
					
							map = new google.maps.Map(document.getElementById("map"), {
								center: myLatLng,
								mapTypeControl: false,
								streetViewControl: false,
								fullscreenControl: false,
								zoom: 16,
							});
							
							new google.maps.Marker({
								position: myLatLng,
								map,
								title: address,
							});
								
							if(window.innerWidth > 765) {
								
								map.panBy(-(window.innerWidth / 4 - 50), 0);
							
							} else {
							
								map.panBy(0, -130);
							
							}
						} else {
							alert('Geocode was not successful for the following reason: ' + status);
						}
					});
				}
			</script>
			
			<div class="container">
				<div class="row">
					<div class="community-info-box col-md-5">
						<h5><?= get_the_title(); ?></h5>
						<div class="address-block">
							<p><?= $community_address['street_address']; ?></p>
							<p><?= $community_address['city']; ?>, <?= $community_address['state']; ?> <?= $community_address['zip']; ?></p>
						</div>
						<div class="d-flex justify-content-center mt-2 mt-sm-3 flex-column flex-sm-row">
							<div class="directions-block col-md-6">
								<a class="btn-map" target="_blank" href="https://www.google.com/maps/dir//<?= urlencode($post->post_title) ?>,<?= urlencode($community_address['city']); ?>,<?= urlencode($community_address['state']); ?>+<?= urlencode($community_address['zip']);  ?>">
									<i class="far fa-compass"></i> Get Directions
								</a>
							</div>
							<div class="phone-block mobile-hide col-md-6">
								<a class='btn-map block dniphonehref' href='tel:<?php echo $community_phone; ?>' class="community-phone">
									<i class="fas fa-phone"></i> <span class='dniphone'><?php echo $community_phone; ?></span>
								</a>
							</div>
							<div class="phone-block mobile-only col-md-6">
								<a class="btn-map" class='block dniphonehref' href='tel:<?php echo $community_phone; ?>' class="btn-purple">
									<i class="fas fa-phone"></i> <span class='dniphone'><?php echo $community_phone; ?></span>
								</a>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
    </div>
</section>