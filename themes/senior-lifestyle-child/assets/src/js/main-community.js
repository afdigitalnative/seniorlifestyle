//=require navigation.js
//=require skip-link-focus-fix.js
//=require jquery.equalizer.js
//=require more-content.js
//=require sl-lazyload.js
//require google-map.js
//=require back-to-top.js
//=require slick.js
//=require sticky.js


//=require @fancyapps/fancybox/dist/jquery.fancybox.min.js

(function($, window) {

  // Initialize thumbnail carousel (left)
  $('.slick.nav').slick({
	rows: 2,
	slidesPerRow: 3,
    infinite: false,
    dots: true,
	//appendArrows: '.img-wrap',
	
	responsive: [
		{
		  breakpoint: 576,
		  settings: {
			rows: 1,
			slidesPerRow: 3
		  }
		}
	]
  });

  // Initialize current preview carousel (right)
  $('.slick.current').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
  });
	
  // Add listener to thumbnail clicks
  
  $('[data-slide]').on('click', function() {

	var slickNav = $(this).closest('.slick.nav');
	var slickCurrent = slickNav.parent().find('.slick.current');

	slickNav.find('[data-slide]').removeClass('active-thumb');
	$(this).addClass('active-thumb');
	
    var slide = $(this).attr('data-slide');
    slickCurrent.slick( "slickGoTo", slide );
  });
  
	// On after slide change
	$('.slick.current').on('afterChange', function(event, slick, currentSlide, prevSlide){
		var slickNav = $(this).parent().parent().find('.slick.nav');		
			
		slickNav.find('[data-slide]').removeClass('active-thumb');
		slickNav.find("[data-slide=" + currentSlide + "]").addClass('active-thumb');
		
		var group = $("[data-slide=" + currentSlide + "]").closest('.slick-slide').data('slick-index');
		
		slickNav.slick( "slickGoTo", group);
		
		if($(this).parent().find('.slide-caption.out').length > 0) {
			$(this).parent().find('.slide-caption.out').text($(this).find('.slick-current').find('.item').data('caption'));
		}
	});

	//Fancybox.bind('[data-fancybox="gallery-floor-plans"]', {
	//});
	$('[data-fancybox="gallery-floor-plans"]').fancybox({
		// Options will go here
	}); 

	$('[data-fancybox="photo-gallery"]').fancybox({
		// Options will go here
	}); 
	
  // Auto fading for Living Options
  $('section.lifestyle-options-section').find('.lo-content').each(function() {
	  var $row = $(this);
	  var img_height = $(this).parent().children('.card-bg').find('img').outerHeight();  
	  	  
	  if($(this).find('.content-wrap').outerHeight() > img_height) {
		$(this).find('.content-wrap').addClass('fading');
		$(this).find('.more-content-btn').removeClass('d-none');
	  }

	  $(this).find('.card-bg').find('img').on('lazyloaded', function() {
		  var img_height = $(this).outerHeight();
		  var img_height = $row.parent().children('.card-bg').find('img').outerHeight();  
			  
		  if($row.find('.content-wrap').outerHeight() > img_height) {
			$row.find('.content-wrap').addClass('fading');
			$row.find('.more-content-btn').removeClass('d-none');
		  }		  
	  });
	  
  });
 
  // Auto fading for Introducy Paragraph
  if($('#welcome_video .mcv-intro-text').outerHeight() > 550 && $('#welcome_video').hasClass('has-video')) {
	$('#welcome_video .mcv-intro-text').addClass('fading');
	$('#welcome_video .mcv-intro-text').parent().find('.more-content-btn').removeClass('d-none');  
  }
 
  // Auto fading for What's Include Rows
  
  $('section.experience-section').find('.amenity-row').each(function() {
	  var $row = $(this);

	  var img_height = $(this).find('.img-wrapper').find('img').outerHeight();
	  if($row.find('.content-wrapper').find('.amenity-excerpt').outerHeight() > img_height) {
		$row.find('.content-wrapper').find('.amenity-excerpt').addClass('amenity-excerpt-blur');
		
		$row.find('.more-content-btn').removeClass('d-none');
	  }
	  
	  $(this).find('.img-wrapper').find('img').on('lazyloaded', function() {
		  var img_height = $(this).outerHeight();
		  if($row.find('.content-wrapper').find('.amenity-excerpt').outerHeight() > img_height) {
			$row.find('.content-wrapper').find('.amenity-excerpt').addClass('amenity-excerpt-blur');
			$row.find('.more-content-btn').removeClass('d-none');
		  }		  
	  });	 
  });  
    

})(jQuery, window);

// Reset Facebook Widget Size
jQuery(document).ready(function() {	
	const widget_width = Math.floor(jQuery('.fb-iframe-wrapper').outerWidth());
	let src = jQuery('.fb-iframe-wrapper').find('iframe').attr('src');
	  
	const reg = /width=\d{3}&/g
	let newSrc = src.replace(reg, 'width=' + widget_width + '&');

	jQuery('.fb-iframe-wrapper').find('iframe').attr('width', widget_width);
	
	if(window.innerWidth < 768) {
		const reg_h = /height=\d{3}/g
		jQuery('.fb-iframe-wrapper').find('iframe').attr('height', 260);
		newSrc = newSrc.replace(reg_h, 'height=260');
	}
	
	jQuery('.fb-iframe-wrapper').find('iframe').removeAttr('src');
	jQuery('.fb-iframe-wrapper').find('iframe').attr('src', newSrc);
	
	jQuery('.virtual-tour-section .col-vt-info a').on('click', function(e) {
		e.preventDefault();
		
		jQuery('.virtual-tour-section .vt-frame-wrapper').find('iframe').removeAttr('src');
		jQuery('.virtual-tour-section .vt-frame-wrapper').find('iframe').attr('src', jQuery(this).attr('href'));
	});
});

var main_gallery_loaded = false;
var floor_plan_gallery_loaded = false;
( function() {
    //on interaction with gallery "buttons", load additional images -- other click event handlers had to be written after the anchor and images were created.
    $('#more_images').on('click', function() {
        if (!main_gallery_loaded) {
            addImages('#main_photo_gallery', mainContentGallery);
            main_gallery_loaded = true;
        }
    });

    $('#see_all_floorplans').on('click', function() {
        if (!floor_plan_gallery_loaded) {
            addImages('#floor_plan_gallery', contentFloorplan);
            floor_plan_gallery_loaded = true;
        }
    });

    //setTimeout(loadMap,6000);
} )();

function addImages(el, content) {
    $(el).html(content);
}
