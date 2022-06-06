
(function($, document, window) {
  $(document).on('scroll', function(e) {
      if ($(document).scrollTop() > 500) {
          $('.scroll-to-top-btn').addClass('on-screen');
      } else {
          $('.scroll-to-top-btn').removeClass('on-screen');
      }
  });

  $('.scroll-to-top-btn').click(function(){
      $('html,body').animate({ scrollTop: 0 }, '200');
      return false;
  });

})(jQuery, document, window);

(function($, window) { 
  
	//$(document).on('click', '.in-page-links a[href^="#"], .hero-loc .lo-link', function (event) {
	$(document).on('click', 'a[href^="#"]', function (event) {	
		event.preventDefault();

		if($(this).attr('href').length < 2) {
			return true;
		}
	
		var offsetTop = $($.attr(this, 'href')).offset().top;
		var navbarHeight = 0;
			
		if($('#navbar').length > 0) {
			navbarHeight = $('#navbar').outerHeight();
			
			if($('#navbar').find('.in-page-nav-toggle').is(':visible')) {
				navbarHeight = $('#navbar').find('.in-page-nav-toggle').outerHeight();
			}		
			
			console.log('navbarHeight', navbarHeight);
			
			if(!$('#navbar').hasClass('sticky')) {
				offsetTop -= navbarHeight;
				
				if($('#navbar').find('.in-page-nav-toggle').is(':visible')) {
					offsetTop -= $('.in-page-links').outerHeight();
				}
			}
			
		}
				
		$('html, body').animate({
			scrollTop: offsetTop - navbarHeight
		}, 800);	
		
	});

  
})(jQuery, window);