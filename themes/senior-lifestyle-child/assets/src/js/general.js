jQuery(document).ready(function() {	
	jQuery('.more-markets a').on('click', function(e) {
		e.preventDefault();
		jQuery('.market-listing').find('.market-item').removeClass('d-none');
		jQuery('.market-listing').find('.market-item').find('.wrap-button').removeClass('d-none');
		jQuery('.more-markets').hide();
	});
});