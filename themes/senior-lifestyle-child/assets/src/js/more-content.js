(function($, window) {
  var $content = $('.mcv-content-container .content-wrapper');


  function checkExpanded(moreBtn) {
    if ($(moreBtn).hasClass('content-expanded')) {
	  if($(moreBtn).data('text-more')) {
		$(moreBtn).html($(moreBtn).data('text-more'));
	  } else {
		$(moreBtn).html('More');  
	  }
    } else {
      $(moreBtn).html('Less');
    }
  }

/*
  var mh = $(content).find('.mcv-intro-text').prop('scrollHeight');
  $(content).find('.mcv-intro-text').css('max-height',mh);
  // Interaction to Collapse and Expand

  $('.video-content-container').on('click', '.more-content-btn', function(e) {

    checkExpanded(this);
    $(this).parent().find('.mcv-intro-text').toggleClass('expanded');
    if($(this).parent().find('.mcv-intro-text').hasClass('expanded')){
       var h = $(this).parent().find('.mcv-intro-text').prop('scrollHeight') + "px";
       $(content).find('.mcv-intro-text').css('max-height',h);
    }else{
       $(content).find('.mcv-intro-text').css('max-height','315px');
    }
    $(this).toggleClass('content-expanded');
    $(this).siblings('.content-wrapper').slideToggle(200, 'linear', function() {});
  });
*/
	$('#welcome_video').on('click', '.more-content-btn', function(e) {
		checkExpanded(this);
		$(this).parent().find('.mcv-intro-text').toggleClass('fading');
		$(this).toggleClass('content-expanded');		
	});

  //
  //
  // AMENITY ROWS
  //
  //

  $('.amenity-row').on('click', '.more-content-btn', function(e) {
    checkExpanded(this);
    $(this).parent().find('.amenity-excerpt').toggleClass('amenity-excerpt-blur');
    $(this).toggleClass('content-expanded');
    //$(this).parent().find('.amenity-content').slideToggle(200, 'linear', function() {});

  });
  
  //
  //
  // LifeStyle Options
  //
  //

  $('.lo-content').on('click', '.more-content-btn', function(e) {
    checkExpanded(this);
    $(this).parent().find('.content-wrap').toggleClass('fading');
    $(this).toggleClass('content-expanded');
    //$(this).siblings('.amenity-content').slideToggle(200, 'linear', function() {});

  });  

})(jQuery, window);