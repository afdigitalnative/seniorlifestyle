<?php
// call to action typically displayed at bottom of pages
// fields: cta_header,cta_text,cta_button_text,cta_button_url
//
// check for cta_header and cta_text, if values exist display
// else ship
?>


<section class="section-find-community style-alt">
	<div class="container">
		<div class="row">
			<div class="col col-form">
				<div class="col-form-inner">
					<h3>Find a Community</h3>
					<p>See the senior living communities and services near you to find the perfect fit for you or your loved ones.</p>
					<form id="form-loc-quiz" method="get" action="<?php echo bloginfo('url'); ?>/find-community">
						<div class="form-row align-items-center">
							<div class="col-auto">
								<label for="place">City State, or Zip</label>
								<input type="text" name="place" class="form-control mb-2" id="place" placeholder="Search city, state, or zip">
							</div>
							<div class="col-auto">
								<label for="select-lifestyle">Living Options</label>
								<select id="select-lifestyle" class="form-control mb-2" name="select-lifestyle">
									<option value="">All Lifestyles</option>
									<option value="Affordable Senior Housing">AH - Affordable Housing</option>
									<option value="Assisted Living">AL - Assisted Living</option>
									<option value="Independent Living">IL - Independent Living</option>
									<option value="Memory Care">MC - Memory Care</option>
									<option value="Short-Term Care">ST - Short-Term Care</option>
									<option value="Skilled Nursing">SN - Skilled Nursing</option>
								</select>
							</div>
							<div class="col-auto text-center text-md-left">
								<button type="submit" class="btn btn-primary-navy"><i class="far fa-map-pin"></i>&nbsp;&nbsp;Find a Community</button>
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
	</div>
</section>

