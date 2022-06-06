//=require slick.js
//=require sticky.js
var expSlider = null;
(function($, window) {

	var $progressBar = $('.progress .progress-bar');
	
	expSlider = jQuery('.exerience-list-container').slick({
		slidesToShow: 2,
		dots: false,
		infinite: false,
		speed: 500,
		vertical: true,
		verticalSwiping: true,
		adaptiveHeight: true,
		asNavFor: '.experience-image-slider',
		arrows: false,
		variableHeight: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					vertical: false,
					arrows: true,
					dots: true,
					verticalSwiping: false
				}
			}
		]			
	})
	.on('afterChange', onSliderAfterChange)
	.on('wheel', onSliderWheel)
	.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
		let calc = ( (nextSlide + 1) / (slick.slideCount) ) * 100;
		
		if(calc > 100) calc = 100;
    
		$progressBar
		  .css('height', calc + '%');		
	});
  	
	
	jQuery('.experience-image-slider').slick({
		dots: false,
		infinite: false,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		arrows: false
	});	

})(jQuery, window);

function onSliderWheel(e) {
    var deltaY = e.originalEvent.deltaY,
		$currentSlider = $(e.currentTarget),
		currentSlickIndex = $currentSlider.data('current-slide') || 0;
		
	var sliderLength = jQuery('.exerience-list-container').slick('getSlick').slideCount;
	
    if (
      // check when you scroll up
      (deltaY < 0 && currentSlickIndex == 0) ||
      // check when you scroll down
      (deltaY > 0 && currentSlickIndex == sliderLength - 1)
    ) {
      return;
    }

    e.preventDefault();

    if (e.originalEvent.deltaY < 0) {
      $currentSlider.slick('slickPrev');
    } else {
      $currentSlider.slick('slickNext');
    }
}

function onSliderAfterChange(event, slick, currentSlide) {
    $(event.target).data('current-slide', currentSlide);
}